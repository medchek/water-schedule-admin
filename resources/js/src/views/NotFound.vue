<template>
  <div>
    <div
      class="
        flex flex-col
        justify-center
        items-center
        w-screen
        h-screen
        bg-gradient-to-br
        from-blue-50
        to-blue-200
        dark:from-dark-menu dark:to-dark-blue2
        space-y-2
        arabic:direction-rtl arabic:space-x-reverse
      "
    >
      <p class="text-2xl font-semibold text-gray-700 dark:text-bgray-300">{{ t("notFound") }}</p>
      <button
        class="
          h-10
          pr-4
          arabic:pl-4 arabic:pr-2
          pl-2
          bg-blue-50
          hover:bg-blue-500
          focus:bg-blue-600 focus:text-white
          hover:text-white
          font-semibold
          rounded
          text-gray-700
        "
        @click="$router.push({ name: 'home' })"
      >
        <Icon :icon="mdiChevronLeft" className="w-6 h-6 arabic:rotate-180" />{{ t("general.back") }}
      </button>
    </div>
  </div>
</template>
<script lang="ts" setup>
import Icon from "../components/Icon.vue";
import { mdiChevronLeft } from "@mdi/js";
import { useI18n } from "vue-i18n";
const { t } = useI18n();
</script>
