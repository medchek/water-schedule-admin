<template>
  <settings-container
    label="Interface"
    description=" Ces paramètres vous permettent de choisir la Wilaya et la commune par défaut. En réglant ces derniers, les liens du menu vont être adaptés pour vous mener
    directement à la list des communes de la Wilaya choisie et au programme d'eau de la commune choisie."
  >
    <form class="space-y-4" @submit.prevent="onSubmit">
      <setting-select-input
        label="Wilaya par défaut"
        info="Si aucune wilaya n'est choisie, le menu va mener à la wilaya d'Alger par défaut"
        :data="wilayaList"
        :isFetching="isFetchingWilaya"
        targetProperty="code"
        selectPrompt="Veuillez selectionner une wilaya"
        v-model="selectedWilaya"
        :disabled="isFetchingTowns"
        displayCode
      />
      <setting-select-input
        label="Commune par défaut"
        placeholder="Vous devez d'abord choisir une wilaya"
        info="Si aucune commune n'est choisie,  le menu va mener au programme d'eau de la commune d'Alger-Centre par défaut"
        selectPrompt="Veuillez selectionner une commune"
        :data="townsList"
        targetProperty="code"
        v-model="selectedTown"
        :isFetching="isFetchingTowns"
      />
      <div class="pt-1 w-full flex items-center justify-end">
        <settings-submit-button
          :isLoading="isSendingData"
          :title="
            !canSubmit && !isDiffThanStore
              ? 'Vous devez choisir une wilaya ou une commune différente avant de pouvoir confirmer'
              : !canSubmit
              ? 'Vous devez choisir une Wilaya et une commune avant de pouvoir confirmer'
              : ''
          "
          :disabled="!canSubmit"
          >Confirmer</settings-submit-button
        >
      </div>
    </form>
  </settings-container>
</template>

<script lang="ts">
import axios, { AxiosError } from "axios";
import { computed, ComputedRef, defineComponent, onMounted, ref, watch } from "vue";
import { useStore } from "vuex";
import { flashSnack } from "../../lib/shared";
import { Town } from "../../store/modules/towns";
import { SaveUserSettingsPayload, Settings } from "../../store/modules/user";
import { Wilaya } from "../../store/modules/wilayas";
import SettingsContainer from "./SettingsContainer.vue";
import SettingSelectInput from "./SettingSelectInput.vue";
import SettingsSubmitButton from "./SettingsSubmitButton.vue";

export default defineComponent({
  components: { SettingSelectInput, SettingsSubmitButton, SettingsContainer },
  name: "app-settings",
  setup() {
    const store = useStore();
    // wilaya
    const isFetchingWilaya = ref(false);
    const wilayaList: ComputedRef<Wilaya[]> = computed(() => store.getters.getWilayas);
    const userSettings: ComputedRef<Settings | null> = computed(() => store.getters.getUserSettings);

    const selectedWilaya = ref<number | null>(userSettings.value?.wilayaCode || null);

    // towns
    const isFetchingTowns = ref(false);
    const townsList: ComputedRef<Town[]> = computed(() => {
      // if the selectedWilaya is null (no selected yet), return an empty array instead of requesting the store town with a null id
      if (selectedWilaya.value === null) return [];
      // otherwise, check if the towns already in the store, to prevent refetching
      const towns: Town[] | undefined = store.getters.getSortedTownsByWilayaId(selectedWilaya.value);
      // if undefined, return yet an empty array (as expected from <setting-select-input> data prop), else return the list
      return towns === undefined ? [] : towns;
    });
    const selectedTown = ref<number | null>(userSettings.value?.townCode || null);

    onMounted(async () => {
      // if the wilaya list are empty, fetch them first
      if (wilayaList.value.length === 0) {
        isFetchingWilaya.value = true;
        await store.dispatch("fetchWilayas");
        isFetchingWilaya.value = false;
      }
      // if the use settings already exist, look for the towns as well if they are not present
      if (userSettings.value && townsList.value.length === 0) {
        isFetchingTowns.value = true;
        await store.dispatch("fetchTowns", { wilayaId: userSettings.value.wilayaCode });
        isFetchingTowns.value = false;
      }
    });

    watch(selectedWilaya, async (newlySelectedWilaId) => {
      // empty array = no data found in vuex store
      if (townsList.value.length === 0) {
        // thefore fetch
        isFetchingTowns.value = true;
        await store.dispatch("fetchTowns", { wilayaId: newlySelectedWilaId });
        isFetchingTowns.value = false;
        // also remove any previously selected town so that the user choses a new one
      }
      selectedTown.value = null;
    });

    /** Checks if the wilaya code and town code settings in the vuex store differ from the local selectedWilaya and selectedTown respectively */
    const isDiffThanStore: ComputedRef<boolean> = computed(() => {
      if (userSettings.value !== null) {
        // if the user settings are set and have not been changed, prevent form submission
        if (userSettings.value.wilayaCode === selectedWilaya.value && userSettings.value.townCode === selectedTown.value) return false;
      }
      return true;
    });
    const canSubmit: ComputedRef<boolean> = computed(() => {
      if (selectedWilaya.value === null || selectedTown.value === null) return false;
      // if the values are diff than store allow submit, else do not
      return isDiffThanStore.value;
      // // all ok
      // return true;
    });

    const isSendingData = ref(false);
    const onSubmit = () => {
      // type guard
      if (selectedWilaya.value && selectedTown.value) {
        const payload: SaveUserSettingsPayload = {
          wilayaCode: selectedWilaya.value,
          townCode: selectedTown.value,
        };
        isSendingData.value = true;
        store
          .dispatch("saveUserSettings", payload)
          .then(() => {
            isSendingData.value = false;
            flashSnack({
              message: "Données sauvgardées avec succès",
              type: "info",
            });
          })
          .catch((err: Error | AxiosError) => {
            isSendingData.value = false;
            if (axios.isAxiosError(err)) {
              const status = err.response?.status;
              // generic message to all failures
              let errorMessage = "Une erreur est survenu lors de la sauvgarde des données, veuillez reéssayer";
              if (status === 422) errorMessage = "Rien n'a changé, sauvegarde annulée (code: 422)";
              if (status === 400) errorMessage = "Erreur, Requêt érronée (code: 400)";
              if (status === 403) errorMessage = "Erreur, Method http de la requêt érronée (code: 403)";
              if (status === 404) errorMessage = "Erreur, Le serveur n'a pas pu trouver les données demandées (code: 404)";

              flashSnack({
                message: errorMessage,
                type: "error",
              });
            } else {
              console.error("SettingsUi.vue@saveUserSettings::dispatch", err);
            }
          });
      }
    };

    return {
      // wilaya
      selectedWilaya,
      wilayaList,
      isFetchingWilaya,
      // towns
      selectedTown,
      townsList,
      isFetchingTowns,
      // submit
      canSubmit,
      onSubmit,
      isSendingData,
      isDiffThanStore,
    };
  },
});
</script>