<template>
  <div class="flex flex-col w-full grow py-4">
    <section class="grid auto-rows-auto gap-2 grow" data-id="form-input-rows">
      <div class="space-y-3 hover:bg-bgray-50" v-for="(targetSchedule, dayIndex) in currentSchedule" :key="targetSchedule.day">
        <section class="flex justify-between items-center">
          <label class="font-semibold text-bgray-800 text-base sm:text-lg capitalize">{{ targetSchedule.day }}</label>
          <!-- Only show this if the are no more than 2 schedule segments to control the amount of data sent to the server -->
          <!-- and only if the water is cut on the same day, so that the user can chose a time for the water to be restored later on the same day -->
          <button
            v-if="targetSchedule.schedule.length < 2 && targetSchedule.schedule[0].to.hours !== null"
            @click="addScheduleSegment(dayIndex)"
            :title="`Ajouter un autre programme d'eau pour ${targetSchedule.day}`"
          >
            <icon :icon="mdiPlus" className="h-6 text-gray-500 hover:text-gray-700" />
          </button>
        </section>
        <!-- DISPLAY THE INPUTS FOR MULTIPLE PERIODS -->
        <section v-for="(scheduleSegment, index) in targetSchedule.schedule" :key="index" class="flex items-center justify-between">
          <div class="flex grow justify-between space-x-4 px-1">
            <!-- FROM INPUT -->
            <app-time-picker
              class="w-full h-auto"
              placeholder="À partir de"
              v-model="scheduleSegment.from"
              :scheduleData="{ dayIndex, scheduleIndex: index, type: 'from', period: 'current' }"
              @updated="handleOnUpdated"
              @hasReset="handleHasReset"
              :error="targetSchedule.errors[index].from"
            />
            <div class="flex w-full h-auto space-x-2">
              <!-- TO INPUT -->
              <app-time-picker
                class="w-full h-10"
                placeholder="Jusqu'à"
                v-model="scheduleSegment.to"
                :scheduleData="{ dayIndex, scheduleIndex: index, type: 'to', period: 'current' }"
                @updated="handleOnUpdated"
                @hasReset="handleHasReset"
                :error="targetSchedule.errors[index].to"
              />
              <!-- Close Added segement -->
              <button v-if="index > 0" @click="removeScheduleSegment(dayIndex, index)" title="supprimer">
                <icon :icon="mdiClose" className="h-5 w-5 text-gray-500 hover:text-gray-700" />
              </button>
            </div>
          </div>
        </section>
      </div>
    </section>
  </div>
</template>

