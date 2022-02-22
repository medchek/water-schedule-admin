<template>
    <load-and-retry
        v-if="isFetching || failedFetching"
        @retry="fetchAll"
        :isFetching="isFetching"
        :hasFailed="failedFetching"
        :text="t('schedule.errorFetching')"
    />

    <view-container class="grow flex flex-col h-full overflow-hidden" v-else>
        <template v-slot:label>
            {{ t("general.schedule") }} - <span class="capitalize"> {{ title.townName }}</span> -
            {{ title.wilayaName }}
        </template>

        <section
            id="schedule-toolbar"
            class="flex flex-col md:flex-row md:arabic:flex-row-reverse items-center justify-between md:h-14 w-full px-5 space-y-2 md:space-y-0"
        >
            <app-open-modal-button
                class="w-full md:w-auto"
                id="add-schedule"
                @click="openModal"
                :icon="mdiPlusBoxMultiple"
            >
                {{ t("schedule.modifySchedule") }}</app-open-modal-button
            >

            <app-town-selector :towns="wilayaTowns" />
        </section>

        <section id="content-main" class="flex flex-col w-full h-full grow overflow-y-auto py-4">
            <section class="flex grow w-full overflow-x-hidden">
                <div class="flex flex-col grow w-full h-full">
                    <div
                        id="schedule-selector-buttons"
                        class="flex arabic:flex-row-reverse w-full px-5 space-x-5 arabic:space-x-reverse mb-2"
                    >
                        <schedule-week-selector
                            :label="t('schedule.currentWeekSchedule')"
                            :weekFrom="currentWeek.start"
                            :weekTo="currentWeek.end"
                            :isSelected="isCurrentScheduleDisplayed"
                            @click="setIsCurrentScheduleDisplay(true)"
                        />
                        <schedule-week-selector
                            :label="t('schedule.nextWeekSchedule')"
                            :weekFrom="nextWeek.start"
                            :weekTo="nextWeek.end"
                            :isSelected="!isCurrentScheduleDisplayed"
                            @click="setIsCurrentScheduleDisplay(false)"
                        />
                    </div>
                    <div
                        class="flex justify-center items-center grow w-full h-full"
                        id="schedule-fetching"
                        v-if="isFetchingNewSchedule"
                    >
                        <loader
                            className="w-10 h-10 border-t-blue-500 dark:border-t-dark-blue2"
                            customColors
                        />
                    </div>
                    <transition name="slide-right" type="animation" mode="out-in" v-else>
                        <schedule-display
                            v-if="isCurrentScheduleDisplayed"
                            id="current-week"
                            class="flex flex-col grow h-full w-full px-5"
                            label="Programme de la semaine courante"
                            :weekFrom="currentWeek.start"
                            :weekTo="currentWeek.end"
                            :townName="isArLocale ? currentTown.arName : currentTown.name"
                            target="current"
                        />
                        <schedule-display
                            v-else
                            id="next-week"
                            class="flex flex-col grow h-full w-full px-5"
                            label="Programme de la semaine prochaine"
                            :weekFrom="nextWeek.start"
                            :weekTo="nextWeek.end"
                            :townName="isArLocale ? currentTown.arName : currentTown.name"
                            target="next"
                        />
                    </transition>
                </div>
            </section>
        </section>

        <teleport to="#app-modal" class="dark">
            <transition name="fade">
                <schedule-form
                    v-if="showModal"
                    :showModal="showModal"
                    @formClickedOutside="closeModal"
                    @formSaved="closeModal"
                />
            </transition>
        </teleport>
    </view-container>
</template>
<script lang="ts">
// components
import Icon from "../components/Icon.vue";
import ScheduleDisplay from "../components/schedule/ScheduleDisplay.vue";
import WeekDisplay from "../components/schedule/WeekDisplay.vue";
import Modal from "../components/Modal.vue";
import AppTownSelector from "../components/AppTownSelector.vue";
import ScheduleWeekSelector from "../components/schedule/ScheduleDisplayWeekSelector.vue";
import ScheduleForm from "../components/schedule/schedule-form/ScheduleForm.vue";
import Retry from "../components/Retry.vue";
import ViewContainer from "../components/ViewContainer.vue";

import { mdiPlusBoxMultiple } from "@mdi/js";
//
import { computed, ComputedRef, defineComponent, onMounted, ref, watch } from "vue";
import { startOfWeek, endOfWeek, addDays } from "date-fns";

import { formatDate } from "../lib/utils";
import { useRoute, useRouter } from "vue-router";
import { useStore } from "vuex";
import Loader from "../components/Loader.vue";
import { Town } from "../store/modules/towns";
import { Wilaya } from "../store/modules/wilayas";

import { TownScheduleState } from "../store/modules/schedules";
import AppOpenModalButton from "../components/AppOpenModalButton.vue";
import { useI18n } from "vue-i18n";

