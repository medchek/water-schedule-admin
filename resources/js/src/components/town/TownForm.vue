<template>
  <modal
    @modalClickedOutside="$emit('formClickedOutside')"
    className="relative flex flex-col justify-between w-full sm:w-3/4 md:w-2/3 2xl:w-1/2 bg-white rounded-md  py-2 overflow-hidden"
  >
    <div class="w-full h-full flex flex-col justify-between">
      <h1 class="w-full text-bgray-700 text-lg sm:text-xl lg:text-2xl font-semibold px-5">Ajouter une commune - {{ currentWilaya.name }}</h1>
      <section class="flex-grow h-full w-full px-5 py-5 space-y-4">
        <town-input placeholder="" label="Nom de la commune" v-model="townName" @resetInput="resetInput" :error="townNameError" @blur="handleOnBlur" />
        <town-input
          placeholder="(optionnel)"
          rtl
          label="Nom de la commune en arabe"
          v-model="arTownName"
          @resetInput="resetInput(true)"
          @blur="handleOnBlurAr"
          :error="arTownNameError"
        />
      </section>
      <section id="modal-actions" class="flex items-center justify-end min-h-16 h-16 w-full space-x-4 border-t px-5">
        <button
          class="
            h-9
            sm:h-10
            w-24
            sm:w-28
            text-sm
            sm:text-base
            bg-blue-500
            hover:bg-blue-400
            focus:bg-blue-600
            text-white
            rounded
            font-semibold
            disabled:bg-bgray-400
            transition-colors
          "
          :disabled="!canSubmit"
          @click="submit"
        >
          <loader v-if="isSendingData" dark thin className="w-6 h-6" />
          <span v-else>Confirmer</span>
        </button>
        <button
          class="h-9 sm:h-10 w-24 sm:w-28 text-sm sm:text-base bg-gray-200 hover:bg-gray-100 text-gray-400 rounded font-semibold"
          @click="$emit('formClickedOutside')"
        >
          Annuler
        </button>
      </section>
    </div>
  </modal>
</template>

<script lang="ts">
import { computed, defineComponent, ref } from "vue";
import Loader from "../Loader.vue";
import Modal from "../Modal.vue";
import TownInput from "./TownInput.vue";

import { mdiClose } from "@mdi/js";
import Icon from "../Icon.vue";
import { useStore } from "vuex";
import { useRoute } from "vue-router";

export default defineComponent({
  components: { Modal, Loader, Icon, TownInput },

  emits: ["formClickedOutside", "formSaved"],

  setup() {
    const store = useStore();
    const route = useRoute();
    const currentWilayaCode = computed(() => parseInt(route.params.wilayaId as string));
    const currentWilaya = computed(() => store.getters.getWilayaByCode(currentWilayaCode.value));
    const isSendingData = ref(false);
    const townName = ref("");
    const townNameError = ref("");

    const arTownName = ref("");
    const arTownNameError = ref("");

    const resetInput = (ar = false) => {
      if (!ar) {
        townName.value = townNameError.value = "";
      } else {
        arTownName.value = arTownNameError.value = "";
      }
    };

    const canSubmit = computed(() => townName.value.trim().length > 0);
    const handleOnBlur = (): boolean => {
      const value = townName.value.trim();
      if (value.length > 0) {
        if (value.length > 30) {
          townNameError.value = "Le nom de la commune ne peut contenir plus de 30 caractères.";
          return false;
        }
        const regex = /^[a-zàâçéèêëîïôûùüÿñæœ .'-]+$/gi;
        const match = regex.test(value);
        if (!match) {
          townNameError.value = "Le nom de la commune ne peut contenir des caractères spéciaux, ni des chiffres.";
          return false;
        }
      }
      townNameError.value = "";
      return true;
    };
    const handleOnBlurAr = (): boolean => {
      // only run compute this if required town name is set
      if (!canSubmit.value) return false;
      const value = arTownName.value.trim();
      if (value.length > 0) {
        if (value.length > 30) {
          arTownNameError.value = "Le nom de la commune ne peut contenir plus de 30 caractères.";
          return false;
        }
        const regex = /^[ء-ي]+$/gi;
        const match = regex.test(value);
        if (!match) {
          arTownNameError.value = "Ce champ doit contenir le nom de la commune en arable.";
          return false;
        }
      }
      arTownNameError.value = "";
      return true;
    };

    const submit = () => {
      console.log("submitting");
      if (townName.value.trim().length <= 0) {
        townNameError.value = "Ce champ est obligatoire.";
        return;
      } else {
        // remove the above error if it exists
        townNameError.value = "";
        // recheck for input validity again, in case the user presses the button without correcting the errors
        if (handleOnBlurAr() && handleOnBlur()) {
        }
      }
    };

    return {
      townName,
      arTownName,
      townNameError,
      arTownNameError,
      resetInput,
      currentWilaya,
      handleOnBlur,
      handleOnBlurAr,

      canSubmit,
      submit,
      //
      isSendingData,
      mdiClose,
    };
  },
});
</script>
