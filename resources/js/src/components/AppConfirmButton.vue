<template>
  <button
    type="submit"
    class="h-9 sm:h-10 w-24 sm:w-28 text-sm sm:text-base text-white rounded font-semibold disabled:bg-bgray-400 transition-colors disabled:cursor-not-allowed"
    :class="[disabled && 'cursor-not-allowed', isDelete ? 'bg-red-500 hover:bg-red-400 focus:bg-red-600' : 'bg-blue-500 hover:bg-blue-400 focus:bg-blue-600']"
    :disabled="isLoading || disabled"
  >
    <loader v-if="isLoading" dark className="w-6 h-6" />
    <span v-else>{{ t("general.confirm") }}</span>
  </button>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import { useI18n } from "vue-i18n";
import Loader from "./Loader.vue";

export default defineComponent({
  components: { Loader },
  props: {
    isLoading: {
      type: Boolean,
      required: false,
      default: false,
    },
    disabled: {
      type: Boolean,
      required: false,
      default: false,
    },
    isDelete: {
      type: Boolean,
      required: false,
      default: false,
    },
  },
  setup() {
    const { t } = useI18n();
    return { t };
  },
});
</script>