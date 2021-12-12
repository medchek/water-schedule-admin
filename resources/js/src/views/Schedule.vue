<template>
  <section class="grow flex flex-col h-full justify-center" v-if="isFetching" id="complete-data-fetching">
    <loader className="w-14 h-14 mx-auto border-t-blue-500" customColors />
  </section>
  <section class="grow flex flex-col h-full overflow-hidden" v-else>
    <div id="content-header" class="flex items-center justify-between px-5 h-16 min-h-16">
      <span class="text-bgray-700 dark:text-white text-lg md:text-xl 2xl:text-2xl font-semibold"
        >Programme d'eau - <span class="capitalize">{{ currentTown.name }}</span> - {{ wilaya.name }}</span
      >
    </div>

    <section id="schedule-toolbar" class="flex flex-col md:flex-row items-center justify-between md:h-14 w-full px-5 space-y-2 md:space-y-0">
      <!-- <button
        id="add-schedule"
        class="w-full md:w-auto text-sm lg:text-base bg-blue-600 hover:bg-blue-500 text-white font-semibold px-2 h-10 rounded-md"
        @click="openModal"
      >
        <Icon :icon="mdiPlusBoxMultiple" class="w-6 h-6 mr-1" />
        Modifier le programme d'eau
      </button> -->
      <app-open-modal-button class="w-full md:w-auto" id="add-schedule" @click="openModal" :icon="mdiPlusBoxMultiple">
        Modifier le programme d'eau</app-open-modal-button
      >
      <!-- TEST -->
      <!-- <button class="bg-red-500 text-white font-semibold px-2 rounded" @click="runTest">Run test</button> -->
      <!-- TEST -->
      <app-town-selector :towns="wilayaTowns" />
    </section>
    <!-- <section id="content-main" class="flex flex-col relative w-full h-full grow overflow-y-auto py-4"> -->
    <section id="content-main" class="flex flex-col w-full h-full grow overflow-y-auto py-4">
      <section class="flex grow w-full overflow-x-hidden">
        <!-- <h2 class="text-gray-400 text-sm sm:text-base lg:text-lg">{{ label }}</h2> -->

        <div class="flex flex-col grow w-full h-full">
          <div class="flex w-full px-5 space-x-5 mb-2">
            <schedule-week-selector
              label="Programme de la semaine courante"
              :weekFrom="currentWeek.start"
              :weekTo="currentWeek.end"
              :isSelected="isCurrentScheduleDisplayed"
              @click="setIsCurrentScheduleDisplay(true)"
            />
            <schedule-week-selector
              label="Programme de la semaine prochaine"
              :weekFrom="nextWeek.start"
              :weekTo="nextWeek.end"
              :isSelected="!isCurrentScheduleDisplayed"
              @click="setIsCurrentScheduleDisplay(false)"
            />
          </div>
          <div class="flex justify-center items-center grow w-full h-full" id="schedule-fetching" v-if="isFetchingNewSchedule">
            <loader className="w-10 h-10 border-t-blue-500" customColors />
          </div>
          <transition name="slide-right" type="animation" mode="out-in" v-else>
            <schedule-display
              v-if="isCurrentScheduleDisplayed"
              id="current-week"
              class="flex flex-col grow h-full w-full px-5"
              label="Programme de la semaine courante"
              :weekFrom="currentWeek.start"
              :weekTo="currentWeek.end"
              :townName="currentTown.name"
              target="current"
            />
            <schedule-display
              v-else
              id="next-week"
              class="flex flex-col grow h-full w-full px-5"
              label="Programme de la semaine prochaine"
              :weekFrom="nextWeek.start"
              :weekTo="nextWeek.end"
              :townName="currentTown.name"
              target="next"
            />
          </transition>
        </div>
        <!-- <div v-for="n in 7" :key="n" class=""></div> -->
      </section>
    </section>

    <teleport to="#app-modal" class="dark">
      <transition name="fade">
        <schedule-form v-if="showModal" :showModal="showModal" @formClickedOutside="closeModal" @formSaved="closeModal" />
      </transition>
    </teleport>
  </section>
</template>
<script lang="ts">
// components
import Icon from "../components/Icon.vue";
import ScheduleDisplay from "../components/schedule/ScheduleDisplay.vue";
import WeekDisplay from "../components/schedule/WeekDisplay.vue";
import Modal from "../components/Modal.vue";
import AppTimePicker from "../components/AppTimePicker.vue";
import AppTownSelector from "../components/AppTownSelector.vue";
import ScheduleWeekSelector from "../components/schedule/ScheduleDisplayWeekSelector.vue";
import ScheduleForm from "../components/schedule/schedule-form/ScheduleForm.vue";
import { mdiPlusBoxMultiple } from "@mdi/js";
//
import { computed, ComputedRef, defineAsyncComponent, defineComponent, onBeforeUnmount, onMounted, reactive, ref, watch } from "vue";
import { startOfWeek, endOfWeek, addDays, getWeek } from "date-fns";

