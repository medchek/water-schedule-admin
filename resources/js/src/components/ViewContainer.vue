<template>
  <main class="flex flex-grow flex-col h-full overflow-hidden">
    <div class="flex items-center justify-between px-5 h-14 min-h-14">
      <span class="text-bgray-700 text-lg md:text-xl 2xl:text-2xl font-semibold">{{ label }}</span>
    </div>
    <slot> </slot>
  </main>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
  props: {
    label: {
      type: String,
      required: true,
    },
  },
  setup() {},
});
</script>
