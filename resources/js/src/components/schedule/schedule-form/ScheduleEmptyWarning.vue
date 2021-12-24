<template>
  <section id="schedule-empty-warning" class="flex flex-col justify-center items-center w-full h-full text-center font-semibold px-4 arabic:direction-rtl">
    <p class="text-bgray-800 dark:text-bgray-200">{{ targetScheduleMessage }}.</p>
    <p class="mt-1 font-normal dark:text-bgray-400">{{ t("schedule.confirmChoice") }}</p>
    <div class="flex w-full space-x-2 justify-center arabic:space-x-reverse mt-2">
      <app-confirm-button
        class="bg-blue-500 hover:bg-blue-400 focus:bg-blue-600 w-28 px-3 py-2 rounded font-semibold text-white"
        @click="$emit('confirm')"
        :disabled="isLoading"
        :isLoading="isLoading"
      >
      </app-confirm-button>
      <button
        class="bg-gray-200 hover:bg-gray-300 w-28 px-3 py-2 rounded font-semibold text-bgray-600 dark:bg-dark-cancel dark:text-bgray-400"
        @click="$emit('cancel')"
      >
        {{ t("general.back") }}
      </button>
    </div>
  </section>
</template>

<script lang="ts">
import { computed, defineAsyncComponent, defineComponent, PropType } from "vue";
import { useI18n } from "vue-i18n";
import AppConfirmButton from "../../AppConfirmButton.vue";
export default defineComponent({
  components: {
    Loader: defineAsyncComponent(() => import("../../Loader.vue")),
    AppConfirmButton,
  },
  props: {
    isLoading: {
      type: Boolean,
      default: false,
    },
    target: {
      type: String as PropType<"current" | "next" | "both">,
      default: "current",
      required: true,
    },
  },
  setup(props) {
    const { t } = useI18n();
    const targetScheduleMessage = computed(() => {
      return props.target === "current"
        ? t("schedule.emptyCurrentWeekSchedule")
        : props.target === "next"
        ? t("schedule.emptyNextWeekSchedule")
        : props.target === "both"
        ? t("schedule.emptyBothSchedules")
        : t("schedule.emptyEitherSchedules");
    });

    return {
      targetScheduleMessage,
      // localization
      t,
    };
  },
});
</script>
