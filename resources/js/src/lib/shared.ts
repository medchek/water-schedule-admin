import axiosDefault, { AxiosError } from "axios";
import router from "../router";
import store from "../store";
import { SnackType } from "../store/modules/ui";

const env = (envVar: string | undefined, fallback?: string) => {
    if (!envVar && !fallback) throw new ErrorEvent("empty env variable and no fallback was passed");
    if (!envVar && fallback) return fallback;
    else return envVar;
};

export const axios = axiosDefault.create({
    baseURL: env(process.env.SANCTUM_STATEFUL_DOMAINS, "http://127.0.0.1:8000"),
    headers: {
        // "X-CSRF-TOKEN": window.Laravel,
        "X-Requested-With": "XMLHttpRequest",
        "Content-Type": "application/json",
        Accept: "application/json",
        // "Access-Control-Allow-Credentials": true,
    },
    // withCredentials: true,
});

axios.interceptors.response.use(
    (response) => {
        return response;
    },
    (error: AxiosError) => {
        if (error.response) {
            const status: number = error.response.status;
            if (status == 419 || status == 401) {
                const currentRoute = document.location.pathname;
                if (currentRoute.toLowerCase() !== "/login" && store.getters.getUser !== null) {
                    // set the session state as expired
                    store.commit("SET_SESSION_EXPIRED", true);
                    store.commit("RESET_USER");
                }
            }
            // if (status === 404) {
            //     router.replace({ name: "not-found" });
            // }
        }

        return Promise.reject(error);
    }
);
/**
 * Axios instance with  "Access-Control-Allow-Credentials" header and "withCredentials" set to true
 */
const AxiosLogin = axios;
AxiosLogin.defaults.headers["Access-Control-Allow-Credentials"] = true;
AxiosLogin.defaults.withCredentials = true;

export { AxiosLogin };

export const isAuth = async (): Promise<boolean> => {
    try {
        const response = await axios("/api/user");
        console.log("shared@isAuth() fetch user response =>", response);
        if (response.status === 200) {
            return true;
        } else {
            throw new Error("Cound not get the user");
        }
    } catch (err) {
        throw new Error(`Failed authentication check => ${err}`);
    }
};

export const flashSnack = ({ message, time, type }: { message: string; time?: number; type?: SnackType }) => {
    store.dispatch("flashSnack", { message, type: type || "info", time: time || 5000 });
};

/**
 * Adds __d'__ or __de__ according to the french grammar rules (mainly used for displaying wilaya and town names)
 * @param word the word to add the preposition to
 * @returns the word preceeded by the correct form of the preposition
 */
export const addPreposition = (word: string): string => {
    if (word.charAt(0).match(/^[auoie]/i)) {
        return `d'${word}`;
    } else {
        return `de ${word}`;
    }
};
// schedule data pattern
// a function is used to assure a total deep cloning
export type Days = "dimanche" | "lundi" | "mardi" | "mercredi" | "jeudi" | "vendredi" | "samedi";
export type enDays = "sunday" | "monday" | "tuesday" | "wednesday" | "thursday" | "friday" | "saturday";
export type arDays = "السبت" | "الأحد" | "الإثنين" | "الثلاثاء" | "الأربعاء" | "الخميس" | "الجمعة";

export interface Period {
    from: Time;
    to: Time;
}
export interface Time {
    hours: number | null;
    minutes: number | null;
}

/**
 * Form error for each period
 */
export interface FormError {
    from: string;
    to: string;
}

export interface FormSchedule {
    frDay: Days;
    enDay: enDays;
    arDay: arDays;
    errors: FormError[];
    schedule: Period[];
}
export const scheduleFormData = (): FormSchedule[] => [
    {
        frDay: "dimanche",
        enDay: "sunday",
        arDay: "الأحد",
        errors: [
            {
                from: "",
                to: "",
            },
        ],
        schedule: [
            {
                from: {
                    hours: null,
                    minutes: null,
                },
                to: {
                    hours: null,
                    minutes: null,
                },
            },
        ],
    },
    {
        frDay: "lundi",
        enDay: "monday",
        arDay: "الإثنين",
        errors: [
            {
                from: "",
                to: "",
            },
        ],
        schedule: [
            {
                from: {
                    hours: null,
                    minutes: null,
                },
                to: {
                    hours: null,
                    minutes: null,
                },
            },
        ],
    },
    {
        frDay: "mardi",
        enDay: "tuesday",
        arDay: "الثلاثاء",
        errors: [
            {
                from: "",
                to: "",
            },
        ],
        schedule: [
            {
                from: {
                    hours: null,
                    minutes: null,
                },
                to: {
                    hours: null,
                    minutes: null,
                },
            },
        ],
    },
    {
        frDay: "mercredi",
        enDay: "wednesday",
        arDay: "الأربعاء",
        errors: [
            {
                from: "",
                to: "",
            },
        ],
        schedule: [
            {
                from: {
                    hours: null,
                    minutes: null,
                },
                to: {
                    hours: null,
                    minutes: null,
                },
            },
        ],
    },
    {
        frDay: "jeudi",
        enDay: "thursday",
        arDay: "الخميس",
        errors: [
            {
                from: "",
                to: "",
            },
        ],
        schedule: [
            {
                from: {
                    hours: null,
                    minutes: null,
                },
                to: {
                    hours: null,
                    minutes: null,
                },
            },
        ],
    },
    {
        frDay: "vendredi",
        enDay: "friday",
        arDay: "الجمعة",
        errors: [
            {
                from: "",
                to: "",
            },
        ],
        schedule: [
            {
                from: {
                    hours: null,
                    minutes: null,
                },
                to: {
                    hours: null,
                    minutes: null,
                },
            },
        ],
    },
    {
        frDay: "samedi",
        enDay: "saturday",
        arDay: "السبت",
        errors: [
            {
                from: "",
                to: "",
            },
        ],
        schedule: [
            {
                from: {
                    hours: null,
                    minutes: null,
                },
                to: {
                    hours: null,
                    minutes: null,
                },
            },
        ],
    },
];

