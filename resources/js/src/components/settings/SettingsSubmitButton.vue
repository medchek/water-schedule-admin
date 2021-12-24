<template>
  <button
    type="submit"
    class="
      w-full
      md:w-32
      px-5
      h-10
      bg-blue-500
      hover:bg-blue-400
      focus:bg-blue-600
      font-semibold
      text-white
      rounded
      transition-colors
      disabled:bg-gray-200 disabled:text-bgray-500 disabled:cursor-not-allowed
    "
    :title="title"
    :disabled="disabled || isLoading"
  >
    <loader className="w-7 h-7" v-if="isLoading" />
    <span v-else
      ><slot>{{ t("general.confirm") }}</slot></span
    >
  </button>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import { useI18n } from "vue-i18n";
import Loader from "../Loader.vue";

export default defineComponent({
  components: { Loader },
  props: {
    // all optional props
    title: {
      type: String,
      required: false,
    },
    disabled: {
      type: Boolean,
      default: false,
    },
    isLoading: {
      type: Boolean,
      default: false,
    },
  },
  setup() {
    const { t } = useI18n();
    return { t };
  },
});
</script>