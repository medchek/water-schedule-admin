<template>
  <div class="flex items-center h-16 max-h-16 grow w-full">
    <div class="w-full h-1.5 rounded mx-1 lg:mx-5 2xl:mx-10" :class="[completed ? 'bg-blue-500' : 'bg-bgray-300']"></div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
  props: {
    completed: Boolean,
  },
});
</script>