import { formatDate } from "../lib/utils";
import { useRoute, useRouter } from "vue-router";
import { useStore } from "vuex";
import Loader from "../components/Loader.vue";
import { Town } from "../store/modules/towns";
import { Wilaya } from "../store/modules/wilayas";

import { TownScheduleState } from "../store/modules/schedules";
import AppOpenModalButton from "../components/AppOpenModalButton.vue";

export default defineComponent({
  components: {
    Icon,
    ScheduleDisplay,
    WeekDisplay,
    Modal,
    AppTimePicker,
    AppTownSelector,
    ScheduleWeekSelector,
    Loader,
    // ScheduleEmptyWarning: defineAsyncComponent({ loader: () => import("../components/schedule/ScheduleEmptyWarning.vue"), loadingComponent: Loader }),
    ScheduleForm,
    AppOpenModalButton,
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

    const wilaya: ComputedRef<Wilaya> = computed(() => store.getters.getWilayaByCode(wilayaCode.value));
    const wilayaTowns: ComputedRef<Town[]> = computed(() => store.getters.getSortedTownsByWilayaId(wilayaCode.value));
    const currentTown: ComputedRef<Town | undefined> = computed(() => {
      if (!wilayaTowns.value) return undefined;
      return wilayaTowns.value.find((town) => town.code === townCode.value);
    });

    const storeSchedule: ComputedRef<TownScheduleState | undefined> = computed(() => {
      return store.getters.getScheduleByTownCode(townCode.value);
    });

    const fetchWilayas = async () => {
      // search for the wilaya data first
      if (wilaya.value === undefined) {
        await store.dispatch("fetchWilayas");
      }
    };

    const fetchTowns = async () => {
      // search for towns data
      if (wilayaTowns.value === undefined) {
        await store.dispatch("fetchTowns", { wilayaId: wilayaCode.value });
      }
    };

    const fetchSchedule = async () => {
      if (storeSchedule.value === undefined) {
        await store.dispatch("fetchSchedule", { townCode: townCode.value });
      }
    };
    // fetch the schedule of another town
    const fetchTargetSchedule = async (targetTownCode: number) => {
      await store.dispatch("fetchSchedule", { townCode: targetTownCode });
    };

    onMounted(async () => {
      if (Number.isNaN(wilayaCode) || Number.isNaN(townCode)) router.push({ name: "not-found" });

      if (wilaya.value !== undefined && wilayaTowns.value !== undefined && storeSchedule.value !== undefined) {
        setIsFetching(false);
        return;
      }
      try {
        await fetchWilayas();
        // only remove the loader if the towns are available, otherwise keep it loading until the towns are fetched
        if (wilayaTowns.value !== undefined && storeSchedule.value !== undefined) setIsFetching(false);
        // search for towns data
        await fetchTowns();
        // search for schedule
        await fetchSchedule();
        setIsFetching(false);
      } catch (err) {
        console.error("[Schedule.vue@onMounted] error while fetching data", err);
      }
      // TODO: DONE
      // the form needs to be populated with the schedule vuex data if there they are retrived from the server
      // therefore, both
    });

    const startOfCurrentWeek = startOfWeek(new Date(), { locale: { code: "ar-dz" }, weekStartsOn: 0 });
    const endOfCurrentWeek = endOfWeek(new Date(), { locale: { code: "ar-dz" }, weekStartsOn: 0 });
    const startOfNextWeek = startOfWeek(addDays(endOfCurrentWeek, 1), { locale: { code: "ar-dz" }, weekStartsOn: 0 });
    const endOfNextWeek = endOfWeek(startOfNextWeek, { locale: { code: "ar-dz" }, weekStartsOn: 0 });

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
      if (isCurrentScheduleDisplayed.value !== value) isCurrentScheduleDisplayed.value = value;
    };

    const isFetchingNewSchedule = ref(false);
    // const handleTownSelected = async (townCode: number) => {
    //   const targetSchedule = store.getters.getScheduleByTownCode(townCode);
    //   if (targetSchedule === undefined) {
    //     isFetchingNewSchedule.value = true;
    //     await fetchTargetSchedule(townCode);
    //     isFetchingNewSchedule.value = false;
    //   }
    // };

    watch(townCode, async (newTownCode) => {
      if (Number.isNaN(newTownCode)) return;
      const targetSchedule = store.getters.getScheduleByTownCode(townCode);
      if (targetSchedule === undefined) {
        isFetchingNewSchedule.value = true;
        await fetchTargetSchedule(newTownCode);
        isFetchingNewSchedule.value = false;
      }
    });

    return {
      isFetching,
      currentWeek,
      nextWeek,
      showModal,
      openModal,
      closeModal,
      townCode,

      isNextWeekSchedule,
      setIsNextWeekSchedule,
      wilaya,
      wilayaTowns,
      currentTown,
      //
      isCurrentScheduleDisplayed,
      setIsCurrentScheduleDisplay,
      // handleTownSelected,

      isFetchingNewSchedule,
      // icons
      mdiPlusBoxMultiple,
      // ----
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

