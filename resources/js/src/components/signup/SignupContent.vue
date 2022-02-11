<template>
  <section id="register-content" class="flex flex-col grow h-full pt-2 xl:pt-5 2xl:pt-10 overflow-hidden">
    <h3 class="text-blue-500 text-base md:text-lg 2xl:text-xl font-semibold mb-2">{{ label }}</h3>
    <p class="" :class="[importantDescription ? 'text-bgray-600 text-sm 2xl:text-base' : 'text-bgray-400 text-sm']">{{ description }}</p>
    <div id="register-content-from" :class="[className ? className : null, 'grow overflow-y-auto h-full w-full my-4']">
      <slot> </slot>
    </div>
  </section>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
  props: {
    label: String,
    description: String,
    className: String,
    importantDescription: Boolean,
  },
});
</script>