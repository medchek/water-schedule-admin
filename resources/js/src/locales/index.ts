import { env } from "./../lib/shared";
import { createI18n } from "vue-i18n";
// import frFr from "./fr-Fr.json";
// import arDz from "./ar-Dz.json";
import store from "../store";
import { nextTick } from "vue";

// type MessageSchema = typeof frFr;

type AvailableLocalesFiles = "fr-FR" | "ar-DZ";
export type AvailableLocales = "fr" | "ar";

const messages = {
    // fr: frFr,
    // ar: arDz,
};

// const locale = "fr-Fr";

const i18n = createI18n({
    locale: store.getters.getLanguage,
    fallbackLocale: "fr",
    legacy: false,
    messages,
});

// locale lazy loading
export async function loadLocaleMessages(locale: AvailableLocales) {
    if (env(import.meta.env.VITE_APP_DEBUG, "false") == "true") console.log("Loading locales");

    // if the locales have already been loaded, dont load them again
    if (i18n.global.availableLocales.includes(locale)) return;

    const localeFileName: AvailableLocalesFiles = locale === "ar" ? "ar-DZ" : "fr-FR";
    // load locale messages with dynamic import
    const messages = await import(`./${localeFileName}.json`);
    if (env(import.meta.env.VITE_APP_DEBUG, "false") == "true") {
        console.log("locales successfully imported", messages);
    }

    // set locale and locale message
    i18n.global.setLocaleMessage(locale, messages.default);

    return nextTick();
}

export default i18n;