export default defineComponent({
    components: {
        Icon,
        ScheduleDisplay,
        WeekDisplay,
        Modal,
        AppTownSelector,
        ScheduleWeekSelector,
        Loader,
        ScheduleForm,
        AppOpenModalButton,
        LoadAndRetry: Retry,
        ViewContainer,
    },
    setup() {
        const isFetching = ref(true);
        const setIsFetching = (value = true) => {
            if (isFetching.value !== value) isFetching.value = value;
        };
        const route = useRoute();
        const store = useStore();
        const router = useRouter();
        const wilayaCode = computed(() => parseInt(route.params.wilayaId as string, 10));
        const townCode = computed(() => parseInt(route.params.townId as string, 10));

        const wilaya: ComputedRef<Wilaya> = computed(() =>
            store.getters.getWilayaByCode(wilayaCode.value)
        );
        const wilayaTowns: ComputedRef<Town[]> = computed(() =>
            store.getters.getSortedTownsByWilayaId(wilayaCode.value)
        );
        const currentTown: ComputedRef<Town> = computed(() => {
            // if (!wilayaTowns.value.length) return undefined;
            return wilayaTowns.value.find((town) => town.code === townCode.value)!;
        });

        const storeSchedule: ComputedRef<TownScheduleState | undefined> = computed(() => {
            return store.getters.getScheduleByTownCode(townCode.value);
        });

        const fetchWilayas = async () => {
            // search for the wilaya data first
            if (wilaya.value === undefined) {
                return await store.dispatch("fetchWilayas");
            }
        };

        const fetchTowns = async () => {
            // search for towns data
            if (wilayaTowns.value === undefined) {
                return await store.dispatch("fetchTowns", { wilayaId: wilayaCode.value });
            }
        };

        const fetchSchedule = async () => {
            if (storeSchedule.value === undefined) {
                return await store.dispatch("fetchSchedule", { townCode: townCode.value });
            }
        };
        // fetch the schedule of another town
        const fetchTargetSchedule = async (targetTownCode: number) => {
            await store.dispatch("fetchSchedule", { townCode: targetTownCode });
        };

        const failedFetching = ref(false);

        const fetchAll = async () => {
            failedFetching.value = false;
            setIsFetching(true);
            try {
                await Promise.all([fetchWilayas(), fetchTowns(), fetchSchedule()]);
                // await fetchWilayas()
                // await fetchTowns();
                // await fetchSchedule();
            } catch (error) {
                console.error("[Schedule.vue@fetchAll]", error);
                failedFetching.value = true;
                return error;
            } finally {
                setIsFetching(false);
            }
        };

        onMounted(async () => {
            if (Number.isNaN(wilayaCode) || Number.isNaN(townCode))
                router.push({ name: "not-found" });

            if (
                wilaya.value !== undefined &&
                wilayaTowns.value !== undefined &&
                storeSchedule.value !== undefined
            ) {
                setIsFetching(false);
                return;
            }
            try {
                await fetchAll();
            } catch (err) {
                console.error("[Schedule.vue@onMounted] error while fetching data", err);
            }
        });

        const startOfCurrentWeek = startOfWeek(new Date(), {
            locale: { code: "ar-dz" },
            weekStartsOn: 0,
        });
        const endOfCurrentWeek = endOfWeek(new Date(), {
            locale: { code: "ar-dz" },
            weekStartsOn: 0,
        });
        const startOfNextWeek = startOfWeek(addDays(endOfCurrentWeek, 1), {
            locale: { code: "ar-dz" },
            weekStartsOn: 0,
        });
        const endOfNextWeek = endOfWeek(startOfNextWeek, {
            locale: { code: "ar-dz" },
            weekStartsOn: 0,
        });

        const currentWeek = computed(() => {
            return {
                start: formatDate(startOfCurrentWeek),
                end: formatDate(endOfCurrentWeek),
            };
        });

        const nextWeek = computed(() => {
            return {
                start: formatDate(startOfNextWeek),
                end: formatDate(endOfNextWeek),
            };
        });

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

        // the shedule to display by default as the main content
        const isCurrentScheduleDisplayed = ref(true);
        const setIsCurrentScheduleDisplay = (value: boolean) => {
            if (isCurrentScheduleDisplayed.value !== value)
                isCurrentScheduleDisplayed.value = value;
        };

        const isFetchingNewSchedule = ref(false);

        watch(townCode, async (newTownCode) => {
            if (Number.isNaN(newTownCode)) return;
            const targetSchedule = store.getters.getScheduleByTownCode(townCode);
            if (targetSchedule === undefined) {
                isFetchingNewSchedule.value = true;
                await fetchTargetSchedule(newTownCode);
                isFetchingNewSchedule.value = false;
            }
        });

        const isArLocale: ComputedRef<boolean> = computed(() => store.getters.getIsArLang);
        const title = computed(() => {
            return {
                townName: isArLocale.value ? currentTown.value?.arName : currentTown.value?.name,
                wilayaName: isArLocale.value ? wilaya.value.arName : wilaya.value.name,
            };
        });
        const { t } = useI18n();
        return {
            isFetching,
            failedFetching,
            fetchAll,
            currentWeek,
            nextWeek,
            showModal,
            openModal,
            closeModal,
            // townCode,

            // isNextWeekSchedule,
            // setIsNextWeekSchedule,
            // wilaya,
            wilayaTowns,
            currentTown,
            title,
            //
            isCurrentScheduleDisplayed,
            setIsCurrentScheduleDisplay,
            isFetchingNewSchedule,
            // icons
            mdiPlusBoxMultiple,
            // localization
            t,
            isArLocale,
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

.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.1s ease-in-out;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
