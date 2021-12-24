<template>
  <section>
    <account-menu-openable-item :icon="mdiBrightness5" :text="t('settings.theme.light')" :selected="!isDark" @click="setDarkMode(false)" />
    <account-menu-openable-item :icon="mdiBrightness4" :text="t('settings.theme.dark')" :selected="isDark" @click="setDarkMode(true)" />
  </section>
</template>

<script lang="ts">
import { computed, defineComponent } from "vue";
import { mdiBrightness5, mdiBrightness4 } from "@mdi/js";
import AccountMenuOpenableItem from "./AccountMenuOpenableItem.vue";
import { useStore } from "vuex";
import { useI18n } from "vue-i18n";

export default defineComponent({
  components: { AccountMenuOpenableItem },

  setup() {
    const store = useStore();
    const isDark = computed(() => store.getters.getIsDarkMode);
    const { t } = useI18n();
    const setDarkMode = (value: boolean) => {
      store.commit("SET_DARK_MODE", value);
    };
    return { t, isDark, setDarkMode, mdiBrightness5, mdiBrightness4 };
  },
});
</script>