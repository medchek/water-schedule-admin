<template>
  <button
    class="
      bg-blue-600
      hover:bg-blue-500
      text-white
      dark:text-bgray-700 dark:bg-white dark:hover:bg-indigo-100
      font-semibold
      px-2
      arabic:px-3
      h-10
      rounded-md
      arabic:direction-ltr arabic:flex-row-reverse
    "
    @click="$emit('click')"
  >
    <icon :icon="icon" class="w-6 h-6 mr-1 arabic:ml-1" />
    <slot></slot>
  </button>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import Icon from "./Icon.vue";

export default defineComponent({
  components: { Icon },
  emits: ["click"],
  props: {
    icon: {
      type: String,
      required: true,
    },
  },
});
</script>