<template>
  <select
    name="wilaya-selector"
    id="wilaya-select"
    class="capitalize rounded-md h-10 w-full md:w-52 px-2 font-semibold bg-white text-bgray-700 focus:outline-none focus:ring-blue-300 focus:ring-2"
    title="Selectionner une autre commune"
    v-model="selectedTownCode"
    @change="handleSelectChange"
  >
    <!-- <option value="16">Alger</option> -->
    <option v-for="town in towns" :key="town.id" :value="town.code">{{ town.name }}</option>
  </select>
</template>

<script lang="ts">
import { defineComponent, PropType, ref, watch } from "@vue/runtime-core";
import { computed } from "vue";
import { useRoute, useRouter } from "vue-router";
import { Town } from "../store/modules/towns";
export default defineComponent({
  props: {
    towns: {
      type: Object as PropType<Town[]>,
      required: true,
    },
  },
  emits: ["townSelected"],
  setup(_, { emit }) {
    const route = useRoute();
    const router = useRouter();

    const routetWilayaCode = computed(() => parseInt(route.params.wilayaId as string));
    const routeTownCode = computed(() => parseInt(route.params.townId as string));
    const selectedTownCode = ref(routeTownCode.value);
    const handleSelectChange = () => {
      router.push({
        name: "schedule",
        params: {
          wilayaId: routetWilayaCode.value,
          townId: selectedTownCode.value,
        },
      });

      emit("townSelected", selectedTownCode.value);
    };

    // watch(selectedTownCode, () => {
    //   emit("townSelected", selectedTownCode.value);
    // });

    watch(routeTownCode, (newVal) => {
      // if the routeTownCode changed from the outside, update the selectedTownCode
      selectedTownCode.value = newVal;
    });
    return {
      selectedTownCode,
      handleSelectChange,
    };
  },
});
</script>
