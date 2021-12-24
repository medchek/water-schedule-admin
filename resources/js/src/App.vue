<template>
  <div id="global-scaffold" class="w-full h-full" :class="[isDarkMode && 'dark', isArLocale && 'arabic']">
    <app-route-progress />
    <router-view
      class="w-full h-screen max-h-screen flex flex-col dark:bg-gradient-to-b dark:from-dark-bg dark:to-dark-bg bg-gradient-to-br from-gray-50 to-bgray-100"
    >
    </router-view>
    <div id="modal" class="absolute overflow-hidden"></div>
    <Snack />
  </div>
</template>

<script lang="ts">
import { computed, ComputedRef, defineComponent } from "vue";
import { useStore } from "vuex";
import AppRouteProgress from "./components/AppRouteProgress.vue";
import Snack from "./components/Snack.vue";

export default defineComponent({
  setup() {
    const store = useStore();
    const isDarkMode: ComputedRef<boolean> = computed(() => store.getters.getIsDarkMode);
    const isArLocale: ComputedRef<boolean> = computed(() => store.getters.getIsArLang);

    return { isDarkMode, isArLocale };
  },
  components: {
    Snack,
    AppRouteProgress,
  },
});
</script>

<style>
body {
  height: 100%;
  width: 100%;
}
#app {
  width: 100%;
  height: 100%;
  min-height: 100vh;
  max-height: 100vh;
}
input:focus {
  outline: none;
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