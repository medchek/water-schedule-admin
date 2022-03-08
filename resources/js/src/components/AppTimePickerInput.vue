<template>
    <div class="relative w-full h-full">
        <!-- :value="hours !== null && minutes !== null ? time : null" -->
        <div class="w-full min-h-10 relative">
            <div class="h-10 w-full relative">
                <input
                    readonly
                    :type="type"
                    class="w-full h-full rounded px-2 border focus:ring-2 cursor-pointer dark:placeholder-bgray-500 dark:bg-bgray-100"
                    :class="
                        error.length > 0
                            ? 'ring-2 ring-red-300 dark:ring-red-500'
                            : 'ring-blue-200 dark:ring-indigo-600'
                    "
                    :placeholder="placeholder"
                    :value="time"
                    @click="isOpen = !isOpen"
                    ref="inputRef"
                />
                <!-- RESET CROSS -->
                <button
                    v-if="time"
                    :title="t('general.reset')"
                    class="absolute right-0 arabic:left-0 top-0 h-full w-10 text-blue-700 dark:text-dark-bg hover:text-gray-700 focus:bg-gray-100 rounded-r"
                    @click="resetTime"
                >
                    <icon :icon="mdiClose" />
                </button>
            </div>
        </div>

        <p
            class="relative h-auto text-xs md:text-sm text-red-500 font-semibold mt-0.5 arabic:direction-rtl pt-0.5"
        >
            {{ error }}
        </p>
        <!-- TIMEPICKER START -->

        <transition name="fade" type="transition" v-if="!disabled">
            <app-time-selector
                ref="pickerRef"
                v-if="isOpen"
                :timePickerDisplay="timePickerDisplay"
                :hours="computedHours"
                :minutes="computedMinutes"
                @onClickOutside="closePicker"
                @onHourSelected="selectHours"
                @onMinSelected="selectMinutes"
            />
        </transition>

        <!-- TIMEPICKER END -->
    </div>
</template>

<script lang="ts">
import {
    computed,
    defineAsyncComponent,
    defineComponent,
    onMounted,
    PropType,
    ref,
    watch,
} from "vue";
import { addZeroToSingleDigit } from "../lib/utils";

import { mdiClose } from "@mdi/js";
import Icon from "./Icon.vue";
import type { Time } from "../lib/shared";
import { useI18n } from "vue-i18n";

export default defineComponent({
    components: {
        Icon,
        AppTimeSelector: defineAsyncComponent(() => import("./AppTimeSelector.vue")),
    },
    props: {
        modelValue: {
            type: Object as PropType<Time>,
            default: {
                hours: null,
                minutes: null,
            },
            required: true,
        },
        error: {
            type: String,
            default: "",
        },
        disabled: {
            type: Boolean,
            default: false,
        },
        placeholder: { type: String },
        type: { type: String, default: "text" },
    },
    setup(props, { emit }) {
        const { t } = useI18n();
        const inputRef = ref<HTMLInputElement | null>(null);
        const pickerRef = ref<HTMLElement | null>(null);
        const isOpen = ref<boolean>(false);
        const closePicker = () => (isOpen.value = false);

        const computedModel = computed(() => props.modelValue);
        const hours = ref<number | null>(computedModel.value.hours);
        const minutes = ref<number | null>(computedModel.value.minutes);

        const computedHours = computed(() => computedModel.value.hours);
        const computedMinutes = computed(() => computedModel.value.minutes);

        const time = computed(() => {
            const { hours, minutes } = props.modelValue;

            if (hours === null && minutes === null) return null;
            const hoursDisplay = hours === null ? "--" : addZeroToSingleDigit(hours);
            const minutesDisplay = minutes === null ? "--" : addZeroToSingleDigit(minutes);
            return `${hoursDisplay}:${minutesDisplay}`;
        });
        // used to display the time in the timepicker header
        const timePickerDisplay = computed(() => (time.value === null ? "--:--" : time.value));

        const getUpdatedTime = (): Time => ({ hours: hours.value, minutes: minutes.value });

        const selectHours = (hour: number) => {
            emit("update:modelValue", {
                hours: hour,
                minutes: minutes.value,
            });
            hours.value = hour;
            emitOnUpdated();
        };
        const selectMinutes = (minute: number) => {
            emit("update:modelValue", {
                hours: hours.value,
                minutes: minute,
            });
            minutes.value = minute;
            emitOnUpdated();
        };

        const resetTime = () => {
            hours.value = minutes.value = null;
            emit("update:modelValue", {
                hours: null,
                minutes: null,
            });
            // send the reset event to supress any present error display
            emit("hasReset");
            // emitOnUpdated();
        };

        /**
         * Allows to trigger from error check in the parent component
         * Should be called everytime hours or mintues value changes
         */
        const emitOnUpdated = () => {
            emit("updated", getUpdatedTime());
        };

        return {
            addZeroToSingleDigit,
            selectHours,
            selectMinutes,
            closePicker,
            time,
            computedHours,
            computedMinutes,
            isOpen,
            inputRef,
            pickerRef,
            mdiClose,
            resetTime,
            timePickerDisplay,
            // i18n
            t,
        };
    },
});
</script>

<style>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.1s ease-in-out;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
