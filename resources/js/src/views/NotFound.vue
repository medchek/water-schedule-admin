<template>
  <div>
    <div class="flex flex-col justify-center items-center w-screen h-screen bg-gradient-to-br from-blue-50 to-blue-200 space-y-2">
      <p class="text-2xl font-semibold text-gray-700">Cette page n'existe pas</p>
      <button
        class="h-10 pr-4 pl-2 bg-blue-50 hover:bg-blue-500 focus:bg-blue-600 focus:text-white hover:text-white font-semibold rounded text-gray-700"
        @click="$router.push({ name: 'home' })"
      >
        <Icon :icon="mdiChevronLeft" className="w-6 h-6" />Retour
      </button>
    </div>
  </div>
</template>
<script lang="ts" setup>
import Icon from "../components/Icon.vue";
import { mdiChevronLeft } from "@mdi/js";
</script>
