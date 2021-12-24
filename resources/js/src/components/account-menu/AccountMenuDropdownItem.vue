<template>
  <component :is="componentName" :href="href" class="flex items-center justify-between max-h-10 h-10 w-full rounded hover:bg-bgray-100 arabic:direction-rtl">
    <span class="flex items-center w-full space-x-2 arabic:space-x-reverse">
      <loader thin v-if="isLoading" className="w-6 h-6" />
      <icon v-else :icon="icon" className="w-6 h-6" />
      <span>{{ text }}</span>
    </span>
    <icon v-if="openable" :icon="mdiChevronRight" className="w-6 h-6 arabic:rotate-180" />
  </component>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import Icon from "../Icon.vue";
import Loader from "../Loader.vue";
import { mdiChevronRight } from "@mdi/js";

export default defineComponent({
  components: { Icon, Loader },
  props: {
    isLoading: {
      type: Boolean,
      default: false,
    },
    icon: {
      type: String,
      required: true,
    },
    text: {
      type: String,
      required: true,
    },
    openable: {
      type: Boolean,
      default: false,
    },
    href: {
      type: [String, Object],
      default: null,
    },
  },
  setup(props) {
    const componentName = props.href != null ? "a" : "button";
    return { mdiChevronRight, componentName };
  },
});
</script>