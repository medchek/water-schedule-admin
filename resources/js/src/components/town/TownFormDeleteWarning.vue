<template>
  <section class="grow h-full w-full px-5 py-5 space-y-4 text-center font-medium text-gray-700 dark:text-bgray-400 dark:border-bgray-700 arabic:direction-rlt">
    <p>
      {{ t("town.delete.aboutToDelete") }} <span class="font-bold">{{ townName }}</span> {{ t("town.delete.fromWilaya") }}
      <span class="font-semibold">{{ prefixedWilayaName }}</span
      >. {{ t("town.delete.thisDeletesRelatedSchedule") }}.
    </p>
    <p class="text-red-500 font-semibold">{{ t("town.delete.irreversibleAction") }}.</p>
  </section>
</template>

<script lang="ts">
import { computed, defineComponent } from "vue";
import { useI18n } from "vue-i18n";
import { addPreposition } from "../../lib/shared";

export default defineComponent({
  props: {
    townName: {
      type: String,
      required: true,
    },
    wilayaName: {
      type: String,
      required: true,
    },
  },
  setup(props) {
    const { t } = useI18n();
    const prefixedWilayaName = computed(() => addPreposition(props.wilayaName));
    return {
      prefixedWilayaName,
      // localization
      t,
    };
  },
});
</script>
