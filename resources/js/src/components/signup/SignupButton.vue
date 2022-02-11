<template>
  <button
    @keydown.enter="$emit('next')"
    class="h-full px-2 2xl:px-4 rounded text-sm 2xl:text-base w-28 md:w-32 2xl:w-36"
    :disabled="isLoading"
    :class="[
      previous ? 'bg-bgray-200 hover:bg-bgray-200/70 active:bg-bgray-300 text-bgray-500' : 'bg-blue-500 hover:bg-blue-400 active:bg-blue-600 text-white',
    ]"
  >
    <loader v-if="isLoading" dark className="w-6 h-6" />
    <span v-else class="flex justify-center items-center space-x-1">
      <icon v-if="previous && !noIcon" class="rotate-180" :icon="mdiArrowRight" />
      <span><slot></slot></span>
      <icon v-if="!previous && !noIcon" :icon="mdiArrowRight" />
    </span>
  </button>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import Icon from "../Icon.vue";
import { mdiArrowRight } from "@mdi/js";
import Loader from "../Loader.vue";
export default defineComponent({
  components: { Icon, Loader },
  props: {
    previous: Boolean,
    isLoading: Boolean,
    noIcon: Boolean,
  },
  setup() {
    return { mdiArrowRight };
  },
});
</script>