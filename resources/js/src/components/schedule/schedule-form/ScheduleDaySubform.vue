<template>
  <div class="space-y-3 hover:bg-bgray-50 dark:hover:bg-dark-alt/25">
    <section class="flex justify-between items-center">
      <label class="font-semibold text-bgray-800 dark:text-bgray-200 text-base sm:text-lg capitalize">{{ day }}</label>
      <!-- Only show this if the are no more than 2 schedule segments to control the amount of data sent to the server -->
      <!-- and only if the water is cut on the same day, so that the user can chose a time for the water to be restored later on the same day -->
      <button
        v-if="periods.length < 2 && periods[0].to.hours !== null"
        @click="addScheduleSegment('current', dayIndex)"
        :title="`Ajouter un autre programme d'eau pour ${day}`"
      >
        <icon :icon="mdiPlus" className="h-6 text-gray-500 hover:text-gray-700" />
      </button>
    </section>
    <!-- DISPLAY THE INPUTS FOR MULTIPLE PERIODS -->
    <section v-for="(period, index) in periods" :key="index" class="flex items-center justify-between">
      <div class="flex grow justify-between space-x-4 px-1">
        <!-- FROM INPUT -->
        <app-time-picker-input
          class="w-full h-auto"
          placeholder="À partir de"
          v-model="period.from"
          @updated="($newVal) => handleOnUpdated($newVal, 'from', index)"
          @hasReset="() => handleHasReset('from', index)"
          :error="errors[index].from"
        />
        <div class="flex w-full h-auto space-x-2">
          <!-- TO INPUT -->
          <app-time-picker-input
            class="w-full h-10"
            placeholder="Jusqu'à"
            v-model="period.to"
            @updated="($newVal) => handleOnUpdated($newVal, 'to', index)"
            @hasReset="() => handleHasReset('to', index)"
            :error="errors[index].to"
          />
          <button v-if="index > 0" @click="removeScheduleSegment(index)" title="supprimer">
            <icon :icon="mdiClose" className="h-5 w-5 text-gray-500 hover:text-gray-700" />
          </button>
        </div>
      </div>
    </section>
  </div>
</template>

<script lang="ts">
import { defineComponent, PropType, watch } from "vue";
import { FormError, isTimeAGreaterThanB, isTimeALessThanB, isTimeEmpty, Period, Time } from "../../../lib/shared";
import Icon from "../../Icon.vue";

import { mdiPlus, mdiClose } from "@mdi/js";
import AppTimePickerInput from "../../AppTimePickerInput.vue";
import {
  AddSegmentArgs,
  RemoveSegmentArgs,
  ResetErrorArgs,
  ResetTimeArgs,
  SetErrorArgs,
  SetTimeArgs,
  TargetSchedule,
  TargetTime,
} from "../../../types/components";

