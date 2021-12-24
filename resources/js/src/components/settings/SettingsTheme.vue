<template>
  <settings-container :label="t('settings.theme.label')" :description="t('settings.theme.description') + '.'">
    <section class="flex space-y-5 flex-col">
      <settings-theme-selector :icon="mdiBrightness5" @click="selectTheme('light')" :text="t('settings.theme.light')" :isSelected="!isDarkMode" />
      <settings-theme-selector :icon="mdiBrightness4" @click="selectTheme('dark')" :text="t('settings.theme.dark')" :isSelected="isDarkMode" darkSelector />
    </section>
  </settings-container>
</template>

<script lang="ts">
import { computed, defineComponent } from "vue";

import SettingsContainer from "./SettingsContainer.vue";

//

import { mdiBrightness5, mdiBrightness4 } from "@mdi/js";
import SettingsThemeSelector from "./SettingsThemeSelector.vue";
import { useStore } from "vuex";
import { useI18n } from "vue-i18n";

export default defineComponent({
  components: { SettingsContainer, SettingsThemeSelector },
  setup() {
    const store = useStore();
    const { t } = useI18n();
    const isDarkMode = computed(() => store.getters.getIsDarkMode);

    const selectTheme = (theme: "light" | "dark") => {
      const payload: boolean = theme === "light" ? false : true;
      if (payload !== isDarkMode.value) {
        console.log("running");
        store.commit("SET_DARK_MODE", payload);
      }
    };
    return {
      mdiBrightness5,
      mdiBrightness4,
      selectTheme,
      isDarkMode,
      // localization
      t,
    };
  },
});
</script>