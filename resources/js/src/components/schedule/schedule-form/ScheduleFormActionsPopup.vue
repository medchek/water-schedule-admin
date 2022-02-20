<template>
    <div
        class="absolute text-sm w-72 sm:w-80 py-2 px-2 bg-white bottom-12 rounded-lg shadow-lg space-y-1 border border-slate-100 text-slate-700"
        ref="menuRef"
        id="schedule-actions"
    >
        <!-- Autofill -->

        <schedule-form-actions-display
            :actions="autofillActions"
            :label="t('schedule.actions.setWaterAvailableLabel') + ':'"
            id="autofill-menu-actions"
            v-if="currentNavigation === NavigationLocation.Autofill"
            @goBack="navigate(NavigationLocation.Init)"
            @onSelected="emitAutofill"
        />
        <!-- RESET -->
        <schedule-form-actions-display
            :actions="resetActions"
            :label="t('schedule.actions.resetScheduleLabel') + ':'"
            id="reset-menu-actions"
            v-else-if="currentNavigation === NavigationLocation.Reset"
            @goBack="navigate(NavigationLocation.Init)"
            @onSelected="emitReset"
        />

        <!-- NAVIGATION -->
        <nav class="space-y-1" id="actions-navigation" v-else>
            <div class="px-2 flex items-center h-10 border-b border-slate-300 arabic:direction-rtl">
                {{ t("schedule.actions.actions") }}
            </div>
            <button
                v-for="action in actionsNavigation"
                class="px-2 justify-between text-left h-10 w-full hover:bg-slate-200 font-medium rounded transition-all arabic:direction-rtl"
                :key="action.id"
                @click="navigate(action.goTo)"
            >
                <span>{{ action.text }}</span>
                <Icon :icon="mdiChevronRight" className="w-6 h-6 arabic:rotate-180" />
            </button>
        </nav>
    </div>
</template>

<script lang="ts">
import { defineComponent, onMounted, onUnmounted, ref } from "vue";
import Icon from "../../Icon.vue";
import { mdiChevronRight } from "@mdi/js";
import ScheduleFormActionsDisplay from "./ScheduleFormActionsDisplay.vue";
import { useI18n } from "vue-i18n";

type TargetSchedule = "current" | "next" | "both";

interface Action {
    id: number;
    text: string;
    targetSchedule: TargetSchedule;
}

interface NavigationItem {
    id: number;
    text: string;
    goTo: NavigationLocation;
}

enum NavigationLocation {
    Init,
    Autofill,
    Reset,
}

export default defineComponent({
    emits: ["closeMenu", "autoFill", "reset"],
    setup(_, { emit }) {
        const { t } = useI18n();

        const menuRef = ref<HTMLDivElement | null>(null);
        const currentNavigation = ref<NavigationLocation>(NavigationLocation.Init);

        const navigate = (goTo: NavigationLocation) => {
            currentNavigation.value = goTo;
        };

        const autofillActions: Action[] = [
            { id: 1, text: t("schedule.actions.allCurrentWeek"), targetSchedule: "current" },
            { id: 2, text: t("schedule.actions.allNextWeek"), targetSchedule: "next" },
            { id: 3, text: t("schedule.actions.bothWeeks"), targetSchedule: "both" },
        ];
        const resetActions: Action[] = [
            { id: 1, text: t("schedule.currentWeek"), targetSchedule: "current" },
            { id: 2, text: t("schedule.nextWeek"), targetSchedule: "next" },
            { id: 3, text: t("schedule.actions.bothSchedules"), targetSchedule: "both" },
        ];

        const actionsNavigation: NavigationItem[] = [
            {
                id: 1,
                text: t("schedule.actions.setWaterActionName"),
                goTo: NavigationLocation.Autofill,
            },
            {
                id: 2,
                text: t("schedule.actions.resetWaterActionName"),
                goTo: NavigationLocation.Reset,
            },
        ];

        const handleClickOutside = (e: MouseEvent) => {
            if (menuRef.value) {
                const target = e.target as Node;
                if (!menuRef.value.contains(target)) {
                    emit("closeMenu");
                }
            }
        };
        onMounted(() => {
            document.body.addEventListener("mousedown", handleClickOutside);
        });
        onUnmounted(() => {
            document.body.removeEventListener("mousedown", handleClickOutside);
        });

        const emitAutofill = (targetSchedule: TargetSchedule) => emit("autoFill", targetSchedule);
        const emitReset = (targetSchedule: TargetSchedule) => emit("reset", targetSchedule);
        return {
            menuRef,
            resetActions,
            autofillActions,
            actionsNavigation,
            currentNavigation,
            navigate,
            emitAutofill,
            emitReset,
            mdiChevronRight,
            NavigationLocation,

            // localization
            t,
        };
    },
    components: { Icon, ScheduleFormActionsDisplay },
});
</script>
