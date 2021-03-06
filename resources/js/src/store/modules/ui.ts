import {
    isLocalStorageDarkMode,
    setLocaleStorageLang,
    getLocaleStorageLang,
} from "./../../lib/utils";
import { Module } from "vuex";

export type SnackType = "info" | "error" | "success";
export interface Snack {
    isShown: boolean;
    message: string;
    type: SnackType;
}

export interface Ui {
    snack: Snack;
    isDark: boolean;
    language: "fr" | "ar";
}

let timeout: ReturnType<typeof setTimeout> | null = null;

const uiModule: Module<Ui, any> = {
    state: (): Ui => ({
        language: getLocaleStorageLang(), // defaults to french
        isDark: isLocalStorageDarkMode(), // initialzie the value from the localStorage if it exists
        snack: {
            isShown: false,
            message: ``,
            type: "info",
        },
    }),
    getters: {
        getSnack: (state) => state.snack,
        getIsDarkMode: (state) => state.isDark,
        getLanguage: (state) => state.language,
        getIsArLang: (state) => state.language === "ar",
    },
    mutations: {
        SHOW_SNACK(state, payload: { message: string; type?: SnackType }) {
            state.snack.message = payload.message;
            if (payload.type) state.snack.type = payload.type;
            state.snack.isShown = true;
        },
        HIDE_SNACK(state) {
            state.snack.isShown = false;
        },
        SET_DARK_MODE(state, payload: boolean = true) {
            if (payload !== state.isDark) {
                state.isDark = payload;
                // a boolean cannot be stored in the localstrage, hence "y" will refer the a true, n will refer to false
                const localStorageValue = payload ? "yes" : "no";
                localStorage.setItem("darkMode", localStorageValue);
            }
        },
        SET_LANGUAGE_FR(state) {
            state.language = "fr";
        },
        SET_LANGUAGE_AR(state) {
            state.language = "ar";
        },
    },

    actions: {
        flashSnack(
            { commit },
            { message, type, time }: { message: string; type?: SnackType; time?: number | false }
        ) {
            commit("SHOW_SNACK", { message, type });
            // if time is 0, don't hide the snack
            if (time === 0 || time === false) return;
            if (timeout) clearTimeout(timeout);
            timeout = null;
            timeout = setTimeout(
                () => {
                    commit("HIDE_SNACK");
                },
                time === undefined ? 3000 : time
            );
        },
        setLanguageAr({ commit, state }) {
            if (state.language !== "ar") {
                setLocaleStorageLang("ar");
                commit("SET_LANGUAGE_AR");
            }
        },
        setLanguageFr({ commit, state }) {
            if (state.language !== "fr") {
                setLocaleStorageLang("fr");
                commit("SET_LANGUAGE_FR");
            }
        },
    },
};

export default uiModule;
