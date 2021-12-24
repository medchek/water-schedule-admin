import router from "../router/index";

export const addZeroToSingleDigit = (n: number): string | number => {
    return n < 10 ? `0${n}` : n;
};

export const redirectToLogin = () => {
    router.replace({ name: "login" });
};

export const formatDate = (date: Date) => {
    const addZeroToSingleDigit = (n: number) => (n < 10 ? "0" + n : n);
    return `${addZeroToSingleDigit(date.getDate())}/${addZeroToSingleDigit(date.getMonth() + 1)}/${date.getFullYear()}`;
};

export const frDaysMapper = {
    samedi: "saturday",
    dimanche: "sunday",
    lundi: "monday",
    mardi: "tuesday",
    mercredi: "wednesday",
    jeudi: "thursday",
    vendredi: "friday",
};

export const randNumber = (min: number, max: number): number => {
    return Math.floor(Math.random() * (max - min + 1)) + min;
};

/**
 * sorts an array of objects based on the given property (does not mutate the original array)
 * @param arr the array to stort
 * @param property the target property
 * @returns the sorted array (does not mutate the original)
 */
export const sortArrayOfObjects = (arr: any[], property: string) => {
    if (!arr) throw new Error("array cannot be empty");
    const cloned = [...arr];
    // return cloned.sort((a, b) => a[property].localeCompare(b[property], ["ar"]));
    return cloned.sort((a, b) => new Intl.Collator().compare(a[property], b[property]));
};

/** Retrives the darkMode key from the localStorage
 * @returns if the darkMode key does not exist in the localStorage or if its value is not "yes" returns false */
export const isLocalStorageDarkMode = (): boolean => {
    const value = localStorage.getItem("darkMode");
    if (value) {
        if (value === "yes") return true;
    }
    return false;
};

/**
 * Sets the app language in the localStorage
 * @param lang the language either ar or fr
 */
export const setLocaleStorageLang = (lang: "fr" | "ar") => {
    if (lang !== "fr" && lang !== "ar") lang = "fr"; // default fr
    localStorage.setItem("lang", lang);
};
/**
 * Retrives the lang value from the localeStorage
 * @returns if the lang value does not exist or is invalid, return "fr" by default, otherwise, return the key value
 */
export const getLocaleStorageLang = () => {
    const lang = localStorage.getItem("lang");
    return lang !== null && (lang === "fr" || lang === "ar") ? lang : "fr";
};
