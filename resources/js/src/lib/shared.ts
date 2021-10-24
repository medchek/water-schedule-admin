import axiosDefault from "axios";
import router from "../router";
import store from "../store";

export const axios = axiosDefault.create({
    baseURL: "http://127.0.0.1:8000",
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
    (error) => {
        const status: number = error.response.status;
        if (status == 419 || status == 401) {
            const currentRoute = document.location.pathname;
            // if (currentRoute.toLowerCase() !== "/login") {
            //     router.replace({ name: "login" });
            //     flashSnack("Votre session a expiré, veuillez vous reconnecter");
            // }
        }

        return Promise.reject(error);
    }
);

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

const flashSnack = (message: string, time = 5000, type: "info" | "error" = "info") => {
    store.dispatch("flashSnack", {
        message,
        time,
        type,
    });
};

// schedule data pattern
// a function is used to assure a total deep cloning
export type Days = "dimanche" | "lundi" | "mardi" | "mercredi" | "jeudi" | "vendredi" | "samedi";

export interface Period {
    from: Time;
    to: Time;
}
export interface Time {
    hours: number | null;
    minutes: number | null;
}
interface WeekSchedule {
    dimanche: Period[];
    lundi: Period[];
    mardi: Period[];
    mercredi: Period[];
    jeudi: Period[];
    vendredi: Period[];
    samedi: Period[];
}
export const baseScheduleData = (): WeekSchedule => ({
    dimanche: [
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
    lundi: [
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
    mardi: [
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
    mercredi: [
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
    jeudi: [
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
    vendredi: [
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
    samedi: [
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
});
interface Error {
    from: string;
    to: string;
}
export interface FormSchedule {
    day: Days;
    errors: Error[];
    schedule: Period[];
}
export const scheduleFormData = (): FormSchedule[] => [
    {
        day: "dimanche",
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
        day: "lundi",
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
        day: "mardi",
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
        day: "mercredi",
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
        day: "jeudi",
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
        day: "vendredi",
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
        day: "samedi",
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
