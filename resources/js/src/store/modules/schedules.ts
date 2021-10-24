import { ScheduleProps } from "./../../types/components.d";
import { FormSchedule, Period, scheduleFormData, Time } from "./../../lib/shared";
import { Module } from "vuex";
import { axios } from "../../lib/shared";
import { ScheduleRequestStructure } from "../../types/components";

import { AxiosResponse } from "axios";

type JsonString = string;

// response structure coming from the server
interface ScheduleData {
    year: number;
    townCode: number;
    scheduleCode: number;
    weekNumber: number;
    nextWeekNumber: number | null;
    schedule: JsonString | null;
}

export interface TownSchedule {
    townCode: number;
    current: ScheduleData | null;
    next: ScheduleData | null;
}

interface ScheduleResponse {
    current?: ScheduleDataState | null;
    next?: ScheduleDataState | null;
}

interface AddSchedulePayload extends ScheduleResponse {
    townCode: number;
}

// state used in the module
export interface ScheduleDays {
    sunday: Period[];
    monday: Period[];
    tuesday: Period[];
    wednesday: Period[];
    thursday: Period[];
    friday: Period[];
    saturday: Period[];
}

export interface ScheduleDataState {
    year: number;
    townCode: number;
    weekNumber: number;
    scheduleCode: number;
    nextWeekNumber: number | null;
    schedule: ScheduleDays | null;
}

export interface TownScheduleState {
    townCode: number;
    current: ScheduleDataState | null;
    next: ScheduleDataState | null;
}

export interface ParsedSchedule {
    townCode: number;
    current?: ScheduleDataState | null;
    next?: ScheduleDataState | null;
}

export interface Schedules {
    // town code is a compound of townCode-weekNumber-Year
    //example for Algeris : 1601-42-2021 (where 42 is the week number and 2021 is the year);
    [townCode: number]: TownScheduleState;
    //
}

interface ScheduleModuleState {
    schedules: Schedules;
    form: {
        current: FormSchedule[];
        next: FormSchedule[];
    };
}

const userModule: Module<ScheduleModuleState, any> = {
    state: () => ({
        schedules: {},
        form: {
            current: scheduleFormData(),
            next: scheduleFormData(),
        },
    }),
    getters: {
        getAllSchedules: (state): Schedules => state.schedules,
        getScheduleByTownCode:
            (state) =>
            (townCode: number): TownScheduleState | undefined => {
                if (!townCode) console.error("a townCode must be passed to getScheduleByTownCode()");
                return state.schedules[townCode];
            },
    },
    mutations: {
        SAVE_SCHEDULE(state, payload: AddSchedulePayload) {
            try {
                // console.warn("[SAVE_SCHEDULE] STARTING SCHEDULE SAVING WITH PAYLOAD=", payload);

                // const parsedPayload = parseScheduleResponse(payload);
                const { townCode, current, next } = payload;

                if (Object.prototype.hasOwnProperty.call(state.schedules, townCode)) {
                    // merge(parsedPayload, state.schedules[townCode]);
                    if (current !== undefined) {
                        state.schedules[townCode].current = current;
                    }
                    if (next !== undefined) {
                        state.schedules[townCode].next = next;
                    }
                    // console.warn("[MUTATION:SAVE_SCHEDULE] merging completed@ new value", state.schedules[townCode]);
                } else {
                    // console.warn("[MUTATION:SAVE_SCHEDULE] INSERTING NEW SCHEDULE = ", payload);
                    if (current !== undefined && next !== undefined) {
                        state.schedules[townCode] = {
                            townCode,
                            current,
                            next,
                        };
                    }
                }
            } catch (error) {
                console.error("[SAVE_SCHEDULE] caught error", error);
                throw new Error(`[Mutation@SAVE_SCHEDULE] caught error ${error}`);
            }
        },
    },

    actions: {
        async fetchSchedule({ commit }, payload: { townCode: number }) {
            const townCode = payload.townCode;
            try {
                console.log("[schedules.ts@action:fetchSchedule] preparing to get schedule data from the server", payload);

                const response: AxiosResponse<ScheduleResponse> = await axios.get(`/api/schedules/${townCode}`);
                console.log(`[schedules.ts][action:fetchSchedule] successfully retireived data for town ${townCode}: RESPONSE CONTENT=>`, response.data);
                commit("SAVE_SCHEDULE", { townCode, ...response.data });

                return response.status;
                // throw new Error(`[fetchTowns] unexpected response status from the server: code ${response.status}`);
            } catch (err: any) {
                throw new Error(`[action:fetchSchedule] Failed to get schedule from api => ${err.response.data}`);
            }
        },
        async saveSchedule({ commit }, payload: ScheduleRequestStructure) {
            try {
                const { townCode } = payload;

                const response: AxiosResponse<ScheduleResponse> = await axios.post("/api/schedules", payload);

                console.log("[schedules.ts][action:saveSchedule] successfully saved schedule on the server => RESPONSE CONTENT:", response.data);
                commit("SAVE_SCHEDULE", { townCode, ...response.data });
                return response;
            } catch (err: any) {
                console.error("action@saveSchedule:", err.response.data);
                throw new Error(`[action:saveSchedule] Failed to save schedule => ${err}`);
            }
        },
    },
};

export default userModule;
