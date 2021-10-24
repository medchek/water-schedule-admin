<template>
  <section class="flex-grow flex flex-col h-full justify-center" v-if="isFetching">
    <loader className="w-14 h-14 mx-auto border-t-blue-500" customColors />
  </section>
  <section class="flex-grow flex flex-col h-full" v-else>
    <div id="content-header" class="flex items-center justify-between px-5 h-16 min-h-16">
      <span class="text-bgray-700 text-lg md:text-xl 2xl:text-2xl font-semibold">Programme d'eau - {{ currentTown.name }} - {{ wilaya.name }}</span>
    </div>

    <section id="schedule-toolbar" class="flex flex-col md:flex-row items-center justify-between md:h-14 w-full px-5 space-y-2 md:space-y-0">
      <button
        id="add-schedule"
        class="w-full md:w-auto text-sm lg:text-base bg-blue-600 hover:bg-blue-500 text-white font-semibold px-2 h-10 rounded-md"
        @click="openModal"
      >
        <Icon :icon="mdiPlusBoxMultiple" class="w-6 h-6 mr-1" />
        Modifier le programme d'eau
      </button>
      <!-- TEST -->
      <!-- <button class="bg-red-500 text-white font-semibold px-2 rounded" @click="runTest">Run test</button> -->
      <!-- TEST -->
      <app-town-selector :towns="wilayaTowns" />
    </section>
    <!-- <section id="content-main" class="flex flex-col relative w-full h-full flex-grow overflow-y-auto py-4"> -->
    <section id="content-main" class="flex flex-col w-full h-full flex-grow overflow-y-auto py-4">
      <section class="flex flex-grow w-full overflow-x-hidden">
        <!-- <h2 class="text-gray-400 text-sm sm:text-base lg:text-lg">{{ label }}</h2> -->

        <div class="flex flex-col flex-grow w-full h-full">
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
          <transition name="slide-right" type="animation" mode="out-in">
            <schedule-display
              v-if="isCurrentScheduleDisplayed"
              id="current-week"
              class="flex flex-col flex-grow h-full w-full px-5"
              label="Programme de la semaine courante"
              :weekFrom="currentWeek.start"
              :weekTo="currentWeek.end"
              target="current"
            />
            <schedule-display
              v-else
              id="next-week"
              class="flex flex-col flex-grow h-full w-full px-5"
              label="Programme de la semaine prochaine"
              :weekFrom="nextWeek.start"
              :weekTo="nextWeek.end"
              target="next"
            />
          </transition>
        </div>
        <!-- <div v-for="n in 7" :key="n" class=""></div> -->
      </section>
    </section>

    <teleport to="#app-modal">
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
import ScheduleWeekSelector from "../components/schedule/ScheduleWeekSelector.vue";
import ScheduleForm from "../components/schedule/ScheduleForm.vue";
import { mdiPlusBoxMultiple, mdiPlus, mdiClose } from "@mdi/js";
//
import { computed, ComputedRef, defineAsyncComponent, defineComponent, onMounted, reactive, ref } from "vue";
import { startOfWeek, endOfWeek, addDays, getWeek } from "date-fns";

import { formatDate, randNumber } from "../lib/utils";
import { useRoute, useRouter } from "vue-router";
import { useStore } from "vuex";
import Loader from "../components/Loader.vue";
import { Town } from "../store/modules/towns";
import { Wilaya } from "../store/modules/wilayas";

// test
import { FormSchedule, scheduleFormData, Time } from "../lib/shared";
import { TownScheduleState } from "../store/modules/schedules";

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
    ScheduleEmptyWarning: defineAsyncComponent(() => import("../components/schedule/ScheduleEmptyWarning.vue")),
    ScheduleForm,
  },
  setup() {
    const isFetching = ref(true);
    const setIsFetching = (value = true) => {
      if (isFetching.value !== value) isFetching.value = value;
    };
    const route = useRoute();
    const store = useStore();
    const router = useRouter();
    const wilayaCode = parseInt(route.params.wilayaId as string);
    const townCode = parseInt(route.params.townId as string);

    const wilaya: ComputedRef<Wilaya> = computed(() => store.getters.getWilayaByCode(wilayaCode));
    const wilayaTowns: ComputedRef<Town[]> = computed(() => store.getters.getTownsByWilayaId(wilayaCode));
    const currentTown = computed(() => {
      return wilayaTowns.value.find((town) => town.code === townCode);
    });

    const storeSchedule: ComputedRef<TownScheduleState | undefined> = computed(() => {
      return store.getters.getScheduleByTownCode(townCode);
    });

    const currentSchedule = reactive<FormSchedule[]>(scheduleFormData());
    const nextSchedule = reactive<FormSchedule[]>(scheduleFormData());

    onMounted(async () => {
      if (Number.isNaN(wilayaCode) || Number.isNaN(townCode)) router.push({ name: "not-found" });

      if (wilaya.value !== undefined && wilayaTowns.value !== undefined) setIsFetching(false);
      // search for the wilaya data first
      if (wilaya.value === undefined) {
        await store.dispatch("fetchWilayas");
        // only remove the loader if the towns are available, otherwise keep it loading until the towns are fetched
        if (wilayaTowns.value !== undefined) setIsFetching(false);
      }
      // search for towns data
      if (wilayaTowns.value === undefined) {
        await store.dispatch("fetchTowns", { wilayaId: wilayaCode });
      }
      // search for schedule
      if (!storeSchedule.value) {
        await store.dispatch("fetchSchedule", { townCode });
        setIsFetching(false);
      }
      // TODO:
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

    console.warn("[Schedule.vue:214] Test runners are still present in the code, remove them when completing the tests");
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

    // the shedule to display by default as the main content
    const isCurrentScheduleDisplayed = ref(true);
    const setIsCurrentScheduleDisplay = (value: boolean) => {
      if (isCurrentScheduleDisplayed.value !== value) isCurrentScheduleDisplayed.value = value;
    };

    return {
      isFetching,
      currentSchedule,
      nextSchedule,
      currentWeek,
      nextWeek,
      showModal,
      openModal,
      closeModal,

      isNextWeekSchedule,
      setIsNextWeekSchedule,
      wilaya,
      wilayaTowns,
      currentTown,
      //
      isCurrentScheduleDisplayed,
      setIsCurrentScheduleDisplay,

      // icons
      mdiPlusBoxMultiple,
      mdiPlus,
      mdiClose,
      // ----
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

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.2s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>

