<template>
  <span
    :class="[
      className ? className : 'w-8 h-8',
      dark && 'border-white border-t-transparent',
      dark === false && customColors === false && 'border-bgray-600 border-t-white',
      thin ? 'border-2' : 'border-4',
    ]"
    class="border-4 rounded-half animate-spin"
  ></span>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
  props: {
    className: {
      type: String,
    },
    dark: {
      type: Boolean,
      default: false,
    },
    customColors: {
      type: Boolean,
      default: false,
    },
    thin: {
      type: Boolean,
      default: false,
    },
  },
  setup() {},
});
</script>
