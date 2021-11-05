<template>
  <section class="flex-grow h-full w-full px-5 py-5 space-y-4 text-center font-medium text-gray-700">
    <p>
      Vous êtes sur le point de supprimer la commune <span class="font-bold">{{ townName }}</span> de la wilaya
      <span class="font-semibold">{{ prefixedWilayaName }}</span
      >. Cela supprimera aussi tous les programmes d'eau lié à cette commune.
    </p>
    <p class="text-red-500 font-semibold">Cette action est irréversible.</p>
  </section>
</template>

<script lang="ts">
import { computed, defineComponent } from "vue";
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
    const prefixedWilayaName = computed(() => addPreposition(props.wilayaName));
    return {
      prefixedWilayaName,
    };
  },
});
</script>
