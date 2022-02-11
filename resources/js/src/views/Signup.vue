<template>
  <main id="signup-view" class="overflow-y-hidden p-5">
    <div
      id="signup-base"
      class="flex flex-col w-full sm:w-4/5 lg:w-2/3 mx-auto py-2 2xl:py-5 px-5 sm:px-14 lg:px-20 2xl:px-36 bg-white h-full rounded-lg overflow-hidden"
    >
      <!-- TITLE -->
      <h1 class="w-full text-center text-blue-500 text-xl 2xl:text-2xl font-semibold mb-5">Installation</h1>
      <!-- STEPS -->
      <section id="register-steps" class="flex justify-between min-h-28 max-h-28 2xl:min-h-36 2xl:max-h-36 h-36 py-1 2xl:py-5">
        <signup-step-circle :icon="steps[0].icon" :label="steps[0].label" :status="steps[0].status" />
        <signup-step-bar :completed="!isFirstStep" />
        <!--  -->
        <signup-step-circle :icon="steps[1].icon" :label="steps[1].label" :status="steps[1].status" />
        <signup-step-bar :completed="isLastStep" />
        <!--  -->
        <signup-step-circle :icon="steps[2].icon" :label="steps[2].label" :status="steps[2].status" />
      </section>
      <!-- MAIN CONTENT -->

      <!-- <signup-form /> -->

      <transition name="slide-right" mode="out-in">
        <component :is="loadedComponent" @submitted="nextStep" @updateFormValue="updateFormValue" :signupFormData="signupFormData" />
      </transition>

      <!-- BOTTOM -->
      <section
        id="register-bottom"
        class="flex flex-row-reverse h-8 min-h-8 max-h-8 2xl:min-h-10 2xl:max-h-10 2xl:h-10"
        :class="[isFirstStep ? 'justify-start' : 'justify-between']"
      >
        <signup-button :isLoading="isSendingData" :noIcon="isLastStep" id="next" @click="nextStep">{{ isLastStep ? "Confirmer" : "Continuer" }}</signup-button>
        <signup-button v-if="!isFirstStep" :disabled="isSendingData" id="previous" previous @click="previousStep"> Précédent </signup-button>
      </section>
    </div>
  </main>
</template>

<script lang="ts">
import { computed, ComputedRef, defineAsyncComponent, defineComponent, reactive, ref } from "vue";
import AppInput from "../components/AppInput.vue";
import SignupStepCircle from "../components/signup/SignupStep.vue";
import SignupStepBar from "../components/signup/SignupStepBar.vue";

import Icon from "../components/Icon.vue";
import SignupLanding from "../components/signup/SignupLanding.vue";
import FlexibleLoader from "../components/FlexibleLoader.vue";
import SignupButton from "../components/signup/SignupButton.vue";
// icons
import { mdiHomeOutline, mdiAccountOutline, mdiFileOutline } from "@mdi/js";
// ts
import { StepStatus, SignupStep } from "../types/enums";
import { SignupFormData } from "../types/components";
import axios from "axios";
import { flashErrorSnack } from "../lib/shared";
import { useRouter } from "vue-router";

type Steps = { icon: string; label: string; status: StepStatus }[];

