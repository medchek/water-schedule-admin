<template>
  <button
    class="
      w-1/2
      flex-col
      items-start
      justify-center
      text-sm
      sm:text-base
      lg:text-lg
      border-b-2
      py-2
      hover:bg-gradient-to-tr hover:from-white hover:to-blue-50
      dark:hover:from-white/20 dark:hover:to-white/5
      px-2
      rounded-t
      arabic:direction-rtl
    "
    :class="[
      isSelected
        ? 'border-blue-600 dark:border-indigo-500 text-bgray-500 dark:text-bgray-50 bg-white dark:bg-dark-cancel/80 dark:text-w'
        : 'text-gray-400 border-bgray-300',
    ]"
  >
    <span class="text-sm font-medium arabic:font-semibold">{{ label }}</span>
    <span class="hidden sm:inline-block text-xs md:text-sm font-medium" :class="[isSelected ? 'text-bgray-600 dark:text-indigo-300' : 'text-bgray-300']"
      >{{ weekFrom }} {{ t("schedule.toWeek") }} {{ weekTo }}</span
    >
  </button>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import { useI18n } from "vue-i18n";

export default defineComponent({
  props: {
    label: {
      type: String,
      required: true,
    },
    weekFrom: {
      type: String,
      required: true,
    },
    weekTo: {
      type: String,
      required: true,
    },
    isSelected: {
      type: Boolean,
      required: true,
    },
  },
  setup() {
    const { t } = useI18n();
    return { t };
  },
});
</script>