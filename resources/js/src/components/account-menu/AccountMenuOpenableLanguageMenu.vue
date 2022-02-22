<template>
    <section>
        <account-menu-openable-item
            text="Français"
            @click="setLangFr"
            :selected="selectedLanguage == 'fr'"
            :isLoading="isLangLoading == 'fr'"
        />
        <account-menu-openable-item
            text="العربية"
            @click="setLangAr"
            :selected="selectedLanguage == 'ar'"
            :isLoading="isLangLoading == 'ar'"
        />
    </section>
</template>

<script lang="ts">
import { computed, defineComponent, ref } from "vue";
import { mdiBrightness5, mdiBrightness4 } from "@mdi/js";
import AccountMenuOpenableItem from "./AccountMenuOpenableItem.vue";
import { useStore } from "vuex";
import { useI18n } from "vue-i18n";
import { AvailableLocales, loadLocaleMessages } from "../../locales";
import { flashErrorSnack } from "../../lib/shared";

export default defineComponent({
    components: { AccountMenuOpenableItem },
    emits: ["selected"],
    setup(_, { emit }) {
        const { locale, t } = useI18n({ useScope: "global" });
        const store = useStore();
        const selectedLanguage = computed(() => store.getters.getLanguage);

        const isLangLoading = ref<AvailableLocales | null>(null);
        //
        const setLangFr = async () => {
            if (locale.value !== "fr") {
                await loadLang("fr", () => {
                    locale.value = "fr";
                    store.dispatch("setLanguageFr");
                    emit("selected");
                });
            }
        };

        //
        const setLangAr = async () => {
            if (locale.value !== "ar") {
                await loadLang("ar", () => {
                    locale.value = "ar";
                    store.dispatch("setLanguageAr");
                    emit("selected");
                });
            }
        };

        /**
         * Lazy loads the lang files and runs the callback function after it's successfully loaded
         * @param locale the target locale
         * @param callback the callback function to run after the language json is loaded
         */
        const loadLang = async (locale: AvailableLocales, callback: () => void) => {
            try {
                isLangLoading.value = locale;
                await loadLocaleMessages(locale);
                callback();
            } catch {
                flashErrorSnack(t("general.snack.errors.langImport"));
                throw new Error("could not load ar language data");
            } finally {
                isLangLoading.value = null;
            }
        };

        return {
            selectedLanguage,
            setLangFr,
            setLangAr,
            isLangLoading,
            // icons
            mdiBrightness5,
            mdiBrightness4,
        };
    },
});
</script>
