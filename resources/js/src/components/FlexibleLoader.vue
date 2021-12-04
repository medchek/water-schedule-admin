<template>
  <div class="flex-grow w-full h-full flex items-center justify-center">
    <loader :dark="dark" :customColors="customColors" :thin="thin" :className="className" />
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import Loader from "./Loader.vue";

export default defineComponent({
  components: { Loader },
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
});
</script>
