<template>
  <button
    class="
      w-1/2
      flex-col
      items-start
      justify-center
      text-sm
      sm:text-base
      lg:text-lg
      border-b-2
      py-2
      hover:bg-gradient-to-tr
      hover:from-white
      hover:to-blue-50
      active:bg-white
      px-2
      rounded-t
    "
    :class="[isSelected ? 'border-blue-600 text-bgray-500 bg-white' : 'text-gray-400 border-bgray-300']"
  >
    <span class="text-sm font-medium">{{ label }}</span>
    <span class="hidden sm:inline-block text-xs md:text-sm font-medium" :class="[isSelected ? 'text-bgray-600' : 'text-bgray-300']"
      >{{ weekFrom }} au {{ weekTo }}</span
    >
  </button>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
  props: {
    label: {
      type: String,
      required: true,
    },
    weekFrom: {
      type: String,
      required: true,
    },
    weekTo: {
      type: String,
      required: true,
    },
    isSelected: {
      type: Boolean,
      required: true,
    },
  },
  setup() {},
});
</script>