<template>
  <button
    class="relative group flex justify-start w-full h-28 xl:h-32 2xl:h-40 rounded-lg overflow-hidden transition-all shadow-xl"
    :class="[isSelected && 'shadow-blue-900/10 ring-2 ring-blue-500']"
  >
    <span
      class="flex items-center justify-center w-16 md:w-24 2xl:w-32 bg-gradient-to-tr shrink h-full text-white transition-colors"
      :class="[!darkSelector ? 'group-hover:to-blue-500 from-blue-400 to-blue-600 ' : 'from-dark-menu to-dark-alt group-hover:to-dark-blue2']"
    >
      <icon :icon="icon" className="w-8 h-8 xl:w-9 xl:h-9" />
    </span>
    <span
      class="flex items-center justify-center h-full grow md:text-lg xl:text-xl font-semibold"
      :class="[!darkSelector ? 'text-blue-500 bg-blue-50 group-hover:bg-white' : 'bg-dark-menu text-bgray-200 group-hover:bg-dark-card group-hover:text-white']"
      >{{ text }}</span
    >
    <span class="absolute flex justify-center items-center text-blue-500 right-2 top-0 bottom-0" v-if="isSelected">
      <icon :icon="mdiCheck" className="w-7 h-7 xl:w-9 xl:h-9" />
    </span>
  </button>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import { mdiCheck } from "@mdi/js";
import Icon from "../Icon.vue";

export default defineComponent({
  components: { Icon },
  props: {
    darkSelector: {
      type: Boolean,
      default: false,
    },
    isSelected: {
      type: Boolean,
      default: false,
    },
    icon: {
      type: String,
      required: true,
    },
    text: {
      type: String,
      required: true,
    },
  },
  setup() {
    return { mdiCheck };
  },
});
</script>