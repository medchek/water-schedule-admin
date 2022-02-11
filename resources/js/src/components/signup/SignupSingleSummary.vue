<template>
  <div class="relative flex items-center justify-between h-14 w-full">
    <p class="text-bgray-500 font-medium text-xs md:text-sm 2xl:text-base min-w-24">{{ label }}</p>
    <input
      :type="isPassword && !revealPassword ? 'password' : 'text'"
      class="h-full w-40 pl-4 2xl:w-96 text-sm md:text-base 2xl:text-lg text-blue-500 font-semibold border-none outline-none bg-white"
      :value="value"
      readonly
    />
    <button @click="togglePasswordVisibility" v-if="isPassword" class="absolute right-0 text-bgray-400 hover:text-bgray-500 h-full">
      <icon :icon="!revealPassword ? mdiEyeOutline : mdiEyeOffOutline" />
    </button>
  </div>
</template>

<script lang="ts">
import { defineAsyncComponent, defineComponent, ref } from "vue";
import { mdiEyeOutline, mdiEyeOffOutline } from "@mdi/js";

export default defineComponent({
  components: { Icon: defineAsyncComponent(() => import("../Icon.vue")) },
  props: {
    label: {
      required: true,
      type: String,
    },
    value: {
      required: true,
      type: String,
    },
    isPassword: Boolean,
  },
  setup() {
    const revealPassword = ref(false);
    const togglePasswordVisibility = () => (revealPassword.value = !revealPassword.value);
    return { revealPassword, togglePasswordVisibility, mdiEyeOutline, mdiEyeOffOutline };
  },
});
</script>