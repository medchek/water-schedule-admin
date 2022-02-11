<template>
  <div class="flex flex-col w-full px-0.5">
    <label :for="`${label}-input`" class="text-sm md:text-base 2xl:text-lg font-semibold text-bgray-500 mb-2">{{ label }}</label>
    <input
      @input="$emit('input', $event)"
      class="
        w-full
        h-9
        xl:h-10
        text-sm
        md:text-base
        pl-2
        border border-gray-200
        focus:ring-2
        dark:ring-indigo-500
        rounded-md
        placeholder-gray-300
        dark:placeholder-bgray-400
      "
      :class="[error ? 'ring-2 ring-red-500' : 'ring-blue-300']"
      :value="value"
      :id="`${label}-input`"
      :placeholder="placeholder"
      :type="type"
      :autocomplete="type === 'password' ? 'new-password' : 'off'"
    />
    <span class="flex items-center min-h-6 text-xs xl:text-sm 2xl:font-medium mt-1" :class="[info && !error ? 'text-bgray-400' : 'text-red-500']"
      >{{ error }}
      <icon v-if="info && !error" :icon="mdiInformationOutline" className="w-5 h-5 mr-1" />
      {{ info && !error ? info : null }}</span
    >
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import AppInput from "../AppInput.vue";
import Icon from "../Icon.vue";
import { mdiInformationOutline } from "@mdi/js";

export default defineComponent({
  components: { AppInput, Icon },
  props: {
    modelValue: String,
    label: {
      type: String,
      required: true,
    },
    value: String,
    type: String,
    placeholder: String,
    error: String,
    info: String,
  },
  setup() {
    return { mdiInformationOutline };
  },
});
</script>