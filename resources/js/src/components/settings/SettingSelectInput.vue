<template>
  <div class="flex-grow pt-1">
    <label :for="labelId" class="font-semibold text-bgray-500">{{ label }}</label>
    <!-- if data is an empty array, show the placeholder instead -->
    <div class="text-sm flex justify-start items-center bg-white h-12 w-full rounded-md mt-2 px-4 text-gray-400 cursor-default" v-if="data.length === 0">
      <!-- loader if data is fetching -->
      <loader className="w-6 h-6" thin v-if="isFetching" />
      <span v-else>{{ placeholder }}</span>
    </div>

    <div class="relative flex items-center h-12 w-full text-sm text-gray-500 mt-2" v-else>
      <select
        :id="labelId"
        class="h-full w-full rounded-md focus:ring-2 ring-blue-300 outline-none px-4 disabled:opacity-60 capitalize"
        :class="[(isFetching || disabled) && 'cursor-not-allowed']"
        :value="modelValue"
        @change="handleOnChange($event.target.value)"
        :disabled="isFetching || disabled"
      >
        <option class="capitalize" v-for="item in data" :key="item[targetProperty]" :value="item[targetProperty]">
          {{ displayCode ? `${item.code} -` : "" }} {{ item.name }}
        </option>
      </select>

      <div
        :class="[disabled && 'opacity-60']"
        class="flex items-center absolute right-0 left-0 top-0 bottom-0 w-full h-full px-4 pointer-events-none"
        v-if="modelValue === null"
      >
        {{ selectPrompt }}
      </div>
    </div>
    <span class="text-xs min-h-5 text-gray-400">{{ info }}</span>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import Loader from "../Loader.vue";

interface InputDataStructure {
  code: number;
}

export default defineComponent({
  components: { Loader },
  props: {
    label: {
      type: String,
      required: true,
    },
    displayCode: {
      type: Boolean,
      default: false,
    },
    /** Input is autmatically disabled when isFetching is true */
    isFetching: {
      type: Boolean,
      default: false,
    },
    placeholder: {
      type: String,
      required: false,
      default: "aucune données specifiées",
    },
    /** Text to display beneath the select input */
    info: {
      type: String,
      required: false,
    },
    disabled: {
      type: Boolean,
      default: false,
    },
    /**
     * When no data is selected yet, this promp text is shown instead as a disabled option
     */
    selectPrompt: {
      type: String,
      required: true,
    },
    /**
     * Must be an array of objects
     */
    data: {
      type: Array,
      required: true,
    },
    /**
     * the property whose value should be used for the modelValue
     */
    targetProperty: {
      type: [String, Number],
      required: true,
    },
    modelValue: {
      type: [String, Number],
      default: null,
    },
  },
  setup(_, { emit }) {
    const labelId = `select-${Math.ceil(Math.random() * 1000)}`;
    const handleOnChange = (code: string) => {
      emit("update:modelValue", parseInt(code));
    };
    return { labelId, handleOnChange };
  },
});
</script>