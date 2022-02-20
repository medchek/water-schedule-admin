<template>
    <!-- RESET -->
    <section class="space-y-1">
        <div
            class="pr-2 flex items-center h-10 border-b border-slate-300 space-x-1 arabic:direction-rtl"
        >
            <button
                class="hover:bg-slate-200 h-8 w-8 rounded transition-colors arabic:rotate-180 arabic:ml-1"
                @click="$emit('goBack')"
                :title="t('general.back')"
            >
                <Icon :icon="mdiChevronRight" className="rotate-180 w-7 h-7" />
            </button>
            <span>{{ label }}</span>
        </div>
        <button
            v-for="action in actions"
            class="px-2 justify-start h-10 w-full hover:bg-slate-200 font-medium transition-colors arabic:direction-rtl"
            @click="$emit('onSelected', action.targetSchedule)"
            :key="action.id"
        >
            {{ action.text }}
        </button>
    </section>
</template>

<script lang="ts">
import { defineComponent, PropType } from "vue";
import Icon from "../../Icon.vue";
import { mdiChevronRight } from "@mdi/js";
import { useI18n } from "vue-i18n";

interface Action {
    id: number;
    text: string;

    targetSchedule: "current" | "next" | "both";
}

export default defineComponent({
    emits: ["goBack", "onSelected"],
    props: {
        actions: {
            type: Object as PropType<Action[]>,
            required: true,
        },
        label: {
            type: String,
            required: true,
        },
        title: String,
    },
    setup() {
        const { t } = useI18n();
        return { mdiChevronRight, t };
    },
    components: { Icon },
});
</script>
