<template>
  <modal
    @modalClickedOutside="$emit('formClickedOutside')"
    className="relative flex flex-col justify-between w-full sm:w-3/4 md:w-2/3 2xl:w-1/2 bg-white dark:bg-dark-bg rounded-md  py-2 overflow-hidden"
  >
    <form class="w-full h-full flex flex-col justify-between arabic:direction-rtl" @submit.prevent="submit">
      <h1 class="w-full text-bgray-700 dark:text-bgray-200 text-lg sm:text-xl lg:text-xl font-semibold px-5">
        {{ formTitle }} - {{ isArLocale ? "ولاية " + currentWilaya.arName : currentWilaya.name }}
      </h1>
      <town-form-delete-warning v-if="actionData && actionData.action === 'delete'" :townName="actionData.townName" :wilayaName="currentWilaya.name" />
      <section v-else class="grow h-full w-full px-5 py-5 space-y-4">
        <town-input ltr placeholder="" :label="t('town.townName')" v-model="townName" :error="townNameError" @resetInput="resetInput" />
        <town-input rtl :label="t('town.arabicTownName')" v-model="arTownName" :error="arTownNameError" @resetInput="resetInput(true)" />
      </section>
      <section
        id="modal-actions"
        class="flex items-center justify-end min-h-16 h-16 w-full space-x-4 arabic:space-x-reverse border-t dark:border-bgray-700 px-5"
      >
        <app-confirm-button
          :isDelete="actionData && actionData.action === 'delete'"
          type="submit"
          :isLoading="isSendingData"
          :disabled="!canSubmit"
          :title="!canSubmit && !isSendingData && !townName && !arTownName ? t('general.mustFillAllFields') : ''"
          @click="submit"
        />
        <app-cancel-button
          type="button"
          class="h-9 sm:h-10 w-24 sm:w-28 text-sm sm:text-base bg-gray-200 hover:bg-gray-100 text-gray-400 rounded font-semibold"
          @mousedown="$emit('formClickedOutside')"
        />
      </section>
    </form>
  </modal>
</template>

<script lang="ts">
import { computed, ComputedRef, defineComponent, PropType, ref } from "vue";
import Loader from "../Loader.vue";
import Modal from "../Modal.vue";
import TownInput from "./TownInput.vue";
import TownFormDeleteWarning from "./TownFormDeleteWarning.vue";
import AppCancelButton from "../AppCancelButton.vue";

import { mdiClose } from "@mdi/js";
import Icon from "../Icon.vue";
import { useStore } from "vuex";
import { useRoute } from "vue-router";
import { AddTownRequest, TownSearch, UpdateTownRequst } from "../../store/modules/towns";
import { TownActionData } from "../../types/components";
import { addPreposition } from "../../lib/shared";
import { Wilaya } from "../../store/modules/wilayas";
import AppConfirmButton from "../AppConfirmButton.vue";
import { useI18n } from "vue-i18n";