// this is needed for ordering by weekly order
export const frDaysByOrder = ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"];
export const enDaysByOrder = ["sunday", "monday", "tuesday", "wednesday", "thursday", "friday", "saturday"];
export const arDaysByOrder = ["الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة", "السبت"];

/**
 * Compares two time objects.
 * @return true if time a (first param) is less than time b (second param), false otherwise.
 */
export const isTimeALessThanB = (a: Time, b: Time): boolean => {
    if (a.hours !== null && b.hours !== null) {
        if (a.hours < b.hours) return true;

        if (a.hours === b.hours) {
            const aMin = a.minutes === null ? 0 : a.minutes;
            const bMin = b.minutes === null ? 0 : b.minutes;
            if (aMin < bMin) return true;
        }
    }
    return false;
};

/**
 * Compares two time objects.
 * @return true if time a (first param) is greater than time b (second param), false otherwise.
 */
export const isTimeAGreaterThanB = (a: Time, b: Time): boolean => {
    if (a.hours !== null && b.hours !== null) {
        if (a.hours > b.hours) return true;

        if (a.hours === b.hours) {
            const aMin = a.minutes === null ? 0 : a.minutes;
            const bMin = b.minutes === null ? 0 : b.minutes;
            if (aMin > bMin) return true;
        }
    }
    return false;
};

/** Checks if the time equals to midnight 00:00 */
export const isTimeMidnight = ({ hours, minutes }: Time) => {
    if (!hours === null || !minutes === null) return false;
    if (hours === 0 && minutes === 0) return true;
    else return false;
};
/** Checks if the time equals to 23:59 */
export const isTimeOneMinuteBeforeMidnight = ({ hours, minutes }: Time) => {
    if (!hours === null || !minutes === null) return false;
    if (hours === 23 && minutes === 59) return true;
    else return;
};

/**
 * checks whether the given time hours and minutes values are null
 * @param time time values containing hours and minutes
 * @returns true if time if both hours and mintues are null, false otherwise.
 */
export const isTimeEmpty = (time: Time) => time.hours === null && time.minutes === null;

/**
 * Check whether the period time objects are not set
 * @param period The period containing the __from__ and __to__ time objects
 * @returns true if the period contains no time values, false otherwise.
 */
export const isPeriodEmpty = (period: Period) => {
    const { from, to } = period;
    return isTimeEmpty(from) && isTimeEmpty(to);
};

/**
 * Fills any missing values left by the user. The function will only fill null values without touching existing ones.
 * @example from => {hours: null, minutes: 13} the output will be {hours: 0, minutes: 13}
 * @example to => {hours: null, minutes: 54} the output will be {hours: 23, minutes: 54}
 * @param unmutablePeriod the period that should be checked for unfilled values
 * @returns the period with time beginning from midnight 00:00 for from value and 23:59 for to value. If the period is completely empty, nothing will be changed.
 */
export const fillRemainingPeriod = (unmutablePeriod: Period): Period => {
    const period: Period = { ...unmutablePeriod };
    if (isPeriodEmpty(period)) return period;
    const { from, to } = period;
    // from
    if (from.hours === null) period.from.hours = 0;
    if (from.minutes === null) period.from.minutes = 0;
    // to
    // only set the mintues to 59 if the hours were not fileld by the user,
    if (to.hours === null && to.minutes === null) period.to.minutes = 59;
    // if the user set the "to" hours set the mintues to 0
    if (to.hours !== null && to.minutes === null) period.to.minutes = 0;

    if (to.hours === null) period.to.hours = 23;
    return period;
};
