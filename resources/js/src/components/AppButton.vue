<template>
  <button
    class="bg-blue-600 hover:bg-blue-500 text-white dark:text-bgray-700 dark:bg-white dark:hover:bg-indigo-100 font-semibold px-2 h-10 rounded-md"
    @click="$emit('click')"
  >
    <slot></slot>
  </button>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import Icon from "./Icon.vue";

export default defineComponent({
  components: { Icon },
});
</script>