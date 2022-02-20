<template>
    <div class="space-y-3 hover:bg-bgray-50 dark:hover:bg-dark-alt/25">
        <section class="flex justify-between items-center arabic:direction-rtl">
            <label
                class="font-semibold text-bgray-800 dark:text-bgray-200 text-base sm:text-lg capitalize"
                >{{ day }}</label
            >
            <!-- Only show this if the are no more than 2 schedule segments to control the amount of data sent to the server -->
            <!-- and only if the water is cut on the same day, so that the user can chose a time for the water to be restored later on the same day -->
            <button
                v-if="displayAddSegment"
                @click="addScheduleSegment()"
                :title="t('schedule.addSchedule', { day })"
            >
                <icon
                    :icon="mdiPlus"
                    className="h-6 text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                />
            </button>
        </section>
        <!-- DISPLAY THE INPUTS FOR MULTIPLE PERIODS -->

        <section
            v-for="(period, index) in periods"
            :key="index"
            class="flex items-center justify-between"
        >
            <div
                class="flex arabic:flex-row-reverse grow justify-between space-x-4 arabic:space-x-reverse px-1"
            >
                <!-- FROM INPUT -->
                <app-time-picker-input
                    class="w-full h-auto"
                    :placeholder="t('schedule.from')"
                    v-model="period.from"
                    @updated="($newVal) => handleOnUpdated($newVal, 'from', index)"
                    @hasReset="() => handleHasReset('from', index)"
                    :error="errors[index].from"
                />
                <div
                    class="flex arabic:flex-row-reverse w-full h-auto space-x-2 arabic:space-x-reverse"
                >
                    <!-- TO INPUT -->
                    <app-time-picker-input
                        class="w-full h-auto"
                        :placeholder="t('schedule.to')"
                        v-model="period.to"
                        @updated="($newVal) => handleOnUpdated($newVal, 'to', index)"
                        @hasReset="() => handleHasReset('to', index)"
                        :error="errors[index].to"
                    />
                    <button
                        v-if="index > 0"
                        @click="removeScheduleSegment(index)"
                        :title="t('general.delete')"
                    >
                        <icon
                            :icon="mdiClose"
                            className="h-5 w-5 text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        />
                    </button>
                </div>
            </div>
        </section>
    </div>
</template>

<script lang="ts">
import { computed, ComputedRef, defineComponent, PropType } from "vue";
import {
    FormError,
    isTimeAGreaterThanB,
    isTimeEmpty,
    isTimeMidnight,
    isTimeOneMinuteBeforeMidnight,
    Period,
    Time,
} from "../../../lib/shared";
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
import { useStore } from "vuex";
import { useI18n } from "vue-i18n";

