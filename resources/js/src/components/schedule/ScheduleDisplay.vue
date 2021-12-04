<template>
  <div class="flex-grow h-full overflow-y-hidden">
    <div class="flex flex-grow w-full h-full justify-center items-center font-medium text-bgray-700 text-center" v-if="isStoreScheduleEmpty">
      Le programme d'eau de {{ targetWeek }} n'a pas encore été ajouté pour {{ townName }}.
    </div>
    <div class="flex flex-grow w-full h-full overflow-y-auto" v-else>
      <section class="flex flex-col space-y-2 flex-grow">
        <div v-for="schedule in displaySchedule" :key="schedule.day" class="flex items-center bg-white rounded-md overflow-hidden shadow-sm h-full">
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
              bg-gradient-to-br
              from-bgray-200
              to-gray-50
              border-r-2
              md:border-r-4
              pl-3
            "
            :class="[schedule.waterUnavailable ? ' border-red-300' : 'border-blue-300']"
          >
            {{ schedule.day }}
          </p>
          <p class="text-xs sm:text-sm flex-grow pl-4 text-bgray-700 font-semibold sm:font-medium first-letter:capitalize">
            <span v-for="(message, index) in schedule.message" :key="index"> {{ index > 0 ? ` puis ` : "" }} {{ message }} </span>
          </p>
        </div>
      </section>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent, PropType, computed, ComputedRef } from "vue";
import { useRoute } from "vue-router";
import { useStore } from "vuex";
import { enDaysByOrder, frDaysByOrder } from "../../lib/shared";
import { addZeroToSingleDigit, enDaysMapper } from "../../lib/utils";
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
    const store = useStore();
    const route = useRoute();
    const townCode = computed(() => parseInt(route.params.townId as string));

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

    const getUnavailableSchedule = (): ScheduleDisplay[] => {
      return Object.keys(enDaysMapper).map((day) => ({
        day: enDaysMapper[day as keyof ScheduleDays],
        waterUnavailable: true,
        message: ["coupure total durant toute la journée"],
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

        const data: ScheduleDisplay = {
          day: frDay,
          waterUnavailable: false,
          message: [] as string[],
        };
        daySchedule.forEach((segement, index) => {
          const { from, to } = segement;

          if (from.hours === null && to.hours === null) {
            data.message[index] = "coupure total durant toute la journée";
            data.waterUnavailable = true;
          } else {
            if (from.hours !== null && to.hours === null) {
              data.message[index] = `à partir de ${addZeroToSingleDigit(from.hours)}:${addZeroToSingleDigit(from.minutes || 0)} Jusqu'à 23:59`;
            } else if (from.hours === null && to.hours !== null) {
              data.message[index] = `à partir de 00:00 Jusqu'à ${to.hours}:${addZeroToSingleDigit(to.minutes || 0)}`;
            } else {
              data.message[index] = `à partir de ${addZeroToSingleDigit(from.hours || 0)}:${addZeroToSingleDigit(
                from.minutes || 0
              )} Jusqu'à ${addZeroToSingleDigit(to.hours || 0)}:${addZeroToSingleDigit(to.minutes || 0)}`;
            }
          }
        });

        return data;
      });

      return displaySchedule;
    });
    const targetWeek = computed(() => {
      return props.target === "current" ? "cette semaine" : "la semaine prochaine";
    });
    return {
      displaySchedule,
      isStoreScheduleEmpty,
      targetWeek,
    };
  },
});
</script>


<style>
</style>