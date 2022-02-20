<template>
    <Modal
        :showModal="showModal"
        @modalClickedOutside="$emit('formClickedOutside')"
        className="relative flex flex-col justify-between w-full sm:w-3/4 md:w-2/3 2xl:w-1/2 h-full bg-white dark:bg-dark-bg rounded-md  py-2 overflow-hidden"
    >
        <h1
            class="w-full text-bgray-700 dark:text-bgray-300 text-lg sm:text-xl lg:text-2xl font-semibold px-5 arabic:direction-rtl arabic:text-right"
        >
            <!-- {{ formTitle }} le programme d'eau -->
            {{ t("schedule.modifySchedule") }}
        </h1>
        <!-- FROM EMPTY WARNINING -->
        <schedule-empty-warning
            v-if="displayFormEmptyWarning !== null"
            :target="displayFormEmptyWarning"
            @cancel="hideFormEmptyWarning"
            @confirm="onConfirmSendSchedule"
            :isLoading="isSendingData"
        />
        <!-- FORM -->
        <section
            id="schedule-content-wrapper"
            class="flex flex-col w-full grow overflow-hidden"
            v-else
        >
            <!-- <section id="schedule-content-wrapper" class="flex flex-col w-full grow overflow-hidden"> -->
            <!-- WEEK TABS  -->
            <div id="tabs-container" class="flex arabic:flex-row-reverse px-5">
                <schedule-form-week-selector
                    :isSelected="!isNextWeekSchedule"
                    @click="setIsNextWeekSchedule(false)"
                    >{{ t("schedule.currentWeek") }}</schedule-form-week-selector
                >
                <schedule-form-week-selector
                    :isSelected="isNextWeekSchedule"
                    @click="setIsNextWeekSchedule(true)"
                    >{{ t("schedule.nextWeek") }}</schedule-form-week-selector
                >
            </div>
            <!-- FROM RENDER -->
            <div
                class="flex flex-col grow h-full overflow-y-auto overflow-x-hidden px-5"
                id="modal-form-container"
            >
                <transition name="slide-right" type="animation" mode="out-in">
                    <!-- THIS WEEK -->
                    <week-display
                        id="current-week"
                        class="flex flex-col w-full grow py-4"
                        v-if="!isNextWeekSchedule"
                    >
                        <section class="grid auto-rows-auto gap-2 grow" data-id="form-input-rows">
                            <schedule-day-subform
                                v-for="(schedule, dayIndex) in currentSchedule"
                                :periods="schedule.schedule"
                                :dayIndex="dayIndex"
                                :frDay="schedule.frDay"
                                :arDay="schedule.arDay"
                                targetSchedule="current"
                                :key="schedule.frDay"
                                :errors="schedule.errors"
                                @addDaySegment="addScheduleSegment"
                                @removeDaySegment="removeScheduleSegment"
                                @resetTime="handleResetTime"
                                @setTime="handleSetTime"
                                @setError="handleSetError"
                                @resetError="handleResetError"
                                @resetAllDayErrors="handleResetAllDayErrors"
                            />
                        </section>
                    </week-display>
                    <!-- NEXT WEEK -->
                    <week-display
                        id="next-week"
                        class="week_NEXT flex flex-col w-full grow py-4"
                        v-else
                    >
                        <section class="grid auto-rows-auto gap-2 grow" data-id="form-input-rows">
                            <schedule-day-subform
                                v-for="(schedule, dayIndex) in nextSchedule"
                                :periods="schedule.schedule"
                                targetSchedule="next"
                                :dayIndex="dayIndex"
                                :frDay="schedule.frDay"
                                :arDay="schedule.arDay"
                                :key="schedule.frDay"
                                :errors="schedule.errors"
                                @addDaySegment="addScheduleSegment"
                                @removeDaySegment="removeScheduleSegment"
                                @resetTime="handleResetTime"
                                @setTime="handleSetTime"
                                @setError="handleSetError"
                                @resetError="handleResetError"
                                @resetAllDayErrors="handleResetAllDayErrors"
                            />
                        </section>
                    </week-display>
                    <!-- END NEXT WEEK SECTION -->
                </transition>
            </div>
        </section>
        <!-- ACTION BUTTONS -->
        <!-- Hide it when the empty from warning message is truthy -->
        <section
            id="modal-actions"
            class="flex items-center justify-between min-h-16 h-16 w-full space-x-4 border-t dark:border-bgray-700 px-5"
            v-if="displayFormEmptyWarning === null"
        >
            <schedule-form-actions-button
                @autoFill="setWaterAvailableAllWeek"
                @reset="resetWaterSchedule"
            />
            <div class="flex space-x-4">
                <app-confirm-button
                    :disabled="isSendingData"
                    @click="onSubmit"
                    :isLoading="isSendingData && !displayFormEmptyWarning"
                />
                <app-cancel-button @click="$emit('formClickedOutside')" />
            </div>
        </section>
    </Modal>
