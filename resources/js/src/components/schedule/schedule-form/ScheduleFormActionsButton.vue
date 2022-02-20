<template>
    <div class="relative">
        <Transition>
            <schedule-form-actions-popup
                v-if="isOpen"
                @autoFill="emitAutofillToParent"
                @reset="emitResetToParent"
                @closeMenu="closeMenu"
            />
        </Transition>
        <button
            class="group h-9 sm:h-10 w-10 sm:w-24 bg-slate-100 dark:bg-slate-500/20 hover:bg-slate-200/75 dark:hover:bg-slate-500/30 rounded font-medium dark:text-slate-50 text-slate-600 space-x-1 text-sm sm:text-base transition-colors arabic:direction-rtl arabic:space-x-0"
            :class="isOpen && 'pointer-events-none'"
            :title="t('schedule.actions.title')"
            @click="openMenu"
        >
            <Icon
                :icon="mdiCogOutline"
                className="w-5 h-5  transition-transform "
                :class="isOpen && 'rotate-45'"
            />
            <span class="hidden sm:inline arabic:ml-1">{{ t("schedule.actions.actions") }}</span>
        </button>
    </div>
</template>

<script lang="ts">
import { defineAsyncComponent, defineComponent, ref } from "vue";
import { mdiCogOutline } from "@mdi/js";
import Icon from "../../Icon.vue";
import { useI18n } from "vue-i18n";

export default defineComponent({
    emits: ["autoFill", "reset"],
    setup(_, { emit }) {
        const isOpen = ref<boolean>(false);
        const { t } = useI18n();

        const openMenu = () => (isOpen.value = true);
        const closeMenu = () => (isOpen.value = false);

        const emitAutofillToParent = (targetSchedule: "current" | "next" | "both") => {
            emit("autoFill", targetSchedule);
            closeMenu();
        };
        const emitResetToParent = (targetSchedule: "current" | "next" | "both") => {
            emit("reset", targetSchedule);
            closeMenu();
        };

        return {
            mdiCogOutline,
            isOpen,
            openMenu,
            closeMenu,
            emitAutofillToParent,
            emitResetToParent,
            // localization
            t,
        };
    },
    components: {
        Icon,
        ScheduleFormActionsPopup: defineAsyncComponent(
            () => import("./ScheduleFormActionsPopup.vue")
        ),
    },
});
</script>

<style>
.v-enter-active,
.v-leave-active {
    transition: transform 0.2s;
    transform-origin: 0% 100%;
    transform: scale(1);
}

.v-enter-from,
.v-leave-to {
    transform: scale(0);
}
</style>