export default defineComponent({
  components: { Modal, Loader, Icon, TownInput, TownFormDeleteWarning, AppCancelButton, AppConfirmButton },

  emits: ["formClickedOutside", "formSaved"],
  props: {
    actionData: {
      type: Object as PropType<TownActionData>,

      required: false,
    },
  },
  setup(props, { emit }) {
    const { t } = useI18n();
    const store = useStore();
    const route = useRoute();
    const isArLocale = computed(() => store.getters.getIsArLang);
    const currentWilayaCode = computed(() => parseInt(route.params.wilayaId as string));
    const currentWilaya: ComputedRef<Wilaya> = computed(() => store.getters.getWilayaByCode(currentWilayaCode.value));
    const isSendingData = ref(false);

    const formTitle = computed(() => {
      if (props.actionData) {
        if (props.actionData.action === "edit") {
          return `${t("general.modify")} ${props.actionData.townName}`;
        } else {
          return `${t("general.delete")} ${props.actionData.townName}`;
        }
      } else {
        return t("town.addTown");
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

    /**
     * reset an input
     * @param ar reset the town arabic input
     */
    const resetInput = (ar = false) => {
      if (!ar) {
        townName.value = townNameError.value = "";
      } else {
        arTownName.value = arTownNameError.value = "";
      }
    };
    /**
     * compares the local town name/arName to the vuex store if it exists
     */
    const isDifferentThatStore = (): { name: boolean; arName: boolean } => {
      return {
        name: townName.value.trim().toLowerCase() != storeTown.value?.name,
        arName: arTownName.value.trim().toLowerCase() != storeTown.value?.arName,
      };
    };

    // form only can be submitted if length is greater than 3 and data is not being sent to the server
    // also in case the edit values have been passed, only submit the form the values have changed
    const canSubmit: ComputedRef<boolean> = computed(() => {
      // if the request is to delete the town, only disable the button if the data is being sent
      // since the user has nothing to input
      const action = props.actionData?.action;

      if (isSendingData.value) return false;
      if (action && action === "delete") return true;
      else {
        const name = townName.value.trim().toLowerCase();
        const arName = arTownName.value.trim().toLowerCase();

        if (name.length < 3 || name.length > 30 || arName.length < 3 || arName.length > 30) {
          return false;
        } else if (action && action === "edit") {
          const isDiff = isDifferentThatStore();

          if (!isDiff.name && !isDiff.arName) {
            return false;
            // else edit identical to store name
          } else return true;
          // else regular check
        } else {
          return true;
        }
      }
    });

    const checkFormOnSubmit = () => {
      const wilayaName = isArLocale.value ? currentWilaya.value.arName : addPreposition(currentWilaya.value.name);
      const name = townName.value.trim().toLowerCase();
      const arName = arTownName.value.trim().toLowerCase();
      const storeName = storeTown.value?.name || "";
      const storeArName = storeTown.value?.arName || "";
      const action = props.actionData?.action;

      // edit
      if (action && action === "edit") {
        //  TOWN NAME FIELD
        // edit name must be diff than current
        if (name) {
          if (name === storeName && arName == storeArName) {
            // townNameError.value = "Le nouveau nom de la commune éditée doit être different du nom actuel.";
            townNameError.value = t("town.errors.editedNameMustDifferFromCurrent");
            return false;
          }

          const doesTownExist: boolean = store.getters.doesTownExist(currentWilayaCode.value, name);
          if (name !== storeName) {
            if (doesTownExist) {
              // townNameError.value = `${name} existe déja comme commune ${addPreposition(currentWilaya.value.name)}`;
              townNameError.value = t("town.errors.alreadyExists", { townName: name, wilaya: wilayaName });
              return false;
            }
          }

          // town name must be 3 to 30 chars
          if (name.length < 3 || name.length > 30) {
            // townNameError.value = "Le nom de la commune doit être entre 3 et 30 caractères.";
            townNameError.value = t("town.errors.nameLength");
            return false;
          }

          // no special chars no number
          if (!/^[a-zàâçéèêëîïôûùüÿñæœ .'-]+$/i.test(name)) {
            // townNameError.value = "Le nom de la commune ne peut contenir des caractères spéciaux ni des chiffres.";
            townNameError.value = t("towns.errors.noSpecialChars");
            return false;
          }
        }
        // ARABIC TOWN NAME FIELD
        if (arName) {
          if (arName === storeArName && name == storeName) {
            arTownNameError.value = t("town.errors.editedArNameMustDifferFromCurrent");
            return false;
          }
          if (arName !== storeArName) {
            const doesArTownExist = store.getters.doesTownExist(currentWilayaCode.value, arTownName.value.trim(), true);
            // must differ from current
            if (doesArTownExist) {
              arTownNameError.value = t("town.errors.alreadyExists", { townName: name, wilaya: wilayaName });
              return false;
            }
          }

          if (arName.length < 3 || arName.length > 30) {
            arTownNameError.value = t("town.current.arNameLength");
            return false;
          }

          if (!/^[ء-ي ]+$/iu.test(arName)) {
            arTownNameError.value = t("town.errors.mustBeArabic");
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
            townNameError.value = t("town.errors.nameLength");
            return false;
          }

          if (!/^[a-zàâçéèêëîïôûùüÿñæœ .'-]+$/i.test(name)) {
            townNameError.value = t("town.errors.noSpecialChars");
            return false;
          }

          // if the entered values already already exists in the store (thus the db too)
          // this is just for convenience purposes since another check is performed server-side as well
          const doesTownExist: boolean = store.getters.doesTownExist(currentWilayaCode.value, name);

          if (doesTownExist) {
            townNameError.value = t("town.errors.alreadyExists", { townName: name, wilaya: wilayaName });
            return false;
          }
        }
        // CHECK FOR THE ARABIC NAME ONLY IF THE FIELD IS FILLED
        if (arName.length > 0) {
          // 3 to 30 chars only
          if (arName.length < 3 || arName.length > 30) {
            arTownNameError.value = t("town.current.arNameLength");
            return false;
          }

          if (!/^[ء-ي ]+$/iu.test(arName)) {
            arTownNameError.value = t("town.errors.mustBeArabic");
            return false;
          }

          const doesArTownExist = store.getters.doesTownExist(currentWilayaCode.value, arTownName.value.trim(), true);
          if (doesArTownExist) {
            arTownNameError.value = t("town.errors.alreadyExists", { townName: name, wilaya: wilayaName });
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
        const canSubmit = checkFormOnSubmit();

        if (!canSubmit) {
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
      isSendingData.value = true;

      const addTownBody: AddTownRequest = {
        wilayaId: currentWilayaCode.value,
        name: townName.value.trim(),
        arName: arTownName.value.trim(),
      };
      store
        .dispatch("saveTown", addTownBody)
        .then(() => {
          store.dispatch("flashSnack", {
            message: t("town.addedSuccessfully"),
            type: "info",
          });
          emit("formSaved");
        })
        .catch((err: any) => {
          store.dispatch("flashSnack", {
            message: t("town.failedOperation"), // add failed
            type: "error",
          });
          console.error("[TownForm.vue]", err);
        })
        .finally(() => {
          isSendingData.value = false;
        });
    };

    const updateTown = () => {
      isSendingData.value = true;

      if (storeTown.value) {
        const isDiff = isDifferentThatStore();
        const updateTownBody: UpdateTownRequst = {
          townId: storeTown.value.id,
        };
        if (townName.value.trim().toLowerCase() && isDiff.name) {
          updateTownBody.name = townName.value.trim().toLowerCase();
        }
        if (arTownName.value.trim().toLowerCase() && isDiff.arName) {
          updateTownBody.arName = arTownName.value.trim().toLowerCase();
        }
        store
          .dispatch("updateTown", updateTownBody)
          .then(() => {
            store.dispatch("flashSnack", {
              message: t("town.editedSuccessfully"),
              type: "info",
            });
            emit("formSaved");
          })
          .catch((err) => {
            store.dispatch("flashSnack", {
              message: t("town.failedOperation"), // edit failed
              type: "error",
            });
            console.error("[TownForm.vue]", err);
          })
          .finally(() => {
            isSendingData.value = false;
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
              message: t("town.deletedSuccessfully"),
              type: "info",
            });
            emit("formSaved");
          })
          .catch((err) => {
            isSendingData.value = false;
            store.dispatch("flashSnack", {
              message: t("town.failedOperation"), // delete fail
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

      // localization
      t,
      isArLocale,
      //
      isSendingData,
      mdiClose,
    };
  },
});
</script>
