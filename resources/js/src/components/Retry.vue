<template>
  <div id="retry" class="flex justify-center items-center w-full h-full">
    <section v-if="hasFailed" class="flex justify-center items-center flex-col w-full h-full">
      <p class="text-bgray-700 dark:text-bgray-300 text-sm lg:text-base mb-5 px-5 text-center">{{ text }}</p>
      <app-button @click="$emit('retry')">Reéssayer</app-button>
    </section>
    <loader v-if="isFetching && !hasFailed" className="w-14 h-14 mx-auto border-t-blue-500 dark:border-t-transparent" customColors />
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import AppButton from "./AppButton.vue";
import Loader from "./Loader.vue";

export default defineComponent({
  components: { AppButton, Loader },
  emits: ["retry"],
  props: {
    isFetching: {
      type: Boolean,
      required: true,
    },
    hasFailed: {
      type: Boolean,
      required: true,
    },
    text: {
      type: String,
      default: "Une érreur est survenue lors de l'obtention des données",
    },
  },
});
</script>