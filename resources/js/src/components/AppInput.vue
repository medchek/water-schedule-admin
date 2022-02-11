<template>
  <div :class="`${className ? className : 'w-80 h-10'} flex items-center relative`">
    <input
      :id="inputId"
      :type="type"
      :class="[
        appendIcon ? 'pl-9 arabic:pr-9' : 'pl-2 arabic:pr-2',
        `w-full h-full border border-gray-200 focus:ring-2 ring-blue-300 dark:ring-indigo-500 rounded-md placeholder-gray-300 dark:placeholder-bgray-400`,
      ]"
      :placeholder="placeholder"
      :value="modelValue"
      :autocomplete="autocomplete"
      @input="$emit('update:modelValue', $event.target.value)"
    />
    <icon v-if="appendIcon" :icon="appendIcon" class="absolute left-2 arabic:right-2 arabic:left-auto text-gray-300 h-6 w-6 dark:text-bgray-400" />
    <button>
      <icon
        v-if="clearable && modelValue.length > 0"
        @click="$emit('update:modelValue', '')"
        :icon="mdiClose"
        class="absolute right-2 arabic:left-2 text-gray-600 h-6 w-6"
      />
    </button>
  </div>
</template>

<script lang="ts">
import { defineAsyncComponent, defineComponent } from "vue";
import { mdiClose } from "@mdi/js";

export default defineComponent({
  components: { Icon: defineAsyncComponent(() => import("./Icon.vue")) },
  props: {
    modelValue: {
      type: String,
      default: "",
    },
    className: {
      type: String,
      default: "",
    },
    appendIcon: {
      type: String,
      default: null,
    },
    clearable: {
      type: Boolean,
      default: false,
    },
    placeholder: {
      type: String,
    },
    autocomplete: String,
    value: String,
    type: {
      type: String,
      default: "text",
    },
    inputId: String,
  },
  setup() {
    return { mdiClose };
  },
});
</script>
