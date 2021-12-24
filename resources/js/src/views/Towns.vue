<template>
  <view-container id="towns-main" :label="t('town.townsOf', { town: headerWilayaName })">
    <section
      id="towns-toolbar"
      class="flex flex-col lg:flex-row lg:arabic:flex-row-reverse lg:items-center justify-between lg:h-14 w-full mb-2 px-5 space-y-2 lg:space-y-0"
    >
      <app-open-modal-button id="add-town" @click="openForm" :icon="mdiPlusBoxMultiple">{{ t("town.addTown") }}</app-open-modal-button>

      <div class="flex arabic:flex-row-reverse justify-between lg:justify-end space-x-4 arabic:space-x-reverse">
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
          :title="t('town.selectAnotherWilaya')"
          v-model="currentRouteWilayaId"
          @change="handleSelectChange"
        >
          <option v-for="wilaya in wilayas" :key="wilaya.code" :value="wilaya.code">{{ wilaya.code }} - {{ isArLocale ? wilaya.arName : wilaya.name }}</option>
        </select>

        <app-input
          className="h-10 text-sm sm:text-base w-full lg:w-80 "
          v-model.trim.lazy="searchTerm"
          :appendIcon="mdiMagnify"
          :placeholder="t('town.searchForTown')"
          clearable
        />
      </div>
    </section>
    <section id="content-main" class="relative w-full h-full grow overflow-y-auto py-4">
      <!-- FETCHING & RETRY COMPONENTS -->
      <!-- <div class="w-full h-full flex items-center" v-if="isFetching">
        <loader className="w-12 h-12 mx-auto border-t-blue-500" customColors />
      </div> -->
      <load-and-retry
        v-if="isFetching || isFetchingError"
        :hasFailed="isFetchingError"
        :isFetching="isFetching"
        @retry="fetchTownsData"
        text="Une érreur est survenu lors de l'obtention des communes"
      />
      <!-- NO TOWNS ADD FOR WILAYA -->
      <p
        v-else-if="!isFetching && towns !== undefined && towns instanceof Array && towns.length === 0"
        class="px-4 text-base md:text-lg font-semibold w-full text-center text-gray-800"
      >
        <!-- Aucune commune n'a été ajoutée pour {{ currentRouteWilaya.name }} -->
        {{ t("town.noTownsAdded", { wilaya: currentRouteWilaya.name }) }}
      </p>
      <!-- NO FILTER MATCH -->
      <p v-else-if="searchTerm && (!filteredTowns || !filteredTowns.length)" class="px-4 text-base md:text-lg font-semibold w-full text-center text-gray-600">
        {{ t("town.noSearchMatch") }}
      </p>
      <!-- REGULAR -->
      <div v-else class="relative arabic:direction-rtl grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 grid-rows-none gap-4 w-full h-auto px-5">
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
  </view-container>
</template>
<script lang="ts">
import { computed, ComputedRef, defineComponent, onMounted, ref, watch } from "vue";
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
import Retry from "../components/Retry.vue";
import ViewContainer from "../components/ViewContainer.vue";
import { useI18n } from "vue-i18n";

export default defineComponent({
  components: { Icon, AppInput, Loader, TownForm, TownCard, AppOpenModalButton, LoadAndRetry: Retry, ViewContainer },
  setup() {
    const { t } = useI18n();
    const store = useStore();
    const route = useRoute();
    const router = useRouter();
    const searchTerm = ref<string>("");
    const towns: ComputedRef<Town[] | undefined> = computed(() => store.getters.getTownsByWilayaId(route.params.wilayaId));

    const wilayas: ComputedRef<Wilaya[]> = computed(() => store.getters.getWilayas);
    const currentRouteWilayaId = ref(route.params.wilayaId as string);

    const isArLocale = computed(() => store.getters.getIsArLang);
    const filteredTowns: ComputedRef<Town[] | Towns | null> = computed(() => {
      if (!towns.value) return null;
      if (!searchTerm.value) return towns.value;
      // localization support
      const targetName: "name" | "arName" = isArLocale.value ? "arName" : "name";
      return towns.value.filter((town) => town[targetName].toLowerCase().includes(searchTerm.value.trim().toLowerCase()));
    });
    // console.warn(filteredTowns.value);
    const currentRouteWilaya = computed(() => wilayas.value.find((wilaya) => wilaya.code === parseInt(currentRouteWilayaId.value)));
    const headerWilayaName = computed(() => {
      const targetWilaya = currentRouteWilaya.value;
      if (targetWilaya) {
        return isArLocale.value ? targetWilaya.arName : addPreposition(targetWilaya.name);
      }
    });

    const isFetching = ref(false);
    const isFetchingError = ref(false);
    const fetchTownsData = () => {
      if (!isFetching.value && !towns.value) isFetching.value = true;
      isFetchingError.value = false;
      store
        .dispatch("fetchTowns", {
          wilayaId: route.params.wilayaId,
        })
        .then((status) => {
          if (status === 200) {
            isFetchingError.value = false;
          }
        })
        .catch((err) => {
          const status = err.response.status;
          isFetchingError.value = true;

          if (status === 404) {
            store.dispatch("flashSnack", {
              // message, type, time
              message: `Wilaya ${route.params.wilayaId} n'existe pas`,
              type: "error",
            });
            router.replace("not-found");
          }
        })
        .finally(() => {
          isFetching.value = false;
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
      fetchTownsData,
      isFetching,
      isFetchingError,
      filteredTowns,

      isFormOpen,
      openForm,
      closeForm,
      onAction,
      actionValues,
      // localization
      isArLocale,
      t,
    };
  },
});
</script>
