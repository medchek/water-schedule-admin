<template>
  <section id="schedule-empty-warning" class="flex flex-col justify-center items-center w-full h-full text-center font-semibold px-4">
    <p class="text-bgray-800 dark:text-bgray-200">{{ targetScheduleMessage }}.</p>
    <p class="mt-1 font-normal dark:text-bgray-400">Veillez confirmer que c'est bien votre choix</p>
    <div class="flex w-full space-x-2 justify-center mt-2">
      <button
        class="bg-blue-500 hover:bg-blue-400 focus:bg-blue-600 w-28 px-3 py-2 rounded font-semibold text-white"
        @click="$emit('confirm')"
        :disabled="isLoading"
      >
        <loader v-if="isLoading" dark thin className="w-6 h-6" />
        <span v-else>confirmer</span>
      </button>
      <button
        class="bg-gray-200 hover:bg-gray-300 w-28 px-3 py-2 rounded font-semibold text-bgray-600 dark:bg-dark-cancel dark:text-bgray-400"
        @click="$emit('cancel')"
      >
        retour
      </button>
    </div>
  </section>
</template>

<script lang="ts">
import { computed, defineAsyncComponent, defineComponent, PropType } from "vue";
export default defineComponent({
  components: {
    Loader: defineAsyncComponent(() => import("../../Loader.vue")),
  },
  props: {
    isLoading: {
      type: Boolean,
      default: false,
    },
    target: {
      type: String as PropType<"current" | "next" | "both">,
      default: "current",
      required: true,
    },
  },
  setup(props) {
    const targetScheduleMessage = computed(() => {
      return props.target === "current"
        ? "Le programme d'eau de cette semaine a été laissé  enitèrement vide, cela signifie que le programme v'a affiché une coupure total durant toute la semaine"
        : props.target === "next"
        ? "Le programme d'eau de la semaine prochaine a été laissé enitèrement vide, cela signifie que le programme v'a affiché une coupure total durant toute la semaine prochaine"
        : props.target === "both"
        ? "Les programmes d'eau des deux semaines ont été laissés enitèrement vide, cela signifie que les programmes vont affichés une coupure total durant cette semaine et celle d'après"
        : "Un des programmes d'eau a été laissé  enitèrement vide, cela signifie que le programme v'a afficher une coupure total durant toute la semaine";
    });

    return {
      targetScheduleMessage,
    };
  },
});
</script>
