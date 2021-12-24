<template>
  <div class="flex flex-col bg-white dark:bg-dark-card h-36 px-4 pb-4 rounded">
    <div class="grow flex items-center justify-center text-bgray-700 dark:text-white font-semibold text-lg 2xl:text-xl" :class="isArLocale && 'direction-rtl'">
      {{ wilaya.code }} {{ isArLocale ? wilaya.arName : wilaya.name }}
    </div>
    <router-link
      :to="{ name: 'towns', params: { wilayaId: wilaya.id } }"
      class="
        text-center text-sm
        xl:text-base
        flex
        items-center
        justify-center
        bg-gray-100
        hover:bg-blue-100
        focus:bg-bgray-200
        dark:bg-gradient-to-br dark:from-indigo-100 dark:to-white dark:hover:from-white dark:hover:to-indigo-300
        transition-colors
        h-9
        w-full
        font-semibold
        text-blue-400
        dark:text-blue-600 dark:hover:text-blue-800
        rounded-md
      "
    >
      {{ t("wilaya.goToTowns") }}
    </router-link>
  </div>
</template>

<script lang="ts">
import { computed, defineComponent, PropType } from "vue";
import { useI18n } from "vue-i18n";
import { useStore } from "vuex";
import { Wilaya } from "../../store/modules/wilayas";

export default defineComponent({
  props: {
    wilaya: {
      type: Object as PropType<Wilaya>,
    },
  },
  setup() {
    const store = useStore();
    const { t } = useI18n();
    const isArLocale = computed(() => store.getters.getIsArLang);
    return { isArLocale, t };
  },
});
</script>