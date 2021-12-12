<template>
  <button
    class="w-full h-16 text-sm sm:text-lg border-b-8"
    :class="
      isSelected
        ? 'text-bgray-800 dark:text-bgray-50 border-blue-500 hover:border-blue-400 font-semibold'
        : 'text-bgray-300 dark:text-bgray-600 dark:hover:text-bgray-500 border-gray-300 hover:border-gray-200 dark:border-bgray-600 dark:hover:border-bgray-400'
    "
    @click="$emit('click')"
  >
    <slot></slot>
  </button>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
  emits: ["click"],
  props: {
    isSelected: {
      type: Boolean,
      required: true,
    },
  },
});
</script>