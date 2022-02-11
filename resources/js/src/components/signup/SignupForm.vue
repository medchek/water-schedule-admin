<template>
  <signup-content class="" label="Création de compte" description="Veuillez remplir tous les champs." className="space-y-1 xl:space-y-2">
    <signup-input
      v-for="(inputData, key) in signupFormData"
      :key="inputData.label"
      :value="inputData.value"
      :label="inputData.label"
      :placeholder="inputData.placeholder"
      :type="inputData.type ?? 'text'"
      :info="inputData.info"
      :error="inputData.error"
      autocomplete="off"
      @input="emitUpdatedValue(key, $event.target.value)"
      @keydown.enter="$emit('submitted')"
    />
  </signup-content>
</template>

<script lang="ts">
import { defineComponent, PropType } from "vue";
import { SignupFormData } from "../../types/components";
import SignupContent from "./SignupContent.vue";
import SignupInput from "./SignupInput.vue";

export default defineComponent({
  components: { SignupInput, SignupContent },
  emits: ["updateFormValue", "pressedEnter", "submitted"],
  props: {
    signupFormData: {
      type: Object as PropType<SignupFormData>,
      required: true,
    },
  },
  setup(props, { emit }) {
    const emitUpdatedValue = (key: keyof typeof props.signupFormData, value: string) => {
      const trimmedValue = value.trim();

      emit("updateFormValue", {
        key,
        value: trimmedValue,
      });
    };
    return { emitUpdatedValue };
  },
});
</script>