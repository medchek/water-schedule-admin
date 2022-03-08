<template>
    <div
        class="fixed flex items-center justify-center left-0 right-0 top-0 bottom-0 w-screen h-screen bg-dark-bg/40 dark:bg-dark-bg/80 z-10"
        @click="handleEmitOnClickOutside"
    >
        <div
            class="fixed flex flex-col bg-white dark:bg-dark-card w-3/4 md:w-80 h-[32rem] md:h-[35rem] left-0 right-0 mx-auto z-100 mt-2 rounded shadow-xl overflow-hidden dark:shadow-black/40"
            ref="pickerRef"
        >
            <p
                class="picker__HEADER flex items-center justify-center grow-0 bg-blue-500 dark:bg-dark-alt/80 min-h-12 text-4xl text-white w-full"
            >
                {{ timePickerDisplay }}
            </p>
            <div
                class="flex min-h-8 font-semibold bg-bgray-100 dark:bg-dark-cancel text-bgray-600 dark:text-bgray-300 text-base"
            >
                <p class="flex justify-center items-center h-full w-full">
                    {{ t("general.hours") }}
                </p>
                <p class="flex justify-center items-center h-full w-full">
                    {{ t("general.minutes") }}
                </p>
            </div>
            <!-- hours & minutes -->
            <div
                class="relative flex grow h-auto overflow-y-hidden border border-gray-100 dark:border-dark-alt dark:border-t-transparent"
            >
                <section class="flex flex-col w-full">
                    <div
                        class="grow h-full max-h-full overflow-y-scroll"
                        ref="hoursListRef"
                        id="hours-selector"
                    >
                        <button
                            v-for="n in 24"
                            class="w-full h-6 md:h-8 transition-colors font-semibold text-base hover:bg-bgray-200 focus:bg-bgray-300 dark:hover:bg-bgray-500/50 dark:focus:bg-blue-900/50 text-gray-800 dark:text-bgray-200"
                            :key="n"
                            :class="[hours === n - 1 && 'bg-bgray-300 dark:bg-dark-alt']"
                            type="button"
                            @click="$emit('onHourSelected', n - 1)"
                        >
                            {{ addZeroToSingleDigit(n - 1) }}
                        </button>
                    </div>
                </section>
                <section class="w-full h-full">
                    <div
                        class="grow h-full max-h-full overflow-y-scroll"
                        ref="minListRef"
                        id="minutes-selector"
                    >
                        <button
                            v-for="n in 60"
                            class="w-full h-6 md:h-8 transition-colors font-semibold text-base hover:bg-bgray-200 focus:bg-bgray-300 dark:hover:bg-bgray-500/50 dark:focus:bg-blue-900/50 text-gray-800 dark:text-bgray-200"
                            :class="[minutes === n - 1 && 'bg-bgray-300 dark:bg-dark-alt']"
                            :key="n"
                            type="button"
                            @click="$emit('onMinSelected', n - 1)"
                        >
                            {{ addZeroToSingleDigit(n - 1) }}
                        </button>
                    </div>
                </section>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent, onMounted, ref, watch } from "vue";
import { useI18n } from "vue-i18n";
import { addZeroToSingleDigit } from "../lib/utils";

export default defineComponent({
    props: {
        timePickerDisplay: {
            required: true,
            type: String,
        },
        hours: {
            required: true,
            validator: (v: any) => typeof v === "number" || v === null,
        },
        minutes: {
            required: true,
            validator: (v: any) => typeof v === "number" || v === null,
        },
    },
    emits: ["onClickOutside", "onHourSelected", "onMinSelected"],
    setup(props, { emit }) {
        const { t } = useI18n();
        const pickerRef = ref<HTMLElement | null>(null);
        const handleEmitOnClickOutside = (e: MouseEvent) => {
            if (pickerRef.value) {
                if (!pickerRef.value.contains(e.target as Node)) {
                    emit("onClickOutside");
                }
            }
        };

        const hoursListRef = ref<HTMLElement | null>(null);
        const minListRef = ref<HTMLElement | null>(null);

        const mountedHour = ref<number | null>(null);
        const mountedMin = ref<number | null>(null);

        onMounted(() => {
            const hoursIndex = props.hours as number;
            const minutesIndex = props.minutes as number;

            mountedHour.value = hoursIndex;
            mountedMin.value = minutesIndex;

            const hoursList = document.getElementById("hours-selector")! as HTMLElement;
            const minutesList = document.getElementById("minutes-selector")! as HTMLElement;

            if (hoursList && props.hours) {
                const scrollBy = (hoursList.children[hoursIndex] as HTMLElement).offsetTop;
                hoursList.scrollTo({ top: scrollBy - 100, behavior: "smooth" });
            }

            if (minutesList && props.minutes) {
                const scrollBy =
                    (minutesList.children[minutesIndex] as HTMLElement).offsetTop - 150;
                minutesList.scrollTo({ top: scrollBy - 100, behavior: "smooth" });
            }
        });

        watch([() => props.hours, () => props.minutes], ([newHour, newMin], [_, __]) => {
            if (newHour !== mountedHour.value && newMin !== mountedMin.value) {
                emit("onClickOutside");
            }
        });

        return {
            pickerRef,
            hoursListRef,
            minListRef,
            handleEmitOnClickOutside,
            addZeroToSingleDigit,
            t,
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
