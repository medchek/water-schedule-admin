<template>
  <button
    class="
      h-9
      sm:h-10
      w-24
      sm:w-28
      text-sm
      sm:text-base
      bg-gray-200
      hover:bg-gray-100
      dark:bg-dark-cancel dark:hover:bg-dark-cancel/80
      text-gray-400
      rounded
      font-semibold
    "
    @click="$emit('click')"
  >
    Annuler
  </button>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
  emits: ["click"],
});
</script>