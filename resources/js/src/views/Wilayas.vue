<template>
  <section class="grow flex flex-col h-full overflow-hidden">
    <div id="content-header" class="flex flex-col md:flex-row md:items-center md:justify-between px-5 md:h-16 md:min-h-16 space-y-2 md:space-y-0">
      <span class="text-bgray-700 text-2xl 2xl:text-3xl font-semibold">Wilayas</span>
      <input
        type="search"
        class="w-full md:w-60 xl:w-80 2xl:w-96 h-10 px-2 border border-gray-200 focus:ring-2 placeholder-gray-300 focus:ring-blue-200 rounded-md"
        placeholder="Chercher une wilaya"
        maxlength="30"
        @input="searchTerm = $event.target.value"
      />
    </div>

    <section id="content-main" class="relative w-full h-full grow overflow-y-auto py-2 my-2">
      <!-- LOADDER -->
      <div class="w-full h-full flex items-center" v-if="isFetching">
        <loader className="w-12 h-12 mx-auto border-t-blue-500" customColors />
      </div>
      <!-- ERROR -->
      <div class="w-full space-y-2 h-full flex flex-col justify-center" v-if="!isFetching && errorFetching">
        <p class="w-full text-xl font-semibold text-center">Use erreur est survenu lors de l'obtention des données</p>
        <button class="mx-auto bg-blue-500 hover:bg-blue-400 focus:bg-blue-600 transition-colors font-semibold text-white h-10 px-4 rounded">Reéssayer</button>
      </div>
      <!-- SUCCESS -->

      <div
        class="relative grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 grid-rows-none gap-4 w-full h-auto px-5"
        v-if="!isFetching && !errorFetching && wilayas"
      >
        <div class="flex flex-col bg-white h-36 px-4 pb-4 rounded" v-for="wilaya in wilayas" :key="wilaya.code">
          <div class="grow flex items-center justify-center text-bgray-700 font-semibold text-lg 2xl:text-xl text-center">
            {{ wilaya.code }} {{ wilaya.name }}
          </div>
          <router-link
            :to="{ name: 'towns', params: { wilayaId: wilaya.id } }"
            class="
              text-center text-sm
              xl:text-base
              flex
              items-center
              justify-center
              bg-gray-100
              hover:bg-blue-100
              focus:bg-bgray-200
              transition-colors
              h-9
              w-full
              font-semibold
              text-blue-400
              rounded-md
            "
          >
            Voir les communes
          </router-link>
        </div>
      </div>
      <!-- SUCCESS BUT NO SEARCH RESULT -->

      <div v-if="!isFetching && !errorFetching && searchTerm.length && !wilayas.length" class="w-full text-center text-lg text-bgray-700">
        <p>Aucune wilaya n'a été trouvée dans votre recherche.</p>
      </div>
    </section>
  </section>
</template>
<script lang="ts">
import { computed, defineComponent, onMounted, ref, ComputedRef } from "vue";
import { useStore } from "vuex";
import Loader from "../components/Loader.vue";
import { Wilaya } from "../store/modules/wilayas";

export default defineComponent({
  components: { Loader },
  setup() {
    const store = useStore();
    const isFetching = ref<boolean>(false);
    const errorFetching = ref<boolean>(false);

    const searchTerm = ref<string>("");
    const isAuth = computed(() => store.getters.getUser);

    const allWilayas: ComputedRef<Wilaya[]> = computed(() => store.getters.getWilayas);
    const wilayas: ComputedRef<Wilaya[]> = computed(() => store.getters.getFilteredWilayas(searchTerm.value.trim()));

    const fetchWilayas = () => {
      isFetching.value = true;
      store
        .dispatch("fetchWilayas")
        .then(() => {
          isFetching.value = false;
        })
        .catch(() => {
          if (!errorFetching.value) errorFetching.value = true;
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

    return { isFetching, errorFetching, wilayas, searchTerm };
  },
});
</script>