</template>

<script lang="ts">
// components
import Icon from "../../Icon.vue";
import ScheduleDisplay from "../ScheduleDisplay.vue";
import ScheduleDaySubform from "./ScheduleDaySubform.vue";
import WeekDisplay from "../WeekDisplay.vue";
import Modal from "../../Modal.vue";
import ScheduleFormWeekSelector from "./ScheduleFormWeekSelector.vue";
import AppConfirmButton from "../../AppConfirmButton.vue";
import AppCancelButton from "../../AppCancelButton.vue";
import ScheduleFormActionsButton from "./ScheduleFormActionsButton.vue";

//icons
import { mdiPlusBoxMultiple, mdiPlus } from "@mdi/js";
//
import { computed, ComputedRef, defineAsyncComponent, defineComponent, reactive, ref } from "vue";

import { frDaysMapper, randNumber } from "../../../lib/utils";
import { useRoute } from "vue-router";
import { useStore } from "vuex";
import Loader from "../../Loader.vue";

import {
    fillRemainingPeriod,
    flashSnack,
    FormSchedule,
    isPeriodEmpty,
    isTimeEmpty,
    Period,
    scheduleFormData,
} from "../../../lib/shared";

import {
    AddSegmentArgs,
    RemoveSegmentArgs,
    ResetAllErrorsArgs,
    ResetErrorArgs,
    ResetTimeArgs,
    ScheduleFormRequest,
    SetErrorArgs,
    SetTimeArgs,
    TargetSchedule,
} from "../../../types/components";
import { ScheduleDays, TownScheduleState } from "../../../store/modules/schedules";

import equal from "fast-deep-equal";
import FlexibleLoader from "../../FlexibleLoader.vue";
import { useI18n } from "vue-i18n";

