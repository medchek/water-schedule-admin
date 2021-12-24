<template>
  <div id="account-menu" class="relative">
    <button
      id="open-account-menu-button"
      class="w-10 h-10 rounded-full bg-gray-200 active:bg-gray-100 text-bgray-500 hover:border-2 border-blue-300"
      :class="[!forceLight && 'dark:bg-dark-alt dark:text-bgray-200']"
      @mousedown.prevent.capture="toggleMenu"
    >
      <icon :icon="mdiAccountOutline" className="w-7 h-7 pointer-events-none" />
    </button>
    <account-menu-dropdown v-if="isOpen" @clickedOutside="closeMenu" @close="closeMenu" />
  </div>
</template>

<script lang="ts">
import { defineAsyncComponent, defineComponent, ref } from "vue";
import { mdiAccountOutline } from "@mdi/js";
import Icon from "../Icon.vue";

export default defineComponent({
  props: {
    forceLight: {
      type: Boolean,
      default: false,
    },
  },
  components: { Icon, AccountMenuDropdown: defineAsyncComponent({ loader: () => import("./AccountMenuDropdown.vue") }) },
  setup() {
    const isOpen = ref(false);
    const toggleMenu = () => (isOpen.value = !isOpen.value);
    const closeMenu = () => (isOpen.value = false);
    const accountMenuRef = ref<HTMLElement | null>(null);

    return { isOpen, toggleMenu, closeMenu, accountMenuRef, mdiAccountOutline };
  },
});
</script>