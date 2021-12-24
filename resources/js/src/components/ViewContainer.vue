<template>
  <main class="flex grow flex-col h-full overflow-hidden">
    <div class="flex arabic:flex-row-reverse items-center justify-between px-5 h-14 min-h-14 mb-2">
      <span class="text-bgray-700 dark:text-white arabic:text-xl md:arabic:text-2xl text-lg xs:text-xl md:text-2xl font-semibold arabic:direction-rtl">
        {{ label }}
        <slot name="label"></slot>
      </span>
      <account-menu class="invisible lg:visible" />
    </div>
    <slot> </slot>
  </main>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import AccountMenu from "./account-menu/AccountMenu.vue";

export default defineComponent({
  components: { AccountMenu },
  props: {
    label: {
      type: String,
      default: "",
    },
  },
  setup() {},
});
</script>
