<template>
  <modal
    @modalClickedOutside="$emit('formClickedOutside')"
    className="relative flex flex-col justify-between w-full sm:w-3/4 md:w-2/3 2xl:w-1/2 bg-white dark:bg-dark-bg rounded-md  py-2 overflow-hidden"
  >
    <form class="w-full h-full flex flex-col justify-between" @submit.prevent="submit">
      <h1 class="w-full text-bgray-700 dark:text-bgray-200 text-lg sm:text-xl lg:text-xl font-semibold px-5">{{ formTitle }} - {{ currentWilaya.name }}</h1>
      <town-form-delete-warning v-if="actionData && actionData.action === 'delete'" :townName="actionData.townName" :wilayaName="currentWilaya.name" />
      <section v-else class="grow h-full w-full px-5 py-5 space-y-4">
        <town-input placeholder="" label="Nom de la commune" v-model="townName" :error="townNameError" @resetInput="resetInput" />
        <town-input
          placeholder="(optionnel)"
          rtl
          label="Nom de la commune en arabe"
          v-model="arTownName"
          :error="arTownNameError"
          @resetInput="resetInput(true)"
        />
      </section>
      <section id="modal-actions" class="flex items-center justify-end min-h-16 h-16 w-full space-x-4 border-t dark:border-bgray-700 px-5">
        <button
          type="submit"
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
          :class="[
            !canSubmit && 'cursor-not-allowed',
            actionData && actionData.action === 'delete' ? 'bg-red-500 hover:bg-red-400 focus:bg-red-600' : 'bg-blue-500 hover:bg-blue-400 focus:bg-blue-600',
          ]"
          :disabled="!canSubmit"
          @click="submit"
        >
          <loader v-if="isSendingData" dark thin className="w-6 h-6" />
          <span v-else>Confirmer</span>
        </button>
        <app-cancel-button
          type="button"
          class="h-9 sm:h-10 w-24 sm:w-28 text-sm sm:text-base bg-gray-200 hover:bg-gray-100 text-gray-400 rounded font-semibold"
          @mousedown="$emit('formClickedOutside')"
        >
          Annuler
        </app-cancel-button>
      </section>
    </form>
  </modal>
</template>

<script lang="ts">
import { computed, ComputedRef, defineComponent, onMounted, PropType, ref, warn } from "vue";
import Loader from "../Loader.vue";
import Modal from "../Modal.vue";
import TownInput from "./TownInput.vue";
import TownFormDeleteWarning from "./TownFormDeleteWarning.vue";
import AppCancelButton from "../AppCancelButton.vue";

import { mdiClose } from "@mdi/js";
import Icon from "../Icon.vue";
import { useStore } from "vuex";
import { useRoute } from "vue-router";
import { AddTownRequest, Town, TownSearch, UpdateTownRequst } from "../../store/modules/towns";
import { TownActionData } from "../../types/components";
import { addPreposition } from "../../lib/shared";
import { Wilaya } from "../../store/modules/wilayas";

