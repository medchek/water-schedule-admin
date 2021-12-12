<template>
  <div class="relative w-full h-full">
    <!-- :value="hours !== null && minutes !== null ? time : null" -->
    <div class="w-full h-10 relative">
      <input
        readonly
        :type="type"
        class="w-full h-full rounded px-2 border focus:ring-2 cursor-pointer dark:placeholder-bgray-500 dark:bg-bgray-100"
        :class="error.length > 0 ? 'ring-2 ring-red-300 dark:ring-red-500' : 'ring-blue-200 dark:ring-indigo-600'"
        :placeholder="placeholder"
        :value="time"
        @click="isOpen = !isOpen"
        ref="inputRef"
      />
      <!-- button previous v-if="hours !== null || minutes !== null" -->
      <button
        v-if="time"
        title="réinitialiser"
        class="absolute right-0 top-0 h-full w-10 text-blue-700 dark:text-dark-bg hover:text-gray-700 focus:bg-gray-100 rounded-r"
        @click="resetTime"
      >
        <icon :icon="mdiClose" />
      </button>
    </div>

    <p class="relative text-xs md:text-sm text-red-500 font-semibold mt-0.5">{{ error }}</p>

    <!-- <div class="absolute flex sm:hidden items-center justify-center top-0 right-0 left-0 w-full h-full bg-gray-500 bg-opacity-50 z-10" v-if="isOpen"></div> -->
    <transition name="scale" type="animation" v-if="!disabled">
      <div
        id="picker"
        :class="isPickerTop && 'bottom-0'"
        class="
          absolute
          flex flex-col
          bg-white
          dark:bg-dark-card
          w-full
          h-80
          left-0
          right-0
          mx-auto
          z-100
          mt-2
          rounded
          shadow-xl
          overflow-hidden
          dark:shadow-black/40
        "
        v-if="isOpen"
        ref="pickerRef"
      >
        <p
          class="
            picker__HEADER
            flex
            items-center
            justify-center
            grow-0
            bg-blue-500
            dark:bg-dark-alt/80
            min-h-10
            md:min-h-12
            text-3xl
            sm:text-4xl
            text-white
            w-full
          "
        >
          {{ timePickerDisplay }}
        </p>
        <div class="flex min-h-8 font-semibold bg-bgray-100 dark:bg-dark-cancel text-bgray-600 dark:text-bgray-300 text-sm md:text-base">
          <p class="flex justify-center items-center h-full w-full">Heurs</p>
          <p class="flex justify-center items-center h-full w-full">Minutes</p>
        </div>
        <!--  -->
        <div class="relative flex grow h-auto overflow-y-hidden border border-gray-100 dark:border-dark-alt dark:border-t-transparent">
          <section class="flex flex-col w-full" id="hours-section">
            <div class="grow h-full max-h-full overflow-y-scroll">
              <button
                v-for="n in 24"
                class="
                  w-full
                  h-6
                  md:h-8
                  transition-colors
                  font-semibold
                  text-sm
                  md:text-base
                  hover:bg-bgray-200
                  focus:bg-bgray-300
                  dark:hover:bg-bgray-500/50 dark:focus:bg-blue-900/50
                  text-gray-800
                  dark:text-bgray-200
                "
                :key="n"
                :class="[hours === n - 1 && 'bg-bgray-300 dark:bg-dark-alt']"
                type="button"
                @click="selectHours(n - 1)"
              >
                {{ addZeroToSingleDigit(n - 1) }}
              </button>
            </div>
          </section>
          <section class="w-full h-full" id="minutes-section">
            <div class="grow h-full max-h-full overflow-y-scroll">
              <button
                v-for="n in 60"
                class="
                  w-full
                  h-6
                  md:h-8
                  transition-colors
                  font-semibold
                  text-sm
                  md:text-base
                  hover:bg-bgray-200
                  focus:bg-bgray-300
                  dark:hover:bg-bgray-500/50 dark:focus:bg-blue-900/50
                  text-gray-800
                  dark:text-bgray-200
                "
                :class="[minutes === n - 1 && 'bg-bgray-300 dark:bg-dark-alt']"
                :key="n"
                type="button"
                @click="selectMinutes(n - 1)"
              >
                {{ addZeroToSingleDigit(n - 1) }}
              </button>
            </div>
          </section>
        </div>
      </div>
    </transition>
  </div>
</template>

<script lang="ts">
import { computed, defineComponent, onMounted, PropType, ref, watch } from "vue";
import { addZeroToSingleDigit } from "../lib/utils";
import { ScheduleProps } from "../types/components";

import { mdiClose } from "@mdi/js";
import Icon from "./Icon.vue";
import { Period, Time } from "../lib/shared";

