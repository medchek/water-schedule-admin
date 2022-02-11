<template>
  <signup-content
    label="Récapitulation des informations"
    description="Veuillez revoir si dessou les informations du compte administrateur que vous avez entré avant de les soumettres"
    className="space-y-4"
  >
    <signup-single-summary :label="signupFormData.name.label" :value="signupFormData.name.value" />
    <signup-single-summary :label="signupFormData.email.label" :value="signupFormData.email.value" />
    <signup-single-summary :label="signupFormData.password.label" isPassword :value="signupFormData.password.value" />
  </signup-content>
</template>

<script lang="ts">
import { defineComponent, PropType } from "vue";
import { SignupFormData } from "../../types/components";
import SignupContent from "./SignupContent.vue";
import SignupSingleSummary from "./SignupSingleSummary.vue";

export default defineComponent({
  components: { SignupContent, SignupSingleSummary },
  props: {
    signupFormData: Object as PropType<SignupFormData>,
  },
  setup() {},
});
</script>