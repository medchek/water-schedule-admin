import { createI18n } from "vue-i18n";
import frFr from "./fr-FR.json";
import arDz from "./ar-Dz.json";
import store from "../store";

type MessageSchema = typeof frFr;

const messages = {
    fr: frFr,
    ar: arDz,
};

// const locale = "fr-Fr";

const i18n = createI18n({
    locale: store.getters.getLanguage,
    fallbackLocale: "fr",
    legacy: false,
    messages,
});

export default i18n;
