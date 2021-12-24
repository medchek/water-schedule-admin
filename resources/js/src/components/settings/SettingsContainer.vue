<template>
  <h3 class="text-blue-light text-xl font-semibold mb-2 arabic:direction-rtl">{{ label }}</h3>
  <p id="setting-description" class="text-gray-500 text-sm mb-4 arabic:direction-rtl">
    {{ description }}
  </p>
  <slot></slot>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
  props: {
    label: {
      type: String,
      required: true,
    },
    description: {
      type: String,
      required: true,
    },
  },
});
</script>