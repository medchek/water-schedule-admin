<template>
  <transition name="fade">
    <div
      v-if="showProgress"
      class="absolute top-0 left-0 h-[0.2rem] z-100 transition-all duration-700"
      :class="[success && 'shadow-md shadow-blue-500/80 bg-blue-500 dark:bg-blue-200', 'bg-blue-500']"
      :style="{ width: progressPercentage }"
    ></div>
  </transition>
</template>

<script lang="ts">
import { computed, defineComponent, onMounted, ref, watch } from "vue";
import { useStore } from "vuex";

export default defineComponent({
  setup() {
    const store = useStore();
    const progress = computed(() => store.getters.getRouteProgress);
    const progressPercentage = computed(() => `${progress.value}%`);
    const showProgress = computed(() => store.getters.getShowRouteProgress);
    // when progress is 100%, this should be true
    const success = ref<boolean>(false);
    watch(progress, (newVal) => {
      if (newVal >= 100) {
        success.value = true;
      }
    });
    return { progressPercentage, showProgress, success };
  },
});
</script>