export default defineComponent({
  components: { Icon },
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
    const inputRef = ref<HTMLInputElement | null>(null);
    const pickerRef = ref<HTMLElement | null>(null);
    const isOpen = ref<boolean>(false);
    const closePicker = () => (isOpen.value = false);
    const onTimePickerOpen = (e: MouseEvent) => {
      if (!inputRef.value || !pickerRef.value) return;
      // if the clicked element is part of the input or the picker, dont close the elements
      if (inputRef.value.contains(e.target as Node) || pickerRef.value.contains(e.target as Node)) {
        return;
      } else {
        closePicker();
      }
    };

    watch(isOpen, (newVal) => {
      const modalBase = document.getElementById("modal-base");

      if (!modalBase) return;
      // if isOpen is true
      if (newVal) {
        modalBase.addEventListener("click", onTimePickerOpen, { capture: true });
      } else {
        // if it's false
        modalBase.removeEventListener("click", onTimePickerOpen, { capture: true });
      }
    });

    // whether to display the picker on top of the input upwards (true) or from the bottom downwards (false)
    const isPickerTop = ref<boolean>(false);
    watch(pickerRef, (newVal) => {
      if (newVal) {
        // const targetParent = newVal.parentElement?.parentElement?.parentElement?.parentElement?.parentElement?.getClientRects();
        const parentCoords = document.getElementById("modal-form-container")?.getClientRects()[0];
        const pickerCoords = newVal.getClientRects()[0];
        const pickerHeight = newVal.offsetHeight;

        if (parentCoords === undefined || pickerCoords === undefined) return;

        const isPickerOverflowBottom = pickerCoords.top + pickerHeight > parentCoords.bottom;
        if (isPickerOverflowBottom && !isPickerTop.value) {
          isPickerTop.value = true;
        }
        if (!isPickerOverflowBottom && isPickerTop.value) {
          isPickerTop.value = false;
        }
      } else {
        if (isPickerTop.value) isPickerTop.value = false;
      }
    });

    const hours = ref<number | null>(props.modelValue.hours);
    const minutes = ref<number | null>(props.modelValue.minutes);

    // const time = computed(() => {
    //   if (hours.value === null && minutes.value === null) return null;
    //   const hoursDisplay = hours.value === null ? "--" : addZeroToSingleDigit(hours.value);
    //   const minutesDisplay = minutes.value === null ? "--" : addZeroToSingleDigit(minutes.value);
    //   return `${hoursDisplay}:${minutesDisplay}`;
    // });
    const time = computed(() => {
      const { hours, minutes } = props.modelValue;

      if (hours === null && minutes === null) return null;
      const hoursDisplay = hours === null ? "--" : addZeroToSingleDigit(hours);
      const minutesDisplay = minutes === null ? "--" : addZeroToSingleDigit(minutes);
      return `${hoursDisplay}:${minutesDisplay}`;
    });
    // used to display the time in the timepicker header
    const timePickerDisplay = computed(() => (time.value === null ? "--:--" : time.value));
    // time watcher
    watch([hours, minutes], (newValues, prevValues) => {
      if (prevValues[0] === null || prevValues[1] === null) {
        if (newValues[0] !== null && newValues[1] !== null) {
          // console.log("closing picker");
          closePicker();
        }
      }
      // when the new hours value is set, automatically set the minutes value to 00
      // if (prevValues[0] === null && newValues[0] !== null) minutes.value = 0;
      // everytime one of the values change, emit the new values to v-modal
      emit("update:modelValue", { hours: hours.value, minutes: minutes.value });
      emitOnUpdated();
    });

    const selectHours = (hour: number) => {
      hours.value = hour;
    };
    const selectMinutes = (minute: number) => {
      minutes.value = minute;
    };

    const resetTime = () => {
      hours.value = minutes.value = null;
      emit("update:modelValue", {
        hours: null,
        minutes: null,
      });
      // send the reset event to supress any present error display
      emit("hasReset");
    };

    const emitOnUpdated = () => {
      const updatedTime: Time = {
        hours: hours.value,
        minutes: minutes.value,
      };
      emit("updated", updatedTime);
    };

    return {
      addZeroToSingleDigit,
      selectHours,
      selectMinutes,
      time,
      hours,
      minutes,
      isOpen,
      inputRef,
      pickerRef,
      isPickerTop,
      mdiClose,
      resetTime,
      timePickerDisplay,
    };
  },
});
</script>



<style>
.scale-enter-active {
  animation: scale 0.2s;
}
.scale-leave-active {
  animation: scale 0.2s reverse;
}
@keyframes scale {
  from {
    opacity: 0;
    transform: scale(0);
    transform-origin: top;
  }
  to {
    opacity: 1;
    transform: scale(1);
    transform-origin: top;
  }
}
</style>