<template>
  <settings-container :label="t('settings.password.label')" :description="`${t('settings.password.description')}.`">
    <form @submit.prevent="submit">
      <div class="mt-1 mb-1 arabic:direction-rtl" v-for="(input, key) in inputsData" :key="key">
        <label class="font-semibold text-bgray-500">{{ t(input.label) }}</label>
        <input
          v-model="input.value"
          type="password"
          class="h-12 w-full rounded-md mt-2 focus:ring-2 outline-none px-4 text-gray-500"
          :class="[input.error ? 'ring-red-400 dark:ring-red-500 ring-2' : 'ring-blue-300 dark:ring-indigo-500']"
        />
        <div class="text-xs lg:text-sm text-red-500 min-h-5 w-full py-2 font-semibold">{{ input.error }}</div>
      </div>

      <div class="pt-1 w-full flex items-center justify-end arabic:direction-rtl">
        <settings-submit-button :title="!canSubmit ? t('general.mustFillAllFields') : ''" :disabled="!canSubmit || isSendingData" :isLoading="isSendingData" />
      </div>
    </form>
  </settings-container>
  <!-- </section> -->
</template>

<script lang="ts">
import axios, { AxiosError } from "axios";
import { computed, ComputedRef, defineComponent, reactive, ref } from "vue";
import { useI18n } from "vue-i18n";
import { useStore } from "vuex";
import { flashSnack } from "../../lib/shared";
import { ResetPasswordPayload } from "../../store/modules/user";
import Loader from "../Loader.vue";
import SettingsContainer from "./SettingsContainer.vue";
import SettingsSubmitButton from "./SettingsSubmitButton.vue";

export default defineComponent({
  components: { Loader, SettingsSubmitButton, SettingsContainer },
  name: "password-settings",
  setup() {
    const store = useStore();
    const { t } = useI18n();

    const inputsData = reactive({
      currentPassword: {
        label: "settings.password.currentPassword",
        value: "",
        error: "",
      },
      newPassword: {
        label: "settings.password.newPassword",
        value: "",
        error: "",
      },
      confirmNewPassword: {
        label: "settings.password.confirmNewPassword",
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
        inputsData.newPassword.error = t("settings.password.errors.alphanumeric");
        return false;
      }

      if (!isPasswordCorrect) {
        inputsData.newPassword.error = t("settings.password.errors.alphanumeric");
        return false;
      }

      if (newPassword !== confirmNewPassword) {
        inputsData.confirmNewPassword.error = t("settings.password.errors.wrongConfirmed");
        return false;
      }

      if (newPassword === currentPassword) {
        inputsData.newPassword.error = t("settings.password.errors.sameAsCurrent");
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
              message: t("settings.password.successfullyChanged"),
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
                inputsData.currentPassword.error = t("settings.password.errors.incorrectCurrent");
                return;
              }
              // bad request = invalid data while validating
              if (status == 400) {
                // if the server indicated that this password was found in the leaked list

                if (message && message === "leaked password") {
                  inputsData.newPassword.error = t("settings.password.errors.leaked");
                } else {
                  // else, data sent was unexpected
                  return flashSnack({
                    message: t("settings.password.errors.invalidRequest"),
                    type: "error",
                  });
                }
              }
            }

            // any other error
            flashSnack({
              message: t("general.snack.errors.sendingError"),
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
      // localization
      t,
    };
  },
});
</script>