<template>
    <button
        class="relative flex items-center justify-start max-h-10 h-10 w-full rounded hover:bg-bgray-100 text-bgray-600 space-x-2 arabic:space-x-reverse font-medium pl-1"
    >
        <icon v-if="icon" :icon="icon" className="w-6 h-6" />
        <span>{{ text }}</span>
        <loader v-if="isLoading" thin className="absolute right-1 w-6 h-6" />
        <icon
            v-if="!isLoading && selected"
            :icon="mdiCheck"
            className="absolute right-1 arabic:left-1 arabic:right-auto w-6 h-6"
        />
    </button>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import Icon from "../Icon.vue";
import { mdiCheck } from "@mdi/js";
import Loader from "../Loader.vue";

export default defineComponent({
    components: { Icon, Loader },
    props: {
        icon: {
            type: String,
        },
        isLoading: {
            type: Boolean,
            required: false,
            default: false,
        },
        text: {
            type: String,
            required: true,
        },
        selected: {
            type: Boolean,
            required: false,
            default: false,
        },
    },
    setup() {
        return { mdiCheck };
    },
});
</script>
