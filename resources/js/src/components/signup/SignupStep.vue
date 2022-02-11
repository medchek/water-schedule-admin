<template>
  <div class="flex flex-col items-center w-24">
    <div
      class="flex items-center justify-center w-12 h-12 min-h-12 max-h-12 2xl:w-14 2xl:h-14 2xl:min-h-14 2xl:max-h-14 rounded-full mb-2 transition-all"
      :class="[isPending ? 'bg-white border-2 2xl:border-4 border-bgray-300 text-bgray-300' : 'bg-blue-500 text-white']"
    >
      <div
        class="flex items-center justify-center w-11 h-11 2xl:w-12 2xl:h-12 bg-transparent rounded-full"
        :class="[isOngoing && 'border-2 2xl:border-4 border-white']"
      >
        <icon :icon="isCompleted ? mdiCheck : icon" className="w- h-8" />
      </div>
    </div>
    <p class="font-semibold mb-1 text-sm 2xl:text-base" :class="[isPending ? 'text-bgray-400/70' : 'text-blue-500']">{{ label }}</p>
    <span
      class="flex justify-center items-center font-medium text-xs 2xl:text-sm px-1 w-18 2xl:w-20 rounded"
      :class="[
        isCompleted && 'bg-blue-100 text-blue-500',
        (isOngoing || isPending) && 'bg-bgray-100',
        isOngoing && 'text-blue-400',
        isPending && 'text-bgray-400/70',
      ]"
      >{{ statusText }}</span
    >
  </div>
</template>

<script lang="ts">
import { computed, defineComponent, PropType } from "vue";
import Icon from "../Icon.vue";
import { StepStatus } from "../../types/enums";

import { mdiCheck } from "@mdi/js";

export default defineComponent({
  components: { Icon },
  props: {
    icon: {
      type: String,
      required: true,
    },
    label: {
      type: String,
      required: true,
    },
    status: {
      type: Number as PropType<StepStatus>,
      required: true,
    },
  },
  setup(props) {
    const statusText = computed(() => {
      switch (props.status) {
        case StepStatus.COMPLETED:
          return "compétée";
        case StepStatus.ONGOING:
          return "en cours";
        case StepStatus.PENDING:
          return "en attente";
        default:
          return "en cours";
      }
    });

    const isCompleted = computed(() => props.status === StepStatus.COMPLETED);
    const isOngoing = computed(() => props.status === StepStatus.ONGOING);
    const isPending = computed(() => props.status === StepStatus.PENDING);

    return { isCompleted, isOngoing, isPending, statusText, mdiCheck };
  },
});
</script>