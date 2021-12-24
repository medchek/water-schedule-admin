<template>
  <button
    class="
      w-14
      h-14
      md:w-20 md:h-20
      lg:h-14 lg:w-full
      font-semibold
      rounded-md
      lg:justify-start
      px-2
      2xl:px-10
      text-sm
      2xl:text-base
      shadow-lg
      dark:shadow-none dark:shadow-blue-500/20
      lg:shadow-none
      arabic:direction-rtl
    "
    :class="[
      isSelected
        ? 'text-blue-500 dark:text-blue-light shadow-xl bg-white'
        : 'text-bgray-500 hover:text-bgray-700 bg-bgray-100 dark:bg-dark-card dark:hover:text-bgray-300',
    ]"
  >
    <!-- text-white bg-gradient-to-br from-blue-500 to-blue-400  -->
    <span class="lg:w-10">
      <icon :icon="icon" className="w-6 h-6" />
    </span>
    <span class="hidden lg:inline"><slot></slot></span>
  </button>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import Icon from "../Icon.vue";

export default defineComponent({
  components: { Icon },
  props: {
    isSelected: {
      type: Boolean,
      default: false,
    },
    icon: {
      type: String,
      required: true,
    },
  },
  setup() {},
});
</script>
