<template>
  <Modal
    :showModal="showModal"
    @modalClickedOutside="$emit('formClickedOutside')"
    className="relative flex flex-col justify-between w-full sm:w-3/4 md:w-2/3 2xl:w-1/2 h-full bg-white rounded-md  py-2 overflow-hidden"
  >
    <h1 class="w-full text-bgray-700 text-lg sm:text-xl lg:text-2xl font-semibold px-5">Ajouter le programme d'eau</h1>
    <!-- FROM EMPTY WARNINING -->
    <schedule-empty-warning
      v-if="displayFormEmptyWarning !== null"
      :target="displayFormEmptyWarning"
      @cancel="handleCancelSaveSchedule"
      @confirm="sendData"
      :isLoading="isSendingData"
    />
    <section id="schedule-content-wrapper" class="flex flex-col w-full flex-grow overflow-hidden" v-else>
      <!-- WEEK TABS  -->
      <div id="tabs-container" class="flex px-5">
        <button
          class="w-full h-16 text-sm sm:text-lg border-b-8"
          :class="
            isNextWeekSchedule ? 'text-bgray-300 border-gray-300 hover:border-gray-200' : 'text-bgray-800 border-blue-500 hover:border-blue-400 font-semibold'
          "
          @click="setIsNextWeekSchedule(false)"
        >
          Cette semaine
        </button>
        <button
          class="w-full h-16 text-sm sm:text-lg border-b-8"
          :class="
            isNextWeekSchedule ? 'text-bgray-800 border-blue-500 hover:border-blue-400 font-semibold' : 'text-bgray-300 border-gray-300 hover:border-gray-200'
          "
          @click="setIsNextWeekSchedule(true)"
        >
          Semaine prochaine
        </button>
      </div>
      <!-- FROM RENDER -->
      <div class="flex flex-col flex-grow h-full overflow-y-auto overflow-x-hidden px-5" id="modal-form-container">
        <transition name="slide-right" type="animation" mode="out-in">
          <!-- THIS WEEK -->
          <week-display id="current-week" class="flex flex-col w-full flex-grow py-4" v-if="!isNextWeekSchedule">
            <section class="grid auto-rows-auto gap-2 flex-grow" data-id="form-input-rows">
              <div class="space-y-3 hover:bg-bgray-50" v-for="(scheduleNext, dayIndex) in currentSchedule" :key="scheduleNext.day">
                <section class="flex justify-between items-center">
                  <label class="font-semibold text-bgray-800 text-base sm:text-lg capitalize">{{ scheduleNext.day }}</label>
                  <!-- Only show this if the are no more than 2 schedule segments to control the amount of data sent to the server -->
                  <!-- and only if the water is cut on the same day, so that the user can chose a time for the water to be restored later on the same day -->
                  <button
                    v-if="scheduleNext.schedule.length < 2 && scheduleNext.schedule[0].to.hours !== null"
                    @click="addScheduleSegment('current', dayIndex)"
                    :title="`Ajouter un autre programme d'eau pour ${scheduleNext.day}`"
                  >
                    <icon :icon="mdiPlus" className="h-6 text-gray-500 hover:text-gray-700" />
                  </button>
                </section>
                <!-- DISPLAY THE INPUTS FOR MULTIPLE PERIODS -->
                <section v-for="(scheduleSegment, index) in scheduleNext.schedule" :key="index" class="flex items-center justify-between">
                  <div class="flex flex-grow justify-between space-x-4 px-1">
                    <!-- FROM INPUT -->
                    <app-time-picker
                      class="w-full h-auto"
                      placeholder="À partir de"
                      v-model="scheduleSegment.from"
                      :scheduleData="{ dayIndex, scheduleIndex: index, type: 'from', period: 'current' }"
                      @updated="handleOnUpdated"
                      @hasReset="handleHasReset"
                      :error="scheduleNext.errors[index].from"
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
                        :error="scheduleNext.errors[index].to"
                      />
                      <button v-if="index > 0" @click="removeScheduleSegment('current', dayIndex, index)" title="supprimer">
                        <icon :icon="mdiClose" className="h-5 w-5 text-gray-500 hover:text-gray-700" />
                      </button>
                    </div>
                  </div>
                </section>
              </div>
            </section>
          </week-display>
          <!-- NEXT WEEK -->
          <week-display id="next-week" class="week_NEXT flex flex-col w-full flex-grow py-4" v-else>
            <section class="grid auto-rows-auto gap-2 flex-grow" data-id="form-input-rows">
              <div class="space-y-3 hover:bg-bgray-50" v-for="(scheduleNext, dayIndex) in nextSchedule" :key="scheduleNext.day">
                <section class="flex justify-between items-center">
                  <label class="font-semibold text-bgray-800 text-base sm:text-lg capitalize">{{ scheduleNext.day }}</label>
                  <!-- Only show this if the are no more than 2 schedule segments to control the amount of data sent to the server -->
                  <!-- and only if the water is cut on the same day, so that the user can chose a time for the water to be restored later on the same day -->
                  <button
                    v-if="scheduleNext.schedule.length < 2 && scheduleNext.schedule[0].to.hours !== null"
                    @click="addScheduleSegment('next', dayIndex)"
                    :title="`Ajouter un autre programme d'eau pour ${scheduleNext.day}`"
                  >
                    <icon :icon="mdiPlus" className="h-6 text-gray-500 hover:text-gray-700" />
                  </button>
                </section>
                <!-- DISPLAY THE INPUTS FOR MULTIPLE PERIODS -->
                <section v-for="(scheduleSegment, index) in scheduleNext.schedule" :key="index" class="flex items-center justify-between">
                  <div class="flex flex-grow justify-between space-x-4 px-1">
                    <!-- FROM INPUT -->
                    <app-time-picker
                      class="w-full h-auto"
                      placeholder="À partir de"
                      v-model="scheduleSegment.from"
                      :scheduleData="{ dayIndex, scheduleIndex: index, type: 'from', period: 'next' }"
                      @updated="handleOnUpdated"
                      @hasReset="handleHasReset"
                      :error="scheduleNext.errors[index].from"
                    />
                    <div class="flex w-full h-auto space-x-2">
                      <!-- TO INPUT -->
                      <app-time-picker
                        class="w-full h-10"
                        placeholder="Jusqu'à"
                        v-model="scheduleSegment.to"
                        :scheduleData="{ dayIndex, scheduleIndex: index, type: 'to', period: 'next' }"
                        @updated="handleOnUpdated"
                        @hasReset="handleHasReset"
                        :error="scheduleNext.errors[index].to"
                      />
                      <button v-if="index > 0" @click="removeScheduleSegment('next', dayIndex, index)" title="supprimer">
                        <icon :icon="mdiClose" className="h-5 w-5 text-gray-500 hover:text-gray-700" />
                      </button>
                    </div>
                  </div>
                </section>
              </div>
            </section>
          </week-display>
          <!-- END NEXT WEEK SECTION -->
        </transition>
      </div>
    </section>
    <!-- ACTION BUTTONS -->
    <!-- Hide it when the empty from warning message is truthy -->
    <section id="modal-actions" class="flex items-center justify-end min-h-16 h-16 w-full space-x-4 border-t px-5" v-if="displayFormEmptyWarning === null">
      <button class="h-9 sm:h-10 w-18 bg-red-500 text-white rounded font-semibold" @click="runTest">test</button>
      <button
        class="h-9 sm:h-10 w-24 sm:w-28 text-sm sm:text-base bg-blue-500 hover:bg-blue-400 focus:bg-blue-600 text-white rounded font-semibold"
        @click="beforeSubmitSchedule"
      >
        <loader v-if="isSendingData" dark thin className="w-6 h-6" />
        <span v-else>Confirmer</span>
      </button>
      <button
        class="h-9 sm:h-10 w-24 sm:w-28 text-sm sm:text-base bg-gray-200 hover:bg-gray-100 text-gray-400 rounded font-semibold"
        @click="$emit('formClickedOutside')"
      >
        Annuler
      </button>
    </section>
  </Modal>
