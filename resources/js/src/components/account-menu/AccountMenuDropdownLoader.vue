<template>
    <div
        id="account-menu-dropdown-loader"
        ref="menuRef"
        class="flex flex-col rounded shadow-lg absolute right-0 arabic:left-0 w-60 h-auto bg-white mt-2 z-[5] p-4"
    >
        <flexible-loader className="w-6 h-6" thin />
    </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import FlexibleLoader from "../FlexibleLoader.vue";

export default defineComponent({
    components: { FlexibleLoader },
});
</script>
