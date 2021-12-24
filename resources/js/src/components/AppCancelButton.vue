<template>
  <button
    class="
      h-9
      sm:h-10
      w-24
      sm:w-28
      text-sm
      sm:text-base
      bg-gray-200
      hover:bg-gray-100
      dark:bg-dark-cancel dark:hover:bg-dark-cancel/80
      text-gray-400
      rounded
      font-semibold
    "
    @click="$emit('click')"
  >
    {{ t("general.cancel") }}
  </button>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import { useI18n } from "vue-i18n";

export default defineComponent({
  emits: ["click"],
  setup() {
    const { t } = useI18n();
    return { t };
  },
});
</script>