export default defineComponent({
    components: {
        Icon,
        ScheduleDisplay,
        WeekDisplay,
        Modal,
        Loader,
        ScheduleEmptyWarning: defineAsyncComponent({
            loadingComponent: FlexibleLoader,
            loader: () => import("./ScheduleEmptyWarning.vue"),
        }),
        ScheduleDaySubform,
        ScheduleFormWeekSelector,
        AppCancelButton,
        AppConfirmButton,
        ScheduleFormActionsButton,
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
        const { t } = useI18n();
        // const wilayaCode = parseInt(route.params.wilayaId as string);
        const townCode = parseInt(route.params.townId as string);
        const storeSchedule: ComputedRef<TownScheduleState | undefined> = computed(() => {
            return store.getters.getScheduleByTownCode(townCode);
        });

        /** Tracks whether the schedules should be inserted or updated */
        const isScheduleLoadedFromStore = { current: false, next: false };
        const formTitle = computed(() => {
            // get the selected displayed schedule, current or next
            const isNextSelected = isNextWeekSchedule.value;
            // get the state of the schedule data; whether it was loaded from the store or not according to the selected schedule
            const targetSchedule = isNextSelected
                ? isScheduleLoadedFromStore.next
                : isScheduleLoadedFromStore.current;
            return targetSchedule ? "Modifier" : "Ajouter";
        });
        /**
         * Attemps to get the schedule values from the vuex store. If they do not exist, a fresh schedule is returned instead
         */
        const populateSchedule = (targetSchedule: TargetSchedule): FormSchedule[] => {
            const formArray = scheduleFormData();
            const storeScheduleClone: TownScheduleState | undefined = JSON.parse(
                JSON.stringify(storeSchedule.value)
            );

            if (storeScheduleClone && storeScheduleClone[targetSchedule]) {
                // set the loaded schedule
                isScheduleLoadedFromStore[targetSchedule] = true;
                const schedule = storeScheduleClone[targetSchedule]!.schedule;
                if (schedule) {
                    formArray.forEach((day, index) => {
                        const targetDay = frDaysMapper[day.frDay] as keyof ScheduleDays;
                        // console.log("day=>", day, "targetDay=", targetDay, "schedule.targetDay=", schedule[targetDay]);
                        const storeSchedule = schedule[targetDay];
                        day.schedule = storeSchedule;
                        // add error array for each period
                        for (let i = 1; i < storeSchedule.length; i++) {
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
        const currentSchedule = reactive<FormSchedule[]>(populateSchedule("current"));
        const nextSchedule = reactive<FormSchedule[]>(populateSchedule("next"));

        /**
         * @retuns  the current week or next week schedule based on the given TargetSchedule
         */
        const getSchedule = (targetSchedule: TargetSchedule): FormSchedule[] =>
            targetSchedule === "current" ? currentSchedule : nextSchedule;

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
        const addScheduleSegment = (args: AddSegmentArgs): void => {
            const { targetSchedule, dayIndex } = args;
            const schedule = targetSchedule === "current" ? currentSchedule : nextSchedule;
            schedule[dayIndex].schedule.push({
                from: {
                    hours: null,
                    minutes: null,
                },
                to: {
                    hours: null,
                    minutes: null,
                },
            });
            schedule[dayIndex].errors.push({
                from: "",
                to: "",
            });
        };
        /**
         * removes a time schedule segment from a day
         */
        const removeScheduleSegment = (args: RemoveSegmentArgs): void => {
            const { targetSchedule, dayIndex, periodIndex } = args;
            const schedule = targetSchedule === "current" ? currentSchedule : nextSchedule;
            schedule[dayIndex].schedule.splice(periodIndex, 1);
            schedule[dayIndex].errors.splice(periodIndex, 1);
        };
        /**
         * set a time value to the schedule according to the provided args
         */
        const handleSetTime = (args: SetTimeArgs): void => {
            const { newValue, targetTime, periodIndex, dayIndex, targetSchedule } = args;
            const schedule = getSchedule(targetSchedule);
            schedule[dayIndex].schedule[periodIndex][targetTime] = newValue;
        };
        const handleResetTime = (args: ResetTimeArgs): void => {
            const { targetTime, periodIndex, dayIndex, targetSchedule } = args;
            const schedule =
                getSchedule(targetSchedule)[dayIndex].schedule[periodIndex][targetTime];
            schedule.hours = schedule.minutes = null;
        };

        const handleSetError = (args: SetErrorArgs) => {
            const { message, targetTime, targetSchedule, periodIndex, dayIndex } = args;
            const scheduleError = getSchedule(targetSchedule)[dayIndex].errors[periodIndex];
            scheduleError[targetTime] = message;
        };

        const handleResetError = (args: ResetErrorArgs) => {
            console.log("resetting the error");
            const { targetTime, targetSchedule, periodIndex, dayIndex } = args;
            const scheduleErrors = getSchedule(targetSchedule)[dayIndex].errors[periodIndex];
            scheduleErrors[targetTime] = "";
        };

        const handleResetAllDayErrors = (args: ResetAllErrorsArgs) => {
            const { dayIndex, targetSchedule } = args;
            const scheduleErrors = getSchedule(targetSchedule)[dayIndex].errors;
            scheduleErrors.forEach((periodError) => {
                periodError.from = "";
                periodError.to = "";
            });
        };

        /**
         * Check if the schedule form was filled or left as is
         * @return true if form was filled, false if it was left as default
         */
        const isScheduleEmpty = (schedule: FormSchedule[]): boolean => {
            for (let dayIndex = 0; dayIndex < schedule.length; dayIndex++) {
                const periods = schedule[dayIndex].schedule;
                for (let periodIndex = 0; periodIndex < periods.length; periodIndex++) {
                    const period = periods[periodIndex];
                    if (!isTimeEmpty(period.from) || !isTimeEmpty(period.to)) return false;
                }
            }
            return true;
        };
        /**
         * Check if the given schedule contains errors
         */
        const doesScheduleHaveErrors = (schedule: FormSchedule[]): boolean => {
            for (let dayIndex = 0; dayIndex < schedule.length; dayIndex++) {
                const day = schedule[dayIndex];
                for (let periodIndex = 0; periodIndex < day.errors.length; periodIndex++) {
                    const errors = day.errors[periodIndex];
                    if (errors.from.length > 0 || errors.to.length > 0) return true;
                }
            }
            return false;
        };
        /**
         * Checks if both schedules (current & next week schedules) contain errors
         */
        const checkBothFormsForErrors = (): { current: boolean; next: boolean } => {
            return {
                current: doesScheduleHaveErrors(currentSchedule),
                next: doesScheduleHaveErrors(nextSchedule),
            };
        };

        /** returns the schedule object in its database-ready format */
        const convertToRequestObject = (schedule: FormSchedule[]): ScheduleDays | null => {
            // ** A CHECK FOR SCHEDULE EMPTINESS IS CALLED BEFORE THIS METHOD

            if (isScheduleEmpty(schedule)) return null;
            // object which is meant to be sent to the server
            const requestObject: ScheduleDays = {
                sunday: [],
                monday: [],
                tuesday: [],
                wednesday: [],
                thursday: [],
                friday: [],
                saturday: [],
            };
            for (let i = 0; i < schedule.length; i++) {
                const daySchedule = schedule[i];
                const day = daySchedule.enDay as keyof ScheduleDays;
                const periods = daySchedule.schedule;

                for (let periodIndex = 0; periodIndex < periods.length; periodIndex++) {
                    const period: Period = { ...periods[periodIndex] };
                    // fill any missing hours/mintues values when possible
                    const filledPeriod = fillRemainingPeriod(period);
                    // always add the first segment
                    if (periodIndex <= 0) {
                        requestObject[day].push(filledPeriod);
                    } else {
                        // only add only add subsequent segements if they are not empty
                        if (!isPeriodEmpty(period)) requestObject[day].push(filledPeriod);
                    }
                }
                // postObject[day] = daySchedule.schedule;
            }
            return requestObject;
        };

        const serialize = (o: any) => (!o ? null : JSON.parse(JSON.stringify(o)));
        /**
         * Compares the local target form schedule to the values stored in the Vuex store. Used to prevent form submission if nothing was changed.
         * @param schedule the local schedule state
         * @param targetSchedule the target schedule (current or next) that the local schedule should be compared against in the vuex store
         * @returns true if the Vuex store values do not match with the local target form schedule, false it nothing was changed.
         */
        const hasFormBeenUpdated = (
            schedule: ScheduleDays | null,
            targetSchedule: TargetSchedule
        ): boolean => {
            const form = serialize(schedule);
            const storeForm = serialize(
                targetSchedule === "current"
                    ? storeSchedule.value?.current?.schedule
                    : storeSchedule.value?.next?.schedule
            );
            return !equal(form, storeForm);
        };

        const displayFormEmptyWarning = ref<"current" | "next" | "both" | null>(null);
        /**
         * Sets the displayFormEmptyWarning state to the appropirate value based on currentSchedule & nextSchedule state
         * @returns if a warning was issued for any of the form, return true, if not return false.
         */
        const setDisplayFormEmptyWarning = (): boolean => {
            const { current, next } = {
                current: isScheduleEmpty(currentSchedule),
                next: isScheduleEmpty(nextSchedule),
            };
            if (current && next) {
                displayFormEmptyWarning.value = "both";
            } else if (current && !next) {
                displayFormEmptyWarning.value = "current";
            } else if (!current && next) {
                displayFormEmptyWarning.value = "next";
            } else {
                displayFormEmptyWarning.value = null;
            }
            return current || next ? true : false;
        };
        // hides the empty warning and redirects to the appromirate empty component
        const hideFormEmptyWarning = () => {
            // redirect to the empty from
            if (displayFormEmptyWarning.value === "next") isNextWeekSchedule.value = true;
            if (displayFormEmptyWarning.value === "current") isNextWeekSchedule.value = false;
            // if the value is both, stay on the current schedule
            displayFormEmptyWarning.value = null;
        };

        //
        const isSendingData = ref<boolean>(false);

        /** Generate the request object that is meant to be sent to the store, as a payload to saveSchedule action */
        const generateRequestObject = (): ScheduleFormRequest => {
            const request: ScheduleFormRequest = {
                townCode,
                current: {
                    // if the schedule was loaded from the store, a patch request is sent instead
                    method: isScheduleLoadedFromStore.current ? "patch" : "post",
                    data: convertToRequestObject(currentSchedule),
                    wasChanged: isScheduleLoadedFromStore.current ? false : true, // initial state to be changned later
                },
                next: {
                    method: isScheduleLoadedFromStore.next ? "patch" : "post",
                    data: convertToRequestObject(nextSchedule),
                    wasChanged: isScheduleLoadedFromStore.next ? false : true, // initial state to be changned later
                },
            };

            // if both request should be of type patch, check if the form content has been changed or not
            // and prevent the form submission if so
            if (isScheduleLoadedFromStore.current) {
                request.current.wasChanged = hasFormBeenUpdated(request.current.data, "current");
            }

            if (isScheduleLoadedFromStore.next) {
                request.next.wasChanged = hasFormBeenUpdated(request.next.data, "next");
            }

            return request;
        };

        const onSubmit = async () => {
            // first check if both forms have errors or not
            const formErrors = checkBothFormsForErrors();
            // redirect the user to the component where the errors where found
            if (formErrors.current || formErrors.next) {
                // if an error is found in both schedules, keep the user in the current component

                // else redirect to where the error was found
                if (formErrors.current && !formErrors.next) setIsNextWeekSchedule(false);
                if (formErrors.next && !formErrors.current) setIsNextWeekSchedule(true);
                flashSnack({ message: t("schedule.errors.promptFixErrors"), type: "error" });
                return;
            }

            const request: ScheduleFormRequest = generateRequestObject();

            if (!request.current.wasChanged && !request.next.wasChanged) {
                return flashSnack({ message: t("schedule.info.noChangesMade") });
            }
            // check if any of the forms were not filled and
            const isEmptyWarningDisplayed = setDisplayFormEmptyWarning();

            // if  the was no empty schedule, submit the form
            if (!isEmptyWarningDisplayed) saveSchedule(request);
            // otherwise wait for the user confirmation to submit the empty form
        };

        /** calls the saveSchedule action to send a post/patch request to the sever */
        const saveSchedule = (req?: ScheduleFormRequest) => {
            isSendingData.value = true;
            // if a request object was not provided (upon empty schedule warning) generate one based on the current form state
            const request: ScheduleFormRequest = req ? req : generateRequestObject();
            store
                .dispatch("saveSchedule", request)
                .then(() => {
                    //
                    flashSnack({ message: t("schedule.savingSuccess"), type: "info" });
                    emit("formSaved");
                    isSendingData.value = false;
                })
                .catch((err: any) => {
                    //
                    flashSnack({ message: t("general.snack.errors.savingError"), type: "error" });

                    isSendingData.value = false;
                });
        };
        const onConfirmSendSchedule = () => saveSchedule();

        const autoFill = () => {
            currentSchedule.forEach((day, i) => {
                //
                if (i % 2 === 0) {
                    day.schedule.forEach((period) => {
                        period.from.hours = randNumber(5, 8);
                        period.from.minutes = 0;
                        period.to.hours = randNumber(15, 17);
                        period.to.minutes = 0;
                    });
                }
            });
            nextSchedule.forEach((day, i) => {
                //
                if (i % 2 === 1) {
                    day.schedule.forEach((period) => {
                        period.from.hours = randNumber(5, 8);
                        period.from.minutes = 30;
                        period.to.hours = randNumber(15, 17);
                        period.to.minutes = 0;
                    });
                }
            });
        };

        /**
         *  the target week its water schedule as available throughout of it.
         *
         */
        const setWaterAvailableAllWeek = (targetWeek: "current" | "next" | "both") => {
            // only run this if the target week is not next
            if (targetWeek != "next") {
                currentSchedule.forEach((day) => {
                    day.schedule.forEach((period) => {
                        period.from.hours = 0;
                        period.from.minutes = 0;
                        period.to.hours = 23;
                        period.to.minutes = 59;
                    });
                });
                if (targetWeek !== "both") setIsNextWeekSchedule(false);
            }
            // only run this if the target week is not current
            if (targetWeek != "current") {
                nextSchedule.forEach((day) => {
                    day.schedule.forEach((period) => {
                        period.from.hours = 0;
                        period.from.minutes = 0;
                        period.to.hours = 23;
                        period.to.minutes = 59;
                    });
                });
                // if the requested auto-fill was for next week only, move the ui to it
                if (targetWeek !== "both") setIsNextWeekSchedule(true);
            }
        };
        const resetWaterSchedule = (targetWeek: "current" | "next" | "both") => {
            // only run this if the target week is not next
            if (targetWeek != "next") {
                currentSchedule.forEach((day) => {
                    day.schedule.forEach((period) => {
                        period.from.hours = null;
                        period.from.minutes = null;
                        period.to.hours = null;
                        period.to.minutes = null;
                    });
                });
                // if the requested reset was for current week only, move the ui to it
                if (targetWeek !== "both") setIsNextWeekSchedule(false);
            }
            // only run this if the target week is not current
            if (targetWeek != "current") {
                nextSchedule.forEach((day) => {
                    day.schedule.forEach((period) => {
                        period.from.hours = null;
                        period.from.minutes = null;
                        period.to.hours = null;
                        period.to.minutes = null;
                    });
                });
                // if the requested reset was for next week only, move the ui to it
                if (targetWeek !== "both") setIsNextWeekSchedule(true);
            }
        };

        return {
            currentSchedule,
            nextSchedule,
            showModal,
            openModal,
            closeModal,
            formTitle,
            // child event listeners
            handleSetTime,
            handleResetTime,
            handleResetError,
            handleResetAllDayErrors,
            handleSetError,

            isNextWeekSchedule,
            setIsNextWeekSchedule,
            addScheduleSegment,
            removeScheduleSegment,

            onSubmit,
            displayFormEmptyWarning,
            hideFormEmptyWarning,
            onConfirmSendSchedule,
            isSendingData,
            setWaterAvailableAllWeek,
            resetWaterSchedule,

            // icons
            mdiPlusBoxMultiple,
            mdiPlus,

            // localization
            t,

            // test
            autoFill,
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
