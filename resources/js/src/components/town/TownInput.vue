<template>
  <div class="w-full h-auto">
    <label :for="randId" class="text-bgray-500 text-sm md:text-base font-medium">{{ label }}</label>
    <div class="w-full h-10 relative mt-1">
      <input
        class="w-full h-full rounded px-2 border focus:ring-2"
        :class="error ? 'ring-2 ring-red-300' : 'ring-blue-200'"
        :dir="rtl ? 'rtl' : 'ltr'"
        :placeholder="placeholder"
        @input="$emit('update:modelValue', $event.target.value)"
        :value="modelValue"
        :id="randId"
        @blur="$emit('blur')"
        autocomplete="off"
        required
        spellcheck="false"
      />
      <!-- button previous v-if="hours !== null || minutes !== null" -->
      <button
        v-if="modelValue.trim().length"
        @click="$emit('resetInput')"
        title="réinitialiser"
        class="absolute top-0 h-full w-10 text-blue-700 hover:text-gray-700 focus:bg-gray-100 rounded-r"
        :class="rtl ? 'left-0' : 'right-0'"
      >
        <icon :icon="mdiClose" />
      </button>
    </div>
    <p class="relative text-xs md:text-sm text-red-500 font-semibold mt-0.5">{{ error }}</p>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import { mdiClose } from "@mdi/js";
import Icon from "../Icon.vue";

export default defineComponent({
  emits: ["resetInput", "blur", "update:modelValue"],
  components: { Icon },
  props: {
    modelValue: {
      type: String,
      default: "",
    },
    error: {
      type: String,
      default: "",
    },
    disabled: {
      type: Boolean,
      default: false,
    },
    rtl: Boolean,
    placeholder: { type: String },
    label: {
      type: String,
      required: true,
    },
  },
  setup() {
    const randId = `input-${Math.ceil(Math.random() * 1000 + 1)}`;
    return { mdiClose, randId };
  },
});
</script>
