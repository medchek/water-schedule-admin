<template>
  <section>
    <account-menu-openable-item text="Français" @click="setLangFr" :selected="selectedLanguage == 'fr'" />
    <account-menu-openable-item text="العربية" @click="setLangAr" :selected="selectedLanguage == 'ar'" />
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
  emits: ["selected"],
  setup(_, { emit }) {
    const { locale } = useI18n({ useScope: "global" });
    const store = useStore();
    const selectedLanguage = computed(() => store.getters.getLanguage);
    const setLangFr = () => {
      if (locale.value !== "fr") {
        locale.value = "fr";
        store.dispatch("setLanguageFr");
        emit("selected");
      }
    };
    const setLangAr = () => {
      if (locale.value !== "ar") {
        locale.value = "ar";
        store.dispatch("setLanguageAr");
        emit("selected");
      }
    };

    return {
      selectedLanguage,
      setLangFr,
      setLangAr,
      // icons
      mdiBrightness5,
      mdiBrightness4,
    };
  },
});
</script>