export default defineComponent({
  components: { Icon, AppTimePickerInput },
  emits: ["addDaySegment", "removeDaySegment", "setTime", "resetTime", "setError", "resetError", "resetAllDayErrors"],
  props: {
    targetSchedule: { type: String as PropType<TargetSchedule>, required: true },
    dayIndex: { type: Number, required: true },
    day: { type: String, required: true },
    periods: { type: Object as PropType<Period[]>, required: true },
    errors: {
      type: Array as PropType<FormError[]>,
    },
  },
  setup(props, { emit }) {
    const handleOnUpdated = (updatedTime: Time, targetTime: TargetTime, periodIndex: number) => {
      const args: SetTimeArgs = {
        newValue: updatedTime,
        targetTime,
        periodIndex,
        dayIndex: props.dayIndex,
        targetSchedule: props.targetSchedule,
      };
      emit("setTime", args);
      checkForErrors(targetTime, periodIndex);
    };

    const handleHasReset = (targetTime: TargetTime, periodIndex: number) => {
      const args: ResetTimeArgs = {
        targetTime,
        periodIndex,
        dayIndex: props.dayIndex,
        targetSchedule: props.targetSchedule,
      };
      emit("resetTime", args);
    };

    const addScheduleSegment = () => {
      const args: AddSegmentArgs = {
        targetSchedule: props.targetSchedule,
        dayIndex: props.dayIndex,
      };
      emit("addDaySegment", args);
    };
    const removeScheduleSegment = (periodIndex: number) => {
      const args: RemoveSegmentArgs = {
        targetSchedule: props.targetSchedule,
        dayIndex: props.dayIndex,
        periodIndex,
      };
      emit("removeDaySegment", args);
    };
    /*
    const checkForErrors = (targetTime: TargetTime, periodIndex: number): void => {
      resetError(targetTime, periodIndex);
      const periods = props.periods;
      for (let i = 0; i < periods.length; i++) {
        const { from, to } = periods[i];
        if (isTimeEmpty(from) || isTimeEmpty(to)) continue;

        // first check if from is less than to
        const isCorrectTime = isTimeALessThanB(from, to);

        if (!isCorrectTime) {
          console.log("time is not correct");
          const errorMessage =
            targetTime === "from"
              ? "Le temp de rétablissment d'eau doit être inferieur au temp de coupure"
              : "Le temp de coupure d'eau doit être superieur au temp de rétablissement";

          return setError(errorMessage, targetTime, i);
        }
        console.log(i);
        // extra check for day segments, where from & to times should be greater than "to" value of the previous segment
        if (periodIndex > 0) {
          const previousSegement = periods[periodIndex - 1];

          console.log(isTimeALessThanB(previousSegement.to, from));
          if (!isTimeEmpty(previousSegement.to)) {
            console.log("previous time is not empty, running....");
            if (!isTimeALessThanB(previousSegement.to, from) || !isTimeALessThanB(previousSegement.to, to)) {
              console.log("previous segement must be less than the new one");
              const errorMessage = "Ce temp doit être surperieur au précédent temp de coupure du meme jour";
              return setError(errorMessage, targetTime, i);
            }
          }
        }

        // console.warn("is time correct", isCorrectTime);
      }
    };
    */

    /**
     * Check for errors on every priod isnide the periods props
     * Should run after each value update (handleOnUpdated)
     */
    const checkForErrors = (targetTime: TargetTime, periodIndex: number): void => {
      resetAllDayErrors();

      props.periods.forEach((period, i) => {
        const { from, to } = period;
        if (i > 0) {
          // extra checks for the added time segments
          const { to: previousTo } = props.periods[i - 1];
          // check if from time is not empty, previous to time is not empty (to only show the error message if not empty), and the from is greather than the previous to
          // if so throw an error

          if (!isTimeEmpty(from) && !isTimeEmpty(previousTo) && !isTimeAGreaterThanB(from, previousTo)) {
            setError("Le temp de rétablissement ajouté au meme jour doit être supérieure au temp de coupure précédent", "from", i);
          }
          // check if the to time is not empty, previous to time is not empty (to only show the error message if not empty), and the to is greather than the previous to
          // if so throw an error
          if (!isTimeEmpty(to) && !isTimeEmpty(previousTo) && !isTimeAGreaterThanB(to, previousTo)) {
            setError("Le temp de coupure d'eau ajouté au meme jour doit être supérieure au temp de coupure précédent", "to", i);
          }
          // the from value must be set for additonal time segements if the to value has been set
          if (isTimeEmpty(from) && !isTimeEmpty(to)) {
            setError("Ce temp doit être aussi régler quand le temp de coupure a été reglé pour le temp additionnel du même jour", "from", i);
          }
        }

        // check from validity
        if (isTimeAGreaterThanB(from, to) && !isTimeEmpty(to)) {
          setError("Le temp de rétablissement d'eau doit être inférieur au temp de coupure", "from", i);
        }

        // check for to validity
        if (!isTimeEmpty(from) && !isTimeEmpty(to) && !isTimeAGreaterThanB(to, from)) {
          setError("Le temp de coupure d'eau doit être supérieure au temp de rétablissement", "to", i);
        }

        // if the user adds more segements, validate the next one as well..
        if (props.periods[i + 1]) {
          const { to: nextTo, from: nextFrom } = props.periods[i + 1];
          if (!isTimeEmpty(from) && isTimeAGreaterThanB(to, nextFrom)) {
            setError("Le temp de coupure doit être inférieur au nouveau temp de rétablissement ajouté au même jour", "to", i);
          }

          if ((!isTimeEmpty(nextFrom) || !isTimeEmpty(nextTo)) && isTimeEmpty(to)) {
            setError("Le temp de coupure doit être réglé quand vous avez préciser d'autres temps additionnels du même jour", "to", i);
          }
        }
      });
    };

    /**
     * Emits an error event to the parent. Called when an error is encountered inside **handleOnUpdated()**
     */
    const setError = (message: string, targetTime: TargetTime, periodIndex: number): void => {
      const args: SetErrorArgs = {
        message,
        targetTime,
        periodIndex,
        dayIndex: props.dayIndex,
        targetSchedule: props.targetSchedule,
      };
      emit("setError", args);
    };

    const resetError = (targetTime: TargetTime, periodIndex: number): void => {
      const args: ResetErrorArgs = {
        targetTime,
        periodIndex,
        dayIndex: props.dayIndex,
        targetSchedule: props.targetSchedule,
      };
      emit("resetError", args);
    };

    /**
     * Resets all the errors corresponding to the current dayIndex
     */
    const resetAllDayErrors = () => emit("resetAllDayErrors", { dayIndex: props.dayIndex, targetSchedule: props.targetSchedule });

    return {
      handleOnUpdated,
      handleHasReset,
      removeScheduleSegment,
      addScheduleSegment,

      // icons
      mdiPlus,
      mdiClose,
    };
  },
});
</script>


