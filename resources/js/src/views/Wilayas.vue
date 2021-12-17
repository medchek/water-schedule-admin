<template>
  <section class="grow flex flex-col h-full overflow-hidden">
    <div id="content-header" class="flex flex-col md:flex-row md:items-center md:justify-between px-5 md:h-16 md:min-h-16 space-y-2 md:space-y-0">
      <span class="text-bgray-700 dark:text-white text-2xl 2xl:text-3xl font-semibold">Wilayas</span>
      <input
        type="search"
        class="
          w-full
          md:w-60
          xl:w-80
          2xl:w-96
          h-10
          px-2
          border border-gray-200
          focus:ring-2
          placeholder-gray-300
          dark:placeholder-bgray-400
          ring-blue-200
          dark:ring-indigo-500
          rounded-md
        "
        spellcheck="false"
        placeholder="Chercher une wilaya"
        maxlength="50"
        @input="searchTerm = $event.target.value"
      />
    </div>

    <section id="content-main" class="relative w-full h-full grow overflow-y-auto py-2 my-2">
      <load-and-retry
        v-if="isFetching || fetchingError"
        @retry="fetchWilayas"
        :hasFailed="fetchingError"
        :isFetching="isFetching"
        text="Use erreur est survenu lors de l'obtention des wilayas"
      />
      <!-- SUCCESS -->

      <div
        class="relative grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 grid-rows-none gap-4 w-full h-auto px-5"
        v-if="!isFetching && !fetchingError && wilayas"
      >
        <wilaya-card v-for="wilaya in wilayas" :wilaya="wilaya" :key="wilaya.code" />
      </div>
      <!-- SUCCESS BUT NO SEARCH RESULT -->

      <div v-if="!isFetching && !fetchingError && searchTerm.length && !wilayas.length" class="w-full text-center text-lg text-bgray-700 font-bold">
        <p>Aucune wilaya n'a été ne correspond à votre recherche.</p>
      </div>
    </section>
  </section>
</template>
<script lang="ts">
import { computed, defineComponent, onMounted, ref, ComputedRef } from "vue";
import { useStore } from "vuex";
import Loader from "../components/Loader.vue";
import Retry from "../components/Retry.vue";
import WilayaCard from "../components/wilaya/WilayaCard.vue";
import { Wilaya } from "../store/modules/wilayas";

export default defineComponent({
  components: { Loader, WilayaCard, LoadAndRetry: Retry },
  setup() {
    const store = useStore();
    const isFetching = ref<boolean>(false);
    const fetchingError = ref<boolean>(false);

    const searchTerm = ref<string>("");
    const isAuth = computed(() => store.getters.getUser);

    const allWilayas: ComputedRef<Wilaya[]> = computed(() => store.getters.getWilayas);
    const wilayas: ComputedRef<Wilaya[]> = computed(() => store.getters.getFilteredWilayas(searchTerm.value.trim()));

    const fetchWilayas = () => {
      isFetching.value = true;
      if (fetchingError.value) fetchingError.value = false;
      store
        .dispatch("fetchWilayas")
        .catch(() => {
          if (!fetchingError.value) fetchingError.value = true;
        })
        .finally(() => {
          isFetching.value = false;
        });
    };
    onMounted(() => {
      if (isAuth === null) return;
      // if wilayas have already been loaded from the server
      if (allWilayas.value.length) return;
      // otherwise, fetch for the wilayas
      fetchWilayas();
    });

    return { fetchWilayas, isFetching, fetchingError, wilayas, searchTerm };
  },
});
</script>