export default defineComponent({
  components: { Modal, Loader, Icon, TownInput, TownFormDeleteWarning, AppCancelButton },

  emits: ["formClickedOutside", "formSaved"],
  props: {
    actionData: {
      type: Object as PropType<TownActionData>,

      required: false,
    },
  },
  setup(props, { emit }) {
    const store = useStore();
    const route = useRoute();
    const currentWilayaCode = computed(() => parseInt(route.params.wilayaId as string));
    const currentWilaya: ComputedRef<Wilaya> = computed(() => store.getters.getWilayaByCode(currentWilayaCode.value));
    const isSendingData = ref(false);

    const formTitle = computed(() => {
      if (props.actionData) {
        if (props.actionData.action === "edit") {
          return `Editer ${props.actionData.townName}`;
        } else {
          return `Supprimer ${props.actionData.townName}`;
        }
      } else {
        return `Ajouter une commune`;
      }
    });
    const storeTown: ComputedRef<TownSearch | undefined> = computed(() => {
      if (props.actionData) {
        return store.getters.getTownById(props.actionData.wilayaId, props.actionData.townId);
      } else {
        return undefined;
      }
    });
    const townName = ref<string>(storeTown.value ? storeTown.value.name : "");
    const townNameError = ref("");

    const arTownName = ref<string>(storeTown.value && storeTown.value.arName ? storeTown.value.arName : "");
    const arTownNameError = ref("");

    const resetInput = (ar = false) => {
      console.log("resetting input");
      if (!ar) {
        townName.value = townNameError.value = "";
      } else {
        arTownName.value = arTownNameError.value = "";
      }
    };
    // form only can be submitted if length is greater than 3 and data is not being sent to the server
    // also in case the edit values have been passed, only submit the form the values have changed
    const canSubmit: ComputedRef<boolean> = computed(() => {
      // if the request is to delete the town, only disable the button if the data is being sent
      // since the user has nothing to input

      if (isSendingData.value) return false;
      if (props.actionData && props.actionData.action === "delete" && !isSendingData.value) return true;
      else {
        const name = townName.value.trim().toLowerCase();
        const arName = arTownName.value.trim().toLowerCase();

        if (!storeTown.value) {
          if (!name.length) return false;
          if (name.length < 3 && !arName) return false;
          // only if arabic name is set check for its validation
          if (arName) {
            if (arName.length < 3) return false;
          }
        } else {
          /// edit
          if (!name && !arName) return false;

          const storeTownName = storeTown.value.name.trim().toLowerCase();
          const storeArTownName = storeTown.value.arName ? storeTown.value.arName.trim().toLowerCase() : "";
          if (name.length) {
            if (name.length < 3 || name.length > 30) return false;

            if (name === storeTownName && !arName) {
              return false;
            }
          }
          if (arName.length > 0) {
            if (arName.length < 3 || arName.length > 30) return false;

            if (arName === storeArTownName && name === storeTownName) {
              return false;
            }
          }
        }

        return true;
      }
    });

    const checkFormOnSubmit = () => {
      const name = townName.value.trim().toLowerCase();
      const arName = arTownName.value.trim().toLowerCase();
      const storeName = storeTown.value?.name || "";
      const storeArName = storeTown.value?.arName || "";
      const action = props.actionData?.action;

      // edit
      if (action && action === "edit") {
        //  TOWN NAME FIELD

        if (name) {
          if (name === storeName && arName == storeArName) {
            townNameError.value = "Le nouveau nom de la commune éditée doit être different du nom actuel.";
            return false;
          }

          const doesTownExist: boolean = store.getters.doesTownExist(currentWilayaCode.value, name);
          if (name !== storeName) {
            if (doesTownExist) {
              townNameError.value = `${name} existe déja comme commune ${addPreposition(currentWilaya.value.name)}`;
              return false;
            }
          }

          if (name.length < 3 || name.length > 30) {
            townNameError.value = "Le nom de la commune doit être entre 3 et 30 caractères.";
            return false;
          }

          if (!/^[a-zàâçéèêëîïôûùüÿñæœ .'-]+$/i.test(name)) {
            townNameError.value = "Le nom de la commune ne peut contenir des caractères spéciaux ni des chiffres.";
            return false;
          }
        }
        // ARABIC TOWN NAME FIELD
        if (arName) {
          if (arName === storeArName && name == storeName) {
            arTownNameError.value = "Le nouveau nom de la commune éditée doit être different du nom actuel.";
            return false;
          }
          if (arName !== storeArName) {
            const doesArTownExist = store.getters.doesTownExist(currentWilayaCode.value, arTownName.value.trim(), true);
            if (doesArTownExist) {
              arTownNameError.value = `${arName} existe déja comme commune ${addPreposition(currentWilaya.value.name)}`;
              return false;
            }
          }

          if (arName.length < 3 || arName.length > 30) {
            arTownNameError.value = "Le nom Arabe de la commune doit être entre 3 et 30 caractères.";
            return false;
          }

          if (!/^[ء-ي]+$/iu.test(arName)) {
            arTownNameError.value = "Ce champ doit contenir le nom de la commune en Arabe";
            return false;
          }
        }

        return true;
      } else {
        // regular inserts
        // reset the town errors
        townNameError.value = arTownNameError.value = "";
        // CHECK THE OBLIGATORY FIELD FIRST
        if (name.length > 0) {
          if (name.length < 3 || name.length > 30) {
            townNameError.value = "Le nom de la commune doit être entre 3 et 30 caractères.";
            return false;
          }

          if (!/^[a-zàâçéèêëîïôûùüÿñæœ .'-]+$/i.test(name)) {
            townNameError.value = "Le nom de la commune ne peut contenir des caractères spéciaux ni des chiffres.";
            return false;
          }

          // if the entered values already already exists in the store (thus the db too)
          // this is just for convenience purposes since another check is performed server-side as well
          const doesTownExist: boolean = store.getters.doesTownExist(currentWilayaCode.value, name);

          if (doesTownExist) {
            townNameError.value = `${name} existe déja comme commune ${addPreposition(currentWilaya.value.name)}`;
            return false;
          }
        }
        // CHECK FOR THE ARABIC NAME ONLY IF THE FIELD IS FILLED
        if (arName.length > 0) {
          // 3 to 30 chars only
          if (arName.length < 3 || arName.length > 30) {
            arTownNameError.value = "Le nom Arabe de la commune doit être entre 3 et 30 caractères.";
            return false;
          }

          if (!/^[ء-ي]+$/iu.test(arName)) {
            arTownNameError.value = "Ce champ doit contenir le nom de la commune en Arabe";
            return false;
          }

          const doesArTownExist = store.getters.doesTownExist(currentWilayaCode.value, arTownName.value.trim(), true);
          if (doesArTownExist) {
            arTownNameError.value = `${arName} existe déja comme commune ${addPreposition(currentWilaya.value.name)}`;
            return false;
          }
        }
        return true;
      }
    };

    const submit = () => {
      if (props.actionData && props.actionData.action === "delete") {
        isSendingData.value = true;

        deleteTown();
      } else {
        // recheck for input validity again, in case the user presses the button without correcting the errors

        // if (handleOnBlurAr() && handleOnBlur()) {
        isSendingData.value = true;
        const canSubmit = checkFormOnSubmit();
        console.warn("can submit?", canSubmit);

        if (!canSubmit) {
          isSendingData.value = false;
          return;
        }
        // remove any errors if the form can be submitted
        arTownNameError.value = townNameError.value = "";
        // ALL OK BY NOW
        if (props.actionData && props.actionData.action === "edit") {
          updateTown();
        } else {
          addTown();
        }
        // }
      }
    };

    /**
     * Sumit logic for add & edit actions
     */
    const addTown = () => {
      const addTownBody: AddTownRequest = {
        wilayaId: currentWilayaCode.value,
        name: townName.value,
        arName: arTownName.value.trim(),
      };
      store
        .dispatch("saveTown", addTownBody)
        .then(() => {
          store.dispatch("flashSnack", {
            message: "Commune ajoutée avec succès.",
            type: "info",
          });
          emit("formSaved");
        })
        .catch((err: any) => {
          isSendingData.value = false;

          store.dispatch("flashSnack", {
            message: "Une érreur est survenu lors de l'opération.",
            type: "error",
          });
          console.error("[TownForm.vue]", err);
        });
    };
    const updateTown = () => {
      if (storeTown.value) {
        const updateTownBody: UpdateTownRequst = {
          townId: storeTown.value.id,
        };
        if (storeTown.value.name != townName.value.trim().toLowerCase()) {
          updateTownBody.name = townName.value.trim().toLowerCase();
        }
        if (storeTown.value.arName == null && arTownName.value.trim().length > 3 && storeTown.value.arName != arTownName.value.trim().toLowerCase()) {
          updateTownBody.arName = arTownName.value.trim().toLowerCase();
        }

        store
          .dispatch("updateTown", updateTownBody)
          .then(() => {
            store.dispatch("flashSnack", {
              message: "Commune éditée avec succès.",
              type: "info",
            });
            emit("formSaved");
          })
          .catch((err) => {
            isSendingData.value = false;
            store.dispatch("flashSnack", {
              message: "Une érreur est survenu lors de l'opération.",
              type: "error",
            });
            console.error("[TownForm.vue]", err);
          });
      } else {
        console.error("[TownForm@updateTown] storeTown is not set");
      }
    };

    const deleteTown = () => {
      if (props.actionData) {
        store
          .dispatch("deleteTown", props.actionData.townId)
          .then(() => {
            store.dispatch("flashSnack", {
              message: "Commune supprimée.",
              type: "info",
            });
            emit("formSaved");
          })
          .catch((err) => {
            isSendingData.value = false;
            store.dispatch("flashSnack", {
              message: "Une érreur est survenu lors de l'opération.",
              type: "error",
            });
            console.error("[TownForm.vue]", err);
          });
      }
    };

    return {
      townName,
      arTownName,
      townNameError,
      arTownNameError,
      resetInput,
      currentWilaya,
      // handleOnBlur,
      // handleOnBlurAr,
      formTitle,

      canSubmit,
      submit,
      //
      isSendingData,
      mdiClose,
    };
  },
});
</script>
