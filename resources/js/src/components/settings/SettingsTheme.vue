<template>
  <settings-container
    label="Apparence"
    description="Vous pouvez regler l'apparence de l'application en choisissant entre le thème clair ou thème sombre selon vos préférences."
  >
    <section class="flex space-y-5 flex-col">
      <settings-theme-selector :icon="mdiBrightness5" @click="selectTheme('light')" text="Claire" :isSelected="!isDarkMode" />
      <settings-theme-selector :icon="mdiBrightness4" @click="selectTheme('dark')" text="Sombre" :isSelected="isDarkMode" darkSelector />
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

export default defineComponent({
  components: { SettingsContainer, SettingsThemeSelector },
  setup() {
    const store = useStore();
    const isDarkMode = computed(() => store.getters.getIsDarkMode);

    const selectTheme = (theme: "light" | "dark") => {
      const payload: boolean = theme === "light" ? false : true;
      if (payload !== isDarkMode.value) {
        console.log("running");
        store.commit("SET_DARK_MODE", payload);
      }
    };
    return { mdiBrightness5, mdiBrightness4, selectTheme, isDarkMode };
  },
});
</script>