export default defineComponent({
  components: {
    AppInput,
    SignupStepCircle,
    SignupStepBar,
    Icon,
    SignupLanding,
    SignupForm: defineAsyncComponent({ loader: () => import("../components/signup/SignupForm.vue"), loadingComponent: FlexibleLoader }),
    SignupSummary: defineAsyncComponent({ loader: () => import("../components/signup/SignupSummary.vue"), loadingComponent: FlexibleLoader }),
    SignupButton,
  },

  setup() {
    const router = useRouter();

    let currentStep = ref<SignupStep>(SignupStep.LANDING);
    const isFirstStep = computed(() => currentStep.value === SignupStep.LANDING);
    const isLastStep = computed(() => currentStep.value === SignupStep.SUMMARY);
    const steps = ref<Steps>([
      { icon: mdiHomeOutline, label: "Accueil", status: StepStatus.ONGOING },
      { icon: mdiAccountOutline, label: "Compte", status: StepStatus.PENDING },
      { icon: mdiFileOutline, label: "Sommaire", status: StepStatus.PENDING },
    ]);

    /**
     * Updates the target step status based on the index
     */
    const setStepStatus = (stepIndex: 0 | 1 | 2, status: StepStatus) => {
      if (steps.value[stepIndex].status !== status) {
        steps.value[stepIndex].status = status;
      }
    };
    // navigate to landing and update all the necessary steps status
    const toLanding = () => {
      currentStep.value = SignupStep.LANDING;
      setStepStatus(0, StepStatus.ONGOING);
      setStepStatus(1, StepStatus.PENDING);
      setStepStatus(2, StepStatus.PENDING);
    };
    // navigate to the form and update all the necessary steps status
    const toForm = () => {
      currentStep.value = SignupStep.FORM;
      setStepStatus(0, StepStatus.COMPLETED);
      setStepStatus(1, StepStatus.ONGOING);
      setStepStatus(2, StepStatus.PENDING);
    };
    // navigate to the preferences and update all the necessary steps status
    const toSummary = () => {
      currentStep.value = SignupStep.SUMMARY;
      setStepStatus(0, StepStatus.COMPLETED);
      setStepStatus(1, StepStatus.COMPLETED);
      setStepStatus(2, StepStatus.ONGOING);
    };

    const loadedComponent: ComputedRef<string> = computed(() => {
      switch (currentStep.value) {
        case SignupStep.LANDING:
          return "signup-landing";
        case SignupStep.FORM:
          return "signup-form";
        case SignupStep.SUMMARY:
          return "signup-summary";
        default:
          return "signup-landing";
      }
    });

    // signup form data
    const signupFormData = reactive<SignupFormData>({
      name: { value: "", label: "Nom de Compte", placeholder: "Nom de compte", error: "" },
      email: {
        value: "",
        label: "Email",
        placeholder: "Email",
        error: "",
        // info: "Un email valide est requis pour activer votre compte",
        type: "email",
      },
      password: { value: "", label: "Mot de Passe", placeholder: "Mot de passe", error: "", type: "password" },
      confirmPassword: { value: "", label: "Confirmer le Mot de Passe", placeholder: "Confirmer votre mot de passe", error: "", type: "password" },
    });

    // leaked password tracker.
    // populated when the server respondes with a leaked password error message,
    // this is used to prevent the user from entering the same leaked password again
    const isLeakedPassword = ref<string | null>(null);
    /**
     * Event recieved from the SignupForm component that will update the singupFormData values
     */
    const updateFormValue = (data: { key: keyof SignupFormData; value: string }) => {
      const { key, value } = data;
      signupFormData[key].value = value;
    };

    /** Sets the error message of the target key property in the signupFormData object */
    const setError = (key: keyof SignupFormData, errorMessage: string) => {
      signupFormData[key].error = errorMessage;
    };

    const resetAllFormErrors = () => {
      signupFormData.name.error = signupFormData.email.error = signupFormData.password.error = signupFormData.confirmPassword.error = "";
    };

    /**
     * Validates the form by checking **signupFormData** values
     * @returns {Promise} resolves if the validation was successfuly, otherwise rejects with no message
     */
    const checkFormForErrors = () => {
      const name = signupFormData.name;
      const email = signupFormData.email;
      const password = signupFormData.password;
      const confirmPassword = signupFormData.confirmPassword;
      // remove any previous errors
      resetAllFormErrors();
      return new Promise<void>((resolve, reject) => {
        const nameRegex = /^([a-z0-9\u0621-\u064Aàâçéèêëîïôûùüÿñæœ. _'-]){3,50}$/i;
        if (!nameRegex.test(name.value)) {
          setError("name", "Le nom de compte doit comprendre entre 3 et 50 caractères et ne peut pas contenir des caractères spéciaux");
          reject();
        }
        // email validation
        const emailRegex = /^[a-z_.-]+\@[a-z-]+\.{1}[a-z]{2,4}(.[a-z]{2,4})?$/i;
        if (!email.value) {
          setError("email", "L'adresse email est obligatoire");
          reject();
        } else if (!emailRegex.test(email.value)) {
          setError("email", "Cette adresse email est invalide");
          reject();
        }

        // password
        const passwordRegex = /(?=.*[a-zA-Z])(?=.*[0-9])/;
        if (!passwordRegex.test(password.value)) {
          setError("password", "Le mot de passe doit contenir des chiffres et des lettres et doit comprendre 8 charactères au minimum");
          reject();
        }
        if (isLeakedPassword.value === password.value) {
          setError("password", "Le mot de passe choisi a été trouvé dans la liste des fuites des données. Pour votre sécurité veuillez, choisir un nouveau");
          reject();
        }

        // confirm password
        if (!confirmPassword.value && password.value) {
          setError("confirmPassword", "Vous devez confrimer votre mot de passe");
          reject();
        } else if (confirmPassword.value !== password.value) {
          setError("confirmPassword", "Le mot de passe confirmé ne correspond pas au mot de passe entré");
          reject();
        }

        resolve();
      });
    };

    const nextStep = async () => {
      if (currentStep.value === SignupStep.LANDING) {
        // from landing
        toForm();
      } else if (currentStep.value === SignupStep.FORM) {
        // before you go to preferences, check if the form has errors
        try {
          await checkFormForErrors();
          toSummary();
        } catch {
          flashErrorSnack("Veuillez corriger les érreurs");
        }
      } else if (currentStep.value === SignupStep.SUMMARY) {
        await signup();
      } else return;
    };

    const previousStep = () => {
      if (currentStep.value === SignupStep.SUMMARY) {
        toForm();
      } else if (currentStep.value === SignupStep.FORM) {
        toLanding();
      } else return;
    };

    const isSendingData = ref(false);
    const signup = async () => {
      if (isLastStep.value) {
        isSendingData.value = true;

        const requestBody = {
          name: signupFormData.name.value,
          email: signupFormData.email.value,
          password: signupFormData.password.value,
          password_confirmation: signupFormData.confirmPassword.value,
        };

        try {
          await axios.get("/sanctum/csrf");
          await axios.post("/api/install", requestBody);
          router.replace({ name: "wilayas" });
        } catch (err: any) {
          if (axios.isAxiosError(err)) {
            const data = err.response?.data;
            const status = err.response?.status;

            if (status === 403) {
              return flashErrorSnack("Un compte administrateur existe déja");
            }

            if (data) {
              if (Object.prototype.hasOwnProperty.call(data, "password")) {
                // leakde password error checking
                if (
                  Array.isArray(data.password) &&
                  data.password.includes("The given password has appeared in a data leak. Please choose a different password.")
                ) {
                  // leaked password
                  isLeakedPassword.value = signupFormData.password.value;
                  setError(
                    "password",
                    "Le mot de passe choisi a été trouvé dans la liste des fuites des données. Pour votre sécurité, veuillez choisir un nouveau"
                  );
                  toForm();
                }
              }
            }
          }
          console.error("[Signup.vue@singup] error while singing up => ", err);
        } finally {
          isSendingData.value = false;
        }
      }
    };

    return {
      steps,
      loadedComponent,
      nextStep,
      previousStep,
      isFirstStep,
      isLastStep,
      // signup form
      signupFormData,
      updateFormValue,
      isSendingData,
    };
  },
});
</script>

<style scoped>
/* regular left slide */
.slide-enter-active {
  animation: slide 0.2s;
}
.slide-leave-active {
  animation: slide 0.2s reverse;
}
/* right slide */
.slide-right-enter-active {
  animation: slide-right 0.2s;
}
.slide-right-leave-active {
  animation: slide-right 0.2s reverse;
}

@keyframes slide {
  from {
    transform: translateX(-100%);
  }
  to {
    transform: translateX(0);
  }
}
@keyframes slide-right {
  from {
    transform: translateX(100%);
  }
  to {
    transform: translateX(0);
  }
}
</style>