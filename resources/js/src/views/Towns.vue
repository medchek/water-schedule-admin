<template>
  <main id="towns-main" class="grow flex flex-col h-full overflow-hidden">
    <!-- <section class="flex flex-col h-full"> -->
    <div id="content-header" class="flex items-center justify-between px-5 h-16 min-h-16">
      <span class="text-bgray-700 dark:text-white text-2xl 2xl:text-3xl font-semibold">Communes {{ headerWilayaName }}</span>
    </div>

    <section id="towns-toolbar" class="flex flex-col lg:flex-row lg:items-center justify-between lg:h-14 w-full mb-2 px-5 space-y-2 lg:space-y-0">
      <!-- <button
        id="add-town"
        class="bg-blue-600 hover:bg-blue-500 dark:bg-white text-white dark:text-dark-bg font-semibold px-2 h-10 rounded-md"
        @click="openForm"
      >
        <Icon :icon="mdiPlusBoxMultiple" class="w-6 h-6 mr-1" />
        Ajouter une commune
      </button> -->
      <app-open-modal-button id="add-town" @click="openForm" :icon="mdiPlusBoxMultiple"> Ajouter une commune</app-open-modal-button>

      <div class="flex justify-between lg:justify-end space-x-4">
        <select
          name="wilaya-selector"
          id="wilaya-select"
          class="
            rounded-md
            w-full
            lg:w-40
            xl:w-52
            px-2
            font-semibold
            bg-white
            text-bgray-700
            focus:outline-none
            ring-blue-300
            dark:ring-indigo-500
            focus:ring-2
          "
          v-model="currentRouteWilayaId"
          @change="handleSelectChange"
        >
          <option v-for="wilaya in wilayas" :key="wilaya.code" :value="wilaya.code">{{ wilaya.code }} - {{ wilaya.name }}</option>
        </select>

        <app-input
          className="h-10 text-sm sm:text-base w-full lg:w-80 "
          v-model.trim.lazy="searchTerm"
          :appendIcon="mdiMagnify"
          placeholder="Chercher une commune"
          clearable
        />
      </div>
    </section>
    <section id="content-main" class="relative w-full h-full grow overflow-y-auto py-4">
      <div class="w-full h-full flex items-center" v-if="isFetching">
        <loader className="w-12 h-12 mx-auto border-t-blue-500" customColors />
      </div>
      <p
        v-else-if="!isFetching && towns !== undefined && towns instanceof Array && towns.length === 0"
        class="px-4 text-base md:text-lg font-semibold w-full text-center text-gray-800"
      >
        Aucune commune n'a été ajoutée pour {{ currentRouteWilaya.name }}
      </p>
      <p v-else-if="searchTerm && (!filteredTowns || !filteredTowns.length)" class="px-4 text-base md:text-lg font-semibold w-full text-center text-gray-600">
        Aucune commune ne corresponds à votre recherche
      </p>

      <div v-else class="relative grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 grid-rows-none gap-4 w-full h-auto px-5">
        <!-- @edit & @delete send the same object with the difference in the action type (edit or delete), hence using it in both emits -->
        <town-card v-for="town in filteredTowns" :key="town.id" :town="town" @edit="onAction" @delete="onAction" />
      </div>
    </section>

    <teleport to="#app-modal">
      <transition name="fade">
        <town-form v-if="isFormOpen" :showModal="isFormOpen" @formClickedOutside="closeForm" @formSaved="closeForm" :actionData="actionValues" />
      </transition>
    </teleport>
    <!-- </section> -->
  </main>
</template>
<script lang="ts">
import { computed, ComputedRef, defineComponent, onMounted, reactive, ref, warn, watch } from "vue";
import { mdiPlusBoxMultiple, mdiMagnify } from "@mdi/js";
import Icon from "../components/Icon.vue";
import AppInput from "../components/AppInput.vue";

import { useStore } from "vuex";
import { useRoute, useRouter } from "vue-router";
import { Town, Towns } from "../store/modules/towns";
import { Wilaya } from "../store/modules/wilayas";
import Loader from "../components/Loader.vue";
import TownForm from "../components/town/TownForm.vue";
import TownCard from "../components/town/TownCard.vue";
import { TownActionData } from "../types/components";
import { addPreposition } from "../lib/shared";
import AppOpenModalButton from "../components/AppOpenModalButton.vue";

export default defineComponent({
  components: { Icon, AppInput, Loader, TownForm, TownCard, AppOpenModalButton },
  setup() {
    const store = useStore();
    const route = useRoute();
    const router = useRouter();
    const searchTerm = ref<string>("");
    const towns: ComputedRef<Town[] | undefined> = computed(() => store.getters.getTownsByWilayaId(route.params.wilayaId));

    const wilayas: ComputedRef<Wilaya[]> = computed(() => store.getters.getWilayas);
    const currentRouteWilayaId = ref(route.params.wilayaId as string);

    const filteredTowns: ComputedRef<Town[] | Towns | null> = computed(() => {
      if (!towns.value) return null;
      if (!searchTerm.value) return towns.value;
      return towns.value.filter((town) => town.name.toLowerCase().includes(searchTerm.value.trim().toLowerCase()));
    });
    // console.warn(filteredTowns.value);
    const currentRouteWilaya = computed(() => wilayas.value.find((wilaya) => wilaya.code === parseInt(currentRouteWilayaId.value)));
    const headerWilayaName = computed(() => {
      const targetWilaya = currentRouteWilaya.value;
      if (targetWilaya) {
        const wilayaName = targetWilaya.name;
        return addPreposition(wilayaName);
      }
    });

    const isFetching = ref(false);
    const isFetchingError = ref(false);
    const fetchTownsData = () => {
      if (!isFetching.value && !towns.value) isFetching.value = true;
      store
        .dispatch("fetchTowns", {
          wilayaId: route.params.wilayaId,
        })
        .then((status) => {
          if (status === 200) {
            isFetching.value = false;
            isFetchingError.value = false;
          }
        })
        .catch((err) => {
          const status = err.response.status;
          if (status === 404) {
            store.dispatch("flashSnack", {
              // message, type, time
              message: `Wilaya ${route.params.wilayaId} n'existe pas`,
              type: "error",
            });
            return router.replace({ name: "not-found" });
          }
        });
    };

    onMounted(() => {
      // if the towns already exist upon entering the component, dont call the api
      if (towns.value) return;
      fetchTownsData();
    });

    // sent as a prop to the from to inform it whether it's a deletion, edition or addition request (addition when it's null)
    const actionValues = ref<TownActionData | null>(null);
    // action data with be tailored to either edit or delete action when coming from the child component
    // it is therefore meant to be used in both @edit and @delete events
    const onAction = (actionData: TownActionData) => {
      actionValues.value = actionData;
      isFormOpen.value = true;
    };

    const openForm = () => {
      // nullify any previous edit data to tell the form component that it's a new town addition request
      if (actionValues.value !== null) actionValues.value = null;
      // open the form
      isFormOpen.value = true;
    };
    watch(
      () => route.params.wilayaId as string,
      (newWilayaId) => {
        const newId = parseInt(newWilayaId);
        // when the user navigates to another wilaya from the select menu, fetch for the target wilaya towns
        if (towns.value === undefined && !isNaN(newId) && newId > 0) {
          fetchTownsData();
        }
      }
    );

    const handleSelectChange = () => {
      router.push({ name: "towns", params: { wilayaId: currentRouteWilayaId.value } });
    };

    const isFormOpen = ref(false);
    const closeForm = () => (isFormOpen.value = false);

    return {
      mdiPlusBoxMultiple,
      mdiMagnify,
      searchTerm,
      towns,
      wilayas,
      currentRouteWilayaId,
      currentRouteWilaya,
      headerWilayaName,
      handleSelectChange,
      isFetching,
      filteredTowns,

      isFormOpen,
      openForm,
      closeForm,
      onAction,
      actionValues,
    };
  },
});
</script>
