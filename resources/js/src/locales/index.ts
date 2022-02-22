import { createI18n } from "vue-i18n";
// import frFr from "./fr-Fr.json";
// import arDz from "./ar-Dz.json";
import store from "../store";
import { nextTick } from "vue";

// type MessageSchema = typeof frFr;

type AvailableLocalesFiles = "fr-Fr" | "ar-Dz";
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
    if (i18n.global.availableLocales.includes(locale)) return;

    const localeFileName: AvailableLocalesFiles = locale === "ar" ? "ar-Dz" : "fr-Fr";
    // load locale messages with dynamic import
    const messages = await import(
        /* webpackChunkName: "locale-[request]" */ `./${localeFileName}.json`
    );

    // set locale and locale message
    i18n.global.setLocaleMessage(locale, messages.default);

    return nextTick();
}

export default i18n;
