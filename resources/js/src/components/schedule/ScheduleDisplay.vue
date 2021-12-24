<template>
  <div class="grow h-full overflow-y-hidden">
    <div
      class="flex grow w-full h-full justify-center items-center font-medium text-bgray-700 dark:text-bgray-100 text-center arabic:direction-rtl"
      v-if="isStoreScheduleEmpty"
    >
      <p>
        {{ t("schedule.scheduleNotAddedYet", { targetWeek }) }}
        <span class="font-bold text-blue-600 dark:text-white capitalize"> {{ townName }}</span
        >.
      </p>
    </div>
    <div class="flex grow w-full h-full overflow-y-auto" v-else>
      <section class="flex flex-col space-y-2 grow">
        <div
          v-for="schedule in displaySchedule"
          :key="schedule.day"
          class="flex arabic:flex-row-reverse items-center bg-white dark:bg-dark-menu rounded-md overflow-hidden shadow-sm h-full"
        >
          <p
            class="
              text-sm
              md:text-base
              flex
              items-center
              font-semibold
              capitalize
              min-w-24
              md:min-w-28
              h-full
              text-bgray-700
              dark:text-white
              bg-gradient-to-br
              from-bgray-200
              to-gray-50
              dark:from-dark-card dark:to-dark-alt
              border-r-2
              arabic:border-l-4 arabic:border-r-0
              md:border-r-4
              pl-3
              arabic:direction-rtl arabic:pr-3
            "
            :class="[schedule.waterUnavailable ? ' border-red-300 dark:border-red-500' : 'border-blue-300 dark:border-blue-500']"
          >
            {{ isArLocale ? schedule.arDay : schedule.day }}
          </p>
          <p
            class="
              text-xs
              sm:text-sm
              grow
              pl-4
              arabic:pr-4
              text-bgray-700
              dark:text-bgray-50
              font-semibold
              sm:font-medium
              first-letter:capitalize
              arabic:direction-rtl
            "
          >
            <span v-for="(message, index) in schedule.message" :key="index"> {{ index > 0 ? ` ${t("schedule.then")} ` : "" }} {{ message }} </span>
          </p>
        </div>
      </section>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent, PropType, computed, ComputedRef } from "vue";
import { useI18n } from "vue-i18n";
import { useRoute } from "vue-router";
import { useStore } from "vuex";
import { arDaysByOrder, enDaysByOrder, frDaysByOrder } from "../../lib/shared";
import { addZeroToSingleDigit } from "../../lib/utils";
import { ScheduleDataState, ScheduleDays, TownScheduleState } from "../../store/modules/schedules";
import { ScheduleDisplay } from "../../types/components";

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
    target: {
      type: String as PropType<"current" | "next">,
      required: true,
    },
    townName: {
      type: String,
      required: true,
    },
    // schedule: { type: Object as PropType<FormSchedule[] | null>, required: true },
  },
  setup(props) {
    const { t } = useI18n();
    const store = useStore();
    const route = useRoute();
    const townCode = computed(() => parseInt(route.params.townId as string));
    const isArLocale = computed(() => store.getters.getIsArLang);

    const storeSchedule: ComputedRef<TownScheduleState | undefined> = computed(() => {
      return store.getters.getScheduleByTownCode(townCode.value);
    });

    const targetSchedule: ComputedRef<ScheduleDataState | null | undefined> = computed(() => {
      if (storeSchedule.value) return storeSchedule.value[props.target];
    });

    const isStoreScheduleEmpty = computed(() => {
      if (storeSchedule.value) {
        if (storeSchedule.value[props.target]) return false;
      }
      return true;
    });

    /**
     * Returns a schedule display where the water is unavailable throughout the week
     */
    const getUnavailableSchedule = (): ScheduleDisplay[] => {
      return frDaysByOrder.map((day, i) => ({
        day,
        arDay: arDaysByOrder[i],
        waterUnavailable: true,
        message: [t("schedule.noWaterAllDayLong")],
      }));
    };

    const displaySchedule = computed(() => {
      if (targetSchedule.value === undefined) return null;
      if (targetSchedule.value === null) return getUnavailableSchedule();
      const weekSchedule = targetSchedule.value.schedule;

      if (!weekSchedule) return getUnavailableSchedule();

      // const days = Object.keys(weekSchedule);

      const displaySchedule = enDaysByOrder.map((day, index) => {
        const daySchedule = weekSchedule[day as keyof ScheduleDays];
        const frDay = frDaysByOrder[index];
        const arDay = arDaysByOrder[index];

        const data: ScheduleDisplay = {
          day: frDay,
          arDay,
          waterUnavailable: false,
          message: [] as string[],
        };
        daySchedule.forEach((segement, index) => {
          const { from, to } = segement;
          // total cut
          if (from.hours === null && to.hours === null) {
            data.message[index] = t("schedule.noWaterAllDayLong");
            data.waterUnavailable = true;
          } else {
            const formattedFrom = `${addZeroToSingleDigit(from.hours || 0)}:${addZeroToSingleDigit(from.minutes || 0)}`;

            const formattedTo = `${addZeroToSingleDigit(to.hours || 0)}:${addZeroToSingleDigit(to.minutes || 0)}`;

            data.message[index] = t("schedule.fromSpecificToSpecific", { from: formattedFrom, to: formattedTo });
          }
        });

        return data;
      });

      return displaySchedule;
    });
    const targetWeek = computed(() => {
      return props.target === "current" ? t("schedule.theCurrentWeek") : t("schedule.theNextWeek");
    });
    return {
      displaySchedule,
      isStoreScheduleEmpty,
      targetWeek,
      isArLocale,
      // localization
      t,
    };
  },
});
</script>


<style>
</style>