<script lang="ts">
import { defineComponent, PropType, reactive } from "vue";
import { useRoute } from "vue-router";
import { useStore } from "vuex";
import { FormSchedule, Period, Time } from "../../lib/shared";
import { ScheduleProps } from "../../types/components";
import AppTimePicker from "../AppTimePicker.vue";
export default defineComponent({
  components: {
    AppTimePicker,
  },
  props: {
    schedule: {
      type: Array as PropType<FormSchedule[]>,
      required: true,
    },
    target: {
      type: String as PropType<"current" | "next">,
      required: true,
      default: "current",
    },
  },
  setup(props) {
    const store = useStore();
    const route = useRoute();

    const targetSchedule = reactive<FormSchedule[]>(props.schedule);
    const addScheduleSegment = (index: number): void => {
      targetSchedule[index].schedule.push({
        from: {
          hours: null,
          minutes: null,
        },
        to: {
          hours: null,
          minutes: null,
        },
      });
      targetSchedule[index].errors.push({
        from: "",
        to: "",
      });
    };
    const removeScheduleSegment = (dayIndex: number, scheduleIndex: number): void => {
      // current schedule
      targetSchedule[dayIndex].schedule.splice(scheduleIndex, 1);
      targetSchedule[dayIndex].errors.splice(scheduleIndex, 1);
    };

    // handles error checking
    // empty string = valid time, a non-empty string contains the error message
    const compareTimes = ({ from, to, type }: { from: Time; to: Time; type: "from" | "to" }): string => {
      const errorMessage =
        type === "from"
          ? "Le temp de rétablissment d'eau doit être inferieur au temp de coupure"
          : "Le temp de coupure d'eau doit être superieur au temp de rétablissement";

      if (from.hours !== null && to.hours !== null) {
        if (from.hours < to.hours) {
          return "";
          // return true;
        } else if (from.hours === to.hours) {
          // set the mintues to 0 if they are null
          if (from.minutes === null) from.minutes = 0;
          if (to.minutes === null) to.minutes = 0;

          return from.minutes < to.minutes ? "" : errorMessage;
          // return from.minutes < to.minutes ? true : false;
        } else {
          return errorMessage;
          // return false;
        }
      } else {
        // valid time meaning the water is cut throughout the day, giving a valid time aswell
        return "";
        // return true;
      }
    };

    // compares the time between the "from" value of the newly added segmented time and the "to" value of the previous segement
    const compareSegmentedTime = (previousTo: Time, segementTime: Period, messageTarget: "previous" | "next"): string | void => {
      // adapt the error message according to the target message

      const errorMsg =
        messageTarget === "previous"
          ? "Le temp choisi droit être superieur au temp précédent du même jour"
          : "Le temp choisi droit être inferieur au prochain temp du même jour";

      if (previousTo.hours !== null && segementTime.from.hours !== null) {
        if (previousTo.hours > segementTime.from.hours) {
          return errorMsg;
        } else if (previousTo.hours === segementTime.from.hours) {
          if (previousTo.minutes === null) previousTo.minutes = 0;
          if (segementTime.from.minutes === null) segementTime.from.minutes = 0;
          console.log("segmented minutes check", "to =>", previousTo.minutes, "from [next]=>");

          return previousTo.minutes < segementTime.from.minutes ? "" : errorMsg;
        } else {
          return "";
        }
      }
      // return compareTimes({ from: segementTime.from, to: segementTime.to, type });
    };

    // check for errors upon value update
    const checkForFormErrors = ({ dayIndex, scheduleIndex, type, period }: ScheduleProps) => {
      console.log("checking for for errors");

      const schedule = targetSchedule[dayIndex].schedule[scheduleIndex];
      const { from, to } = schedule;
      const error = targetSchedule[dayIndex].errors[scheduleIndex];

      // prevent maximum value for "from" i.e. 23:59 as well as minimum value for to "00:00"

      if (type === "from" && from.hours !== null && from.hours >= 23 && from.minutes !== null && from.minutes >= 59) {
        console.log("2359 error");
        error[type] = "Le temp de rétablissment d'eau ne peut être 23:59";
        return;
      } else {
        error[type] = "";
      }
      // to must never be equal to 00:00
      if (type === "to" && to.hours !== null && to.hours <= 0 && to.minutes !== null && to.minutes <= 0) {
        error[type] = "Le temp de coupure d'eau ne peut être 00:00";
        return;
      } else {
        error[type] = "";
      }

      if (from.hours !== null && to.hours !== null) {
        const isError = compareTimes({ from, to, type });
        isError ? (error[type] = isError) : (error[type] = "");
        // if there is an error return early to prevent the next block from supressing the error when checking for previous time segment
        if (isError) return;
      }

      if (type === "from" && scheduleIndex > 0) {
        const previousSchedule = targetSchedule[dayIndex].schedule[scheduleIndex - 1];
        // segmented time
        const isError = compareSegmentedTime(previousSchedule.to, schedule, "previous");
        isError ? (error[type] = isError) : (error[type] = "");
        // same as above
        if (isError) return;
      }
      // if there is a time segement when updating the "to" time, invoke the following
      const nextScheduleSegment = targetSchedule[dayIndex].schedule[scheduleIndex + 1];
      if (type === "to" && targetSchedule[dayIndex].schedule.length > 1 && nextScheduleSegment !== undefined && nextScheduleSegment.from.hours !== null) {
        const isError = compareSegmentedTime(schedule.to, nextScheduleSegment, "next");
        isError ? (error[type] = isError) : (error[type] = "");
        // same as above
        if (isError) return;
      }
    };
    const handleOnUpdated = (data: ScheduleProps) => {
      checkForFormErrors(data);
    };
    // reset any error if present for better UX
    const handleHasReset = ({ dayIndex, scheduleIndex, type }: ScheduleProps) => {
      targetSchedule[dayIndex].errors[scheduleIndex][type] = "";
    };

    return {
      targetSchedule,
      addScheduleSegment,
      removeScheduleSegment,
      handleOnUpdated,
      handleHasReset,
    };
  },
});
</script>