</template>

<script lang="ts">
// components
import Icon from "../Icon.vue";
import ScheduleDisplay from "./ScheduleDisplay.vue";
import WeekDisplay from "./WeekDisplay.vue";
import Modal from "../Modal.vue";
import AppTimePicker from "../AppTimePicker.vue";
import { mdiPlusBoxMultiple, mdiPlus, mdiClose } from "@mdi/js";
//
import { computed, ComputedRef, defineAsyncComponent, defineComponent, reactive, ref } from "vue";

import { frDaysMapper, randNumber } from "../../lib/utils";
import { useRoute } from "vue-router";
import { useStore } from "vuex";
import Loader from "../Loader.vue";

// test
import { FormSchedule, Period, scheduleFormData, Time } from "../../lib/shared";
import { ScheduleProps, ScheduleRequest, ScheduleRequestStructure } from "../../types/components";
import { ScheduleDays, TownScheduleState, Schedules } from "../../store/modules/schedules";

export default defineComponent({
  components: {
    Icon,
    ScheduleDisplay,
    WeekDisplay,
    Modal,
    AppTimePicker,
    Loader,
    ScheduleEmptyWarning: defineAsyncComponent(() => import("./ScheduleEmptyWarning.vue")),
  },
  emits: ["formClickedOutside", "formSaved"],
  props: {
    showModal: {
      type: Boolean,
      required: true,
    },
  },
  setup(_, { emit }) {
    const route = useRoute();
    const store = useStore();

    const wilayaCode = parseInt(route.params.wilayaId as string);
    const townCode = parseInt(route.params.townId as string);
    const storeSchedule: ComputedRef<TownScheduleState | undefined> = computed(() => {
      return store.getters.getScheduleByTownCode(townCode);
    });
    const populateSchedules = (type: "current" | "next"): FormSchedule[] => {
      const formArray = scheduleFormData();
      const storeScheduleClone: TownScheduleState | undefined = JSON.parse(JSON.stringify(storeSchedule.value));

      if (storeScheduleClone && storeScheduleClone[type]) {
        const schedule = storeScheduleClone[type]!.schedule;
        if (schedule) {
          formArray.forEach((day, index) => {
            const targetDay = frDaysMapper[day.day] as keyof ScheduleDays;
            // console.log("day=>", day, "targetDay=", targetDay, "schedule.targetDay=", schedule[targetDay]);
            const storeSchedule = schedule[targetDay];
            day.schedule = storeSchedule;
            // add error array for each period
            for (let i = 1; i < storeSchedule.length; i++) {
              console.log("adding error message");
              formArray[index].errors[i] = {
                from: "",
                to: "",
              };
            }
          });
        }
      }
      // console.warn("populateSchedules", formArray);
      return formArray;
    };
    const currentSchedule = reactive<FormSchedule[]>(populateSchedules("current"));
    const nextSchedule = reactive<FormSchedule[]>(populateSchedules("next"));

    const showModal = ref<boolean>(false);
    // whether the form tab for next week schedule is active
    const isNextWeekSchedule = ref<boolean>(false);
    const setIsNextWeekSchedule = (bool: boolean) => {
      if (isNextWeekSchedule.value !== bool) isNextWeekSchedule.value = bool;
    };
    const openModal = () => {
      showModal.value = true;
    };
    const closeModal = () => {
      showModal.value = false;
    };

    // add another schedule to the same day, for when the water is cut and resumed in the same day
    const addScheduleSegment = (targetSchedule: "current" | "next", index: number): void => {
      const schedule = targetSchedule === "current" ? currentSchedule : nextSchedule;

      schedule[index].schedule.push({
        from: {
          hours: null,
          minutes: null,
        },
        to: {
          hours: null,
          minutes: null,
        },
      });
      schedule[index].errors.push({
        from: "",
        to: "",
      });
    };
    const removeScheduleSegment = (targetSchedule: "current" | "next", dayIndex: number, scheduleIndex: number): void => {
      if (targetSchedule === "current") {
        // current schedule
        currentSchedule[dayIndex].schedule.splice(scheduleIndex, 1);
        currentSchedule[dayIndex].errors.splice(scheduleIndex, 1);
      } else {
        // next schedule
      }
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
      const targetSchedule = period === "current" ? currentSchedule : nextSchedule;

      const schedule = targetSchedule[dayIndex].schedule[scheduleIndex];
      const { from, to } = schedule;
      const error = targetSchedule[dayIndex].errors[scheduleIndex];

      // prevent maximum value for "from" i.e. 23:59 as well as minimum value for to "00:00"

      if (type === "from" && from.hours !== null && from.hours >= 23 && from.minutes !== null && from.minutes >= 59) {
        // console.log("2359 error");
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
      currentSchedule[dayIndex].errors[scheduleIndex][type] = "";
    };

    // automatically set the from/to values to beginning/end of the day when either of the opposite values are set
    const handleOppositeNullvalues = (from: Time, to: Time): void => {
      if (from.hours === null && to.hours !== null) {
        from.hours = 0;
        from.minutes = 0;
      }

      if (to.hours === null && from.hours !== null) {
        to.hours = 23;
        to.minutes = 59;
      }

      if (from.hours !== null && from.minutes === null) from.minutes = 0;
      if (to.hours !== null && to.minutes === null) to.minutes = 0;
    };
    // tracks whether the forms are totally empty or not
    const isFormEmpty = reactive({
      submitted: false, // necessary for the "displayFormEmptyWarning" computed property to tell whether the form has been sumitted or not
      current: true,
      next: true,
    });

    const displayFormEmptyWarning: ComputedRef<"current" | "next" | "both" | null> = computed(() => {
      if (isFormEmpty.submitted) {
        if (isFormEmpty.current && !isFormEmpty.next) return "current";
        if (isFormEmpty.next && !isFormEmpty.current) return "next";
        if (isFormEmpty.current && isFormEmpty.next) return "both";
      }
      return null;
    });

    const fromHasErrors = (): boolean => {
      for (let index = 0; index < currentSchedule.length; index++) {
        const scheduleEntry = currentSchedule[index];

        for (let scheduleIndex = 0; scheduleIndex < scheduleEntry.schedule.length; scheduleIndex++) {
          const error = scheduleEntry.errors[scheduleIndex];
          const { from, to } = scheduleEntry.schedule[scheduleIndex];
          handleOppositeNullvalues(from, to);
          // if any of the form values are not empty, update the state
          if (from.hours !== null || to.hours !== null) isFormEmpty.current = false;
          // if there are any errors, return immediately
          if (error.from !== "" || error.to !== "") return true;
        }
      }
      for (let index = 0; index < nextSchedule.length; index++) {
        const scheduleEntry = nextSchedule[index];
        for (let scheduleIndex = 0; scheduleIndex < scheduleEntry.schedule.length; scheduleIndex++) {
          const error = scheduleEntry.errors[scheduleIndex];
          const { from, to } = scheduleEntry.schedule[scheduleIndex];

          handleOppositeNullvalues(from, to);
          // if any of the form values are not empty, update the state
          if (from.hours !== null || to.hours !== null) isFormEmpty.next = false;

          if (error.from !== "" || error.to !== "") {
            setIsNextWeekSchedule(true);
            return true;
          }
        }
      }
      return false;
    };

    const prepareScheduleObject = (): ScheduleRequestStructure => {
      // initializing the return object
      const requestObject: ScheduleRequestStructure = {
        wilayaCode: wilayaCode,
        townCode: townCode,
        current: null,
        next: null,
      };

      if (displayFormEmptyWarning.value === "both") return requestObject;

      // registers all the necessary data in the request expected format for the given schedule
      function registerSchedule(schedule: FormSchedule[], dayIndex: number, target: "current" | "next"): void {
        // only alter the request object if the from is not empty
        if (displayFormEmptyWarning.value !== target) {
          const targetSchedule = schedule[dayIndex];
          const day = frDaysMapper[targetSchedule.day] as keyof ScheduleDays; // day name in English

          // init the object
          // if (requestObject[target].schedule === null) requestObject[target].schedule = {};
          if (requestObject[target] === null) requestObject[target] = <ScheduleDays>{};
          // add the first value to the shedule array if not empty
          // Object.defineProperty(requestObject.current.schedule, day, [targetSchedule.schedule[0]]);
          (requestObject[target] as ScheduleDays)[day] = [targetSchedule.schedule[0]];
          // console.log(targetSchedule.schedule[0]);
          // if the scheule has more than one period per day
          // check whether both the previous and the current values are null and exclude the latter from the array
          if (targetSchedule.schedule.length > 1) {
            for (let j = 1; j < targetSchedule.schedule.length; j++) {
              const period = targetSchedule.schedule[j];
              // if both the segement and the one before it are defined, include it in the final array
              if (period.from.hours !== null && targetSchedule.schedule[j - 1] !== null) {
                requestObject[target]![day][j] = period;
                //
              }
            }
          }
        }
      }

      for (let index = 0; index < currentSchedule.length; index++) {
        registerSchedule(currentSchedule, index, "current");
        registerSchedule(nextSchedule, index, "next");
      }
      return requestObject;
    };
    // when clicking cancel on the empty schedule warning "retour" button
    const handleCancelSaveSchedule = (): void => {
      // direct the user to the target schedule
      if (displayFormEmptyWarning.value === "next") {
        setIsNextWeekSchedule(true);
      } else {
        setIsNextWeekSchedule(false);
      }
      // reset the submitted state of the from
      isFormEmpty.submitted = false;
    };

    const isSendingData = ref(false);
    // checks whether the schedule is null or if the values throughout the week are null
    const isScheduleEmpty = (schedule: ScheduleDays | null): boolean => {
      // console.warn("CHECKING IF IS EMPTY", JSON.parse(JSON.stringify(schedule)));

      if (schedule === null) return true;
      const days = Object.keys(schedule);

      for (let dayIndex = 0; dayIndex < days.length; dayIndex++) {
        const day = days[dayIndex];
        const period = schedule[day as keyof ScheduleDays];
        for (let i = 0; i < period.length; i++) {
          const time = period[i];
          if (time.from.hours !== null || time.from.minutes !== null) return false;
          if (time.to.hours !== null || time.to.minutes !== null) return false;
        }
      }
      return true;
    };
    // checks whether the schedule is different than the one in the store, should be used after verifying and submitting the form
    const isDiffThanStore = (schedule: ScheduleDays | null, targetStoreSchedule: "current" | "next"): boolean => {
      // if the schedule does not exist yet upon submitting, allow form submission even if null
      // as a submitted null = water cut throught the week
      if (storeSchedule.value === undefined) {
        return true;
      } else {
        // if the above variable is null, it means that the form has not been sumbitted to it yet, (e.g. as a result of a new week)
        const storeTargetSchedule = storeSchedule.value[targetStoreSchedule];
        if (storeTargetSchedule === null) {
          // schedule with a null value can be submitted when the target schedule in the store is null
          return true;
        } else {
          // if both scdhedule are empty, nothing has changed
          if (isScheduleEmpty(storeTargetSchedule.schedule) && isScheduleEmpty(schedule)) {
            return false;
          } else {
            // both schedules are not empty by now
            // check for value similarities
            const days = Object.keys(schedule!);

            for (let dayIndex = 0; dayIndex < days.length; dayIndex++) {
              const day = days[dayIndex];
              const period = schedule![day as keyof ScheduleDays];
              const storePeriod = storeTargetSchedule.schedule![day as keyof ScheduleDays];

              for (let i = 0; i < period.length; i++) {
                if (period[i] !== undefined && storePeriod[i] !== undefined) {
                  const { from, to } = period[i];
                  const { from: sFrom, to: sTo } = storePeriod[i]; // sFrom and sTo as in storeFrom && storeTo

                  if (from.hours !== sFrom.hours) {
                    return true;
                  } else {
                    // if the hours are equal, check the minutes
                    if (from.minutes !== sFrom.minutes) {
                      return true;
                    }
                  }
                  // do the same with to values
                  if (to.hours !== sTo.hours) {
                    return true;
                  } else {
                    // if the hours are equal, check the minutes
                    if (to.minutes !== sTo.minutes) {
                      return true;
                    }
                  }
                  // if all of the above fail, it means that the schedules are not different
                  return false;
                } else {
                  return true;
                }
              }
            }
          }
        }
        // noth has changed
        return false;
      }
    };

    const hasScheduleChanged = (schedule: ScheduleDays | null, targetStoreSchedule: "current" | "next") => {
      return {
        isEmpty: isScheduleEmpty(schedule),
        hasChanged: isDiffThanStore(schedule, targetStoreSchedule),
      };
    };

    /**
     * generates the request object based on the form data and the one stored in the vuex store,
     * automatically sets what should be inserted/not, and/or what should be updated/not
     * @returns if the from data was unchanged upon cross-checking with the store data, returns null (to prevent unnecessary data sending) - returns the request object otherwise
     */
    const getRequestObject = (): ScheduleRequest | null => {
      const { townCode, wilayaCode, current, next } = prepareScheduleObject();
      const currentSubmitted = hasScheduleChanged(current, "current");
      const nextSubmitted = hasScheduleChanged(next, "next");
      // return null if there were no changes to the form
      if (!currentSubmitted.hasChanged && !nextSubmitted.hasChanged) return null;
      const returnObject: ScheduleRequest = {
        wilayaCode,
        townCode,
        current: {
          skip: false,
          update: false,
          data: current,
        },
        next: {
          skip: false,
          update: false,
          data: next,
        },
      };
      if (storeSchedule.value) {
        const targetSchedule = storeSchedule.value;
        if (targetSchedule.current && !targetSchedule.next) {
          // POST
          if (!currentSubmitted.hasChanged) {
            // if the schedule of the current week is already set, dont insert it in the db (skip it)
            returnObject.current.skip = true;
            returnObject.current.data = null;
          } else {
            returnObject.current.scheduleCode = targetSchedule.current.scheduleCode;
            returnObject.current.update = true;
          }
        }

        if (targetSchedule.current && targetSchedule.next) {
          // if the submitted current shcedule has changed and the next hasnt, only send a request to update the current
          if (currentSubmitted.hasChanged && !nextSubmitted.hasChanged) {
            // skip and nullify the data object for it not to be sent to the server
            returnObject.next.skip = true;
            returnObject.next.data = null;

            // mark the current object as to be updated
            returnObject.current.update = true;
            returnObject.current.scheduleCode = targetSchedule.current.scheduleCode;
          }
          // same as above with reversed logic
          if (!currentSubmitted.hasChanged && nextSubmitted.hasChanged) {
            // skip and nullify the data object for it not to be sent to the server
            returnObject.current.skip = true;
            returnObject.current.data = null;

            // mark the next object as to be updated
            returnObject.next.update = true;
            returnObject.next.scheduleCode = targetSchedule.next.scheduleCode;
          }
          // when both of the submitted schedules have been changed
          if (currentSubmitted.hasChanged && nextSubmitted.hasChanged) {
            // mark them both as to be updated
            returnObject.current.update = true;
            returnObject.current.scheduleCode = targetSchedule.current.scheduleCode;

            returnObject.next.update = true;
            returnObject.next.scheduleCode = targetSchedule.next.scheduleCode;
          }
        }
      }

      return returnObject;
    };

    // to be ran before the schedule data is sent to the server
    const beforeSubmitSchedule = (): void => {
      if (fromHasErrors()) {
        store.dispatch("flashSnack", {
          type: "error",
          message: "Veuillez corriger les erreurs avant de soumettre les données",
          time: 5000,
        });
        return;
      }
      // if the request data is null, the form data was not changed
      // prevent sending the from therefore
      // if (requestData === null) {
      //   store.dispatch("flashSnack", {
      //     type: "info",
      //     message: "Aucun changement n'a été encore fait",
      //     time: 5000,
      //   });
      //   return;
      // } else {
      if (isFormEmpty.current || isFormEmpty.next) {
        // displat the from empty warning
        isFormEmpty.submitted = true;
        return;
        // }
        // TODO: Check if the form has been changed or not

        // if no errors are registered, send data to the server
      }
      sendData();
    };
    // at this point, form should have been checked for validity
    // const sendData = (data: ScheduleRequest): void => {
    const sendData = (): void => {
      //
      const requestData = getRequestObject();
      console.log("sending data...", requestData);

      if (requestData) {
        // const { current, next } = requestData;

        isSendingData.value = true;
        store
          .dispatch("saveSchedule", requestData)
          .then((response) => {
            isSendingData.value = false;

            // console.log("success", response);
            // closeModal();
            emit("formSaved");
            // remove the empty form warning in case it was displayed
            isFormEmpty.submitted = false;
            store.dispatch("flashSnack", {
              type: "success",
              message: "Programme d'eau ajouté avec succès",
              time: 5000,
            });
          })
          .catch((err) => {
            isSendingData.value = false;
            console.error("[ScheduleForm:dispatch@saveSchedule] errors:", err);
          });
      }
    };

    console.warn("[ScheduleFrom.vue:555] Test runners are still present in the code, remove them when completing the tests");
    const runTest = () => {
      // populate the object
      currentSchedule.forEach((e) => {
        e.schedule.forEach((schedule) => {
          schedule.from.hours = randNumber(0, 5);
          schedule.from.minutes = randNumber(1, 59);
          schedule.to.hours = randNumber(6, 23);
          schedule.to.minutes = randNumber(6, 59);
        });
      });
    };

    return {
      currentSchedule,
      nextSchedule,
      showModal,
      openModal,
      closeModal,

      isNextWeekSchedule,
      setIsNextWeekSchedule,
      beforeSubmitSchedule,
      addScheduleSegment,
      removeScheduleSegment,
      handleOnUpdated,
      handleHasReset,
      displayFormEmptyWarning,
      handleCancelSaveSchedule,
      isSendingData,
      sendData,
      // icons
      mdiPlusBoxMultiple,
      mdiPlus,
      mdiClose,
      runTest,
    };
  },
});
</script>
<style scoped>
.slide-right-enter-active {
  animation: slide-right 0.2s;
}
.slide-right-leave-active {
  animation: slide-left 0.2s reverse;
}
@keyframes slide-right {
  from {
    opacity: 0;
    transform: translateX(500px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

@keyframes slide-left {
  from {
    opacity: 0;
    transform: translateX(-500px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}
</style>


function hasScheduleBeenUpdated() {
  throw new Error("Function not implemented.");
}
