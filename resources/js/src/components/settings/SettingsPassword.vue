<template>
  <!-- <section class="h-full overflow-scroll"> -->
  <h3 class="text-blue-light text-xl font-semibold mb-2">Mot de Passe</h3>
  <p id="setting-description" class="text-gray-500 text-sm mb-4">
    Pour mettre à jour votre mot de pass, vous devez d'abord entrer le mot de pass actuel avant de confirmer le nouveau.
  </p>
  <form @submit.prevent="submit">
    <div class="mt-1 mb-1" v-for="(input, key) in inputsData" :key="key">
      <label class="font-semibold text-bgray-500">{{ input.label }}</label>
      <input
        v-model="input.value"
        type="password"
        class="h-12 w-full rounded-md mt-2 focus:ring-2 outline-none px-4 text-gray-500"
        :class="[input.error ? 'ring-red-400 ring-2' : 'ring-blue-300']"
      />
      <div class="text-xs lg:text-sm text-red-500 min-h-5 w-full py-2 font-semibold">{{ input.error }}</div>
    </div>

    <div class="pt-1 w-full flex items-center justify-end">
      <settings-submit-button :title="!canSubmit ? 'Vous devez remplir tout les champs' : ''" :disabled="!canSubmit || isSendingData" :isLoading="isSendingData"
        >Confirmer</settings-submit-button
      >
    </div>
  </form>
  <!-- </section> -->
</template>

<script lang="ts">
import axios, { AxiosError } from "axios";
import { computed, ComputedRef, defineComponent, reactive, ref } from "vue";
import { useStore } from "vuex";
import { flashSnack } from "../../lib/shared";
import { ResetPasswordPayload } from "../../store/modules/user";
import Loader from "../Loader.vue";
import SettingsSubmitButton from "./SettingsSubmitButton.vue";

export default defineComponent({
  components: { Loader, SettingsSubmitButton },
  name: "password-settings",
  setup() {
    const store = useStore();

    const inputsData = reactive({
      currentPassword: {
        label: "Mot de passe actuel",
        value: "",
        error: "",
      },
      newPassword: {
        label: "Nouveau mot de passe",
        value: "",
        error: "",
      },
      confirmNewPassword: {
        label: "Confirmer le nouveau mot de passe",
        value: "",
        error: "",
      },
    });

    const canSubmit: ComputedRef<boolean> = computed(() => {
      return inputsData.currentPassword.value.length > 0 && inputsData.newPassword.value.length > 0 && inputsData.confirmNewPassword.value.length > 0;
    });

    const resetAllErrors = () => {
      inputsData.currentPassword.error = inputsData.newPassword.error = inputsData.confirmNewPassword.error = "";
    };

    const resetForm = () => {
      inputsData.currentPassword.error = inputsData.newPassword.error = inputsData.confirmNewPassword.error = "";
      inputsData.currentPassword.value = inputsData.newPassword.value = inputsData.confirmNewPassword.value = "";
    };

    /**
     * Validates the from
     * @return true if no errors were encountered, false otherwise
     */
    const validateForm = (): boolean => {
      if (!canSubmit.value) return false;
      resetAllErrors();
      const passwordRegex = /(?=.*[a-zA-Z])(?=.*[0-9])/;
      const currentPassword = inputsData.currentPassword.value;
      const newPassword = inputsData.newPassword.value;
      const confirmNewPassword = inputsData.confirmNewPassword.value;
      const isPasswordCorrect = passwordRegex.test(newPassword);

      if (newPassword.length < 8 || newPassword.length > 100) {
        inputsData.newPassword.error = "Le nouveau mot de passe doit comprendre 8 charactères au minimum";
        return false;
      }

      if (!isPasswordCorrect) {
        inputsData.newPassword.error = "Le nouveau mot de passe doit contenir des chiffres et des lettres et doit comprendre 8 charactères au minimum";
        return false;
      }

      if (newPassword !== confirmNewPassword) {
        inputsData.confirmNewPassword.error = "Le mot de passe confirmé ne correspond au nouveau mot de passe";
        return false;
      }

      if (newPassword === currentPassword) {
        inputsData.newPassword.error = "Le nouveau mot de passe doit être different du mot de passe actuel";
        return false;
      }

      // no error
      return true;
    };

    const isSendingData = ref(false);

    const submit = () => {
      if (validateForm()) {
        isSendingData.value = true; // start loader
        const payload: ResetPasswordPayload = {
          currentPassword: inputsData.currentPassword.value,
          newPassword: inputsData.newPassword.value,
          newPasswordConfirmation: inputsData.confirmNewPassword.value,
        };
        store
          .dispatch("resetPassword", payload)
          .then(() => {
            isSendingData.value = false; // stop loader
            flashSnack({
              message: "Le mot de passe a été changé avec succès",
              type: "info",
            });
            resetForm();
          })
          .catch((err: Error | AxiosError) => {
            isSendingData.value = false; // stop loader

            if (axios.isAxiosError(err)) {
              const status = err.response?.status;
              const message = err.response?.data;
              if (status == 403) {
                // 403 = forbidden = incorrect password
                inputsData.currentPassword.error = "Le mot de passe actuel est incorrect";
                return;
              }
              // bad request = invalid data while validating
              if (status == 400) {
                // if the server indicated that this password was found in the leaked list

                if (message && message === "leaked password") {
                  inputsData.newPassword.error =
                    "Le nouveau mot de passe choisi a été trouvé dans la liste des fuites de données, pour votre sécurité veuillez choisir un nouveau";
                } else {
                  // else, data sent was unexpected
                  return flashSnack({
                    message: "Les informatios envoyées au serveur sont invalides",
                    type: "error",
                  });
                }
              }
            }

            // any other error
            flashSnack({
              message: "Une erreur est survenu lors de l'envoi des données, veuillez reéssayer",
              type: "error",
            });
            console.error("[SettingsPassword.vue@submit]", err);
          });
      }
    };

    return {
      inputsData,
      canSubmit,

      submit,
      isSendingData,
    };
  },
});
</script>