export default defineComponent({
    components: { Icon, AppTimePickerInput },
    emits: [
        "addDaySegment",
        "removeDaySegment",
        "setTime",
        "resetTime",
        "setError",
        "resetError",
        "resetAllDayErrors",
    ],
    props: {
        targetSchedule: { type: String as PropType<TargetSchedule>, required: true },
        dayIndex: { type: Number, required: true },
        frDay: { type: String, required: true },
        arDay: { type: String, required: true },
        periods: { type: Object as PropType<Period[]>, required: true },
        errors: {
            type: Array as PropType<FormError[]>,
            required: true,
        },
    },
    setup(props, { emit }) {
        const { t } = useI18n();
        const store = useStore();
        const day = computed(() => (store.getters.getIsArLang ? props.arDay : props.frDay));
        const handleOnUpdated = (
            updatedTime: Time,
            targetTime: TargetTime,
            periodIndex: number
        ) => {
            const args: SetTimeArgs = {
                newValue: updatedTime,
                targetTime,
                periodIndex,
                dayIndex: props.dayIndex,
                targetSchedule: props.targetSchedule,
            };
            emit("setTime", args);
            checkForErrors();
        };
        /**
         * sets of rules to control if the add period segment should be display or not
         */
        const displayAddSegment: ComputedRef<boolean> = computed(() => {
            const periods = props.periods;
            const period = props.periods[0];
            if (periods.length > 1) {
                return false;
            }
            if (period.to.hours === null) {
                return false;
            }
            if (period.to.hours === 23 && period.to.minutes !== null && period.to.minutes > 57) {
                return false;
            }
            return true;
        });

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
            // check if the the water supply cutting time of the first period contains any error after the segement is removed
            // if props.periods[0].to error was caused by the added segement, then it should be reset after the segement removal
            if (props.errors[0].to == t("schedule.errors.previousToMustBeLessThanAdded")) {
                resetError("to", 0);
            }
            emit("removeDaySegment", args);
        };

        /**
         * Check for errors on every priod inside the periods props.
         * Should be run after each value update (handleOnUpdated)
         */
        const checkForErrors = (): void => {
            resetAllDayErrors();

            props.periods.forEach((period, i) => {
                const { from, to } = period;
                if (i > 0) {
                    // extra checks for the added time segments
                    const { to: previousTo } = props.periods[i - 1];
                    // check if from time is not empty, previous to time is not empty (to only show the error message if not empty), and the from is greather than the previous to
                    // if so throw an error

                    if (
                        !isTimeEmpty(from) &&
                        !isTimeEmpty(previousTo) &&
                        !isTimeAGreaterThanB(from, previousTo)
                    ) {
                        // "Le temp de rétablissement ajouté au meme jour doit être supérieure au temp de coupure précédent"
                        setError(
                            t("schedule.errors.addedFromMustBeGreaterThanPreviousTo"),
                            "from",
                            i
                        );
                    }
                    // check if the to time is not empty, previous to time is not empty (to only show the error message if not empty), and the to is greather than the previous to
                    // if so throw an error
                    if (
                        !isTimeEmpty(to) &&
                        !isTimeEmpty(previousTo) &&
                        !isTimeAGreaterThanB(to, previousTo)
                    ) {
                        // Le temp de coupure d'eau ajouté au meme jour doit être supérieure au temp de coupure précédent
                        setError(t("schedule.errors.addedToMustBeGreaterThanPreviousTo"), "to", i);
                    }
                    // the from value must be set for additonal time segements if the to value has been set
                    if (isTimeEmpty(from) && !isTimeEmpty(to)) {
                        // Ce temp doit être aussi régler quand le temp de coupure a été reglé pour le temp additionnel du même jour
                        setError(
                            t("schedule.errors.addedFromMustBeSetWhenAddedToIsSet"),
                            "from",
                            i
                        );
                    }
                }

                // the from values must never be 23:59
                if (isTimeOneMinuteBeforeMidnight(from)) {
                    // Le temp de rétablissement d'eau ne peut pas égaler 23:59
                    setError(t("schedule.errors.mustNotBeOneMinuteBeforeMidnight"), "from", i);
                }
                // the to valus must never be 00:00
                if (isTimeMidnight(to)) {
                    // Le temp de coupure d'eau ne peut pas égaler 00:00
                    setError(t("schedule.errors.mustNotBeMidnight"), "to", i);
                }

                // check from validity
                if (isTimeAGreaterThanB(from, to) && !isTimeEmpty(to)) {
                    // Le temp de rétablissement d'eau doit être inférieur au temp de coupure
                    setError(t("schedule.errors.fromMustBeLessThanTo"), "from", i);
                }

                // check for to validity
                if (!isTimeEmpty(from) && !isTimeEmpty(to) && !isTimeAGreaterThanB(to, from)) {
                    // Le temp de coupure d'eau doit être supérieure au temp de rétablissement
                    setError(t("schedule.errors.toMustBeGreaterThanFrom"), "to", i);
                }

                // if the user adds more segements, validate the next one as well..
                if (props.periods[i + 1]) {
                    const { to: nextTo, from: nextFrom } = props.periods[i + 1];
                    if (!isTimeEmpty(from) && isTimeAGreaterThanB(to, nextFrom)) {
                        // Le temp de coupure doit être inférieur au nouveau temp de rétablissement ajouté au même jour
                        setError(t("schedule.errors.previousToMustBeLessThanAdded"), "to", i);
                    }

                    if ((!isTimeEmpty(nextFrom) || !isTimeEmpty(nextTo)) && isTimeEmpty(to)) {
                        // Le temp de coupure doit être réglé quand vous avez préciser d'autres temps additionnels du même jour
                        setError(t("schedule.errors.previousToMustBeSetIfAddedTimeIsSet"), "to", i);
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
        const resetAllDayErrors = () =>
            emit("resetAllDayErrors", {
                dayIndex: props.dayIndex,
                targetSchedule: props.targetSchedule,
            });

        return {
            handleOnUpdated,
            handleHasReset,
            removeScheduleSegment,
            addScheduleSegment,
            displayAddSegment,
            // localized day
            day,
            // localization
            t,
            // icons
            mdiPlus,
            mdiClose,
        };
    },
});
</script>
