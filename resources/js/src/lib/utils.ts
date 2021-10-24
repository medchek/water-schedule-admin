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

export const enDaysMapper = {
    saturday: "samedi",
    sunday: "dimanche",
    monday: "lundi",
    tuesday: "mardi",
    wednesday: "mercredi",
    thursday: "jeudi",
    friday: "vendredi",
};

export const randNumber = (min: number, max: number): number => {
    return Math.floor(Math.random() * (max - min + 1)) + min;
};
