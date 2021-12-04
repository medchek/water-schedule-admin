import { ScheduleFormRequest, ScheduleProps, ScheduleRequest, TargetSchedule } from "./../../types/components.d";
import { FormSchedule, Period, scheduleFormData, Time } from "./../../lib/shared";
import { Module } from "vuex";
import { axios } from "../../lib/shared";

import { AxiosResponse } from "axios";

/** Request structure as should be expected by the server */
interface SaveScheduleServerRequest {
    townCode: number;
    current?: {
        wasChanged?: boolean;
        method: "post" | "patch";
        data: ScheduleDays | null;
        scheduleCode?: number;
    };
    next?: {
        wasChanged?: boolean;
        method: "post" | "patch";
        data: ScheduleDays | null;
        scheduleCode?: number;
    };
}
interface FetchScheduleServerResponse {
    // a null schedule means that it has not been added yet
    current: ScheduleDataState | null;
    next: ScheduleDataState | null;
}

interface SaveScheduleServerResponse {
    current?: ScheduleDataState;
    next?: ScheduleDataState;
}

/**
 *
 * MUTATIONS PAYLOADS TYPES
 *
 */
/** payload type for STORE_FETCHED_SCHEDULES */
interface StoreFetchedSchedulesPayload extends FetchScheduleServerResponse {
    townCode: number;
}

interface StoreSavedTargetSchedulePayload {
    townCode: number;
    targetSchedule: TargetSchedule;
    data: ScheduleDataState;
}

/**
 *  MODULE STATE TYPES
 */
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

export interface Schedules {
    // town code is a compound of townCode-weekNumber-Year
    //example for Algeris : 1601-42-2021 (where 42 is the week number and 2021 is the year);
    [townCode: number]: TownScheduleState;
    //
}

interface ScheduleModuleState {
    schedules: Schedules;
}

const userModule: Module<ScheduleModuleState, any> = {
    state: () => ({
        schedules: {},
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
        /*
        SAVE_SCHEDULE(state, payload: AddSchedulePayload) {
            try {
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
        */
        /**
         * Store fetched schedules in the state
         * @param state
         * @param payload
         */
        STORE_FETCHED_SCHEDULES(state, payload: StoreFetchedSchedulesPayload) {
            const { townCode, current, next } = payload;
            state.schedules[townCode] = {
                townCode,
                current,
                next,
            };
        },
        /**
         * stores in the state a single schedule that was successfully stored in the server
         * @param state
         * @param payload
         */
        STORE_SAVED_TARGET_SCHEDULE(state, payload: StoreSavedTargetSchedulePayload) {
            const { townCode, targetSchedule, data } = payload;
            state.schedules[townCode][targetSchedule] = data;
        },
    },

    actions: {
        async fetchSchedule({ commit }, payload: { townCode: number }) {
            const townCode = payload.townCode;
            try {
                console.log("[schedules.ts@action:fetchSchedule] preparing to get schedule data from the server", payload);

                const response: AxiosResponse<FetchScheduleServerResponse> = await axios.get(`/api/schedules/${townCode}`);
                commit("STORE_FETCHED_SCHEDULES", { townCode, ...response.data });

                console.log(`[schedules.ts][action:fetchSchedule] successfully retireived data for town ${townCode}: RESPONSE CONTENT=>`, response.data);
                return response.status;
                // throw new Error(`[fetchTowns] unexpected response status from the server: code ${response.status}`);
            } catch (err: any) {
                console.error(err.response.data);
                throw new Error(`[action:fetchSchedule] Failed to get schedule from api => ${err}`);
            }
        },
        // async saveSchedule({ commit }, payload: ScheduleRequest) {
        //     try {
        //         const { townCode } = payload;

        //         const response: AxiosResponse<ScheduleResponse> = await axios.post("/api/schedules", payload);

        //         console.log("[schedules.ts][action:saveSchedule] successfully saved schedule on the server => RESPONSE CONTENT:", response.data);
        //         commit("SAVE_SCHEDULE", { townCode, ...response.data });
        //         return response;
        //     } catch (err: any) {
        //         console.error("action@saveSchedule:", err.response.data);
        //         throw new Error(`[action:saveSchedule] Failed to save schedule => ${err}`);
        //     }
        // },

        async saveSchedule({ state, commit }, requestPayload: ScheduleFormRequest) {
            try {
                console.log("saving the schedule...");
                const { townCode, current, next } = requestPayload;
                // if any of the schedule was not changed omit it from the final rquest object
                const serverRequest: SaveScheduleServerRequest = {
                    townCode,
                };
                if (current.wasChanged) {
                    serverRequest.current = current;
                    // retriveing the townCode and adding it to the request
                    if (current.method === "patch") {
                        const schedule = state.schedules[townCode];
                        serverRequest.current.scheduleCode = schedule.current?.scheduleCode;
                    }
                }
                if (next.wasChanged) {
                    serverRequest.next = next;
                    if (next.method === "patch") {
                        const schedule = state.schedules[townCode];
                        serverRequest.next.scheduleCode = schedule.next?.scheduleCode;
                    }
                }
                // remove unnecessary wasChanged property
                if (serverRequest.current) delete serverRequest.current.wasChanged;
                if (serverRequest.next) delete serverRequest.next.wasChanged;

                const response: AxiosResponse<SaveScheduleServerResponse> = await axios.post("/api/schedules", serverRequest);

                const { current: serverCurrent, next: serverNext } = response.data;

                if (serverCurrent) {
                    const serverCurrentPayload: StoreSavedTargetSchedulePayload = {
                        townCode,
                        data: serverCurrent,
                        targetSchedule: "current",
                    };
                    commit("STORE_SAVED_TARGET_SCHEDULE", serverCurrentPayload);
                }

                if (serverNext) {
                    const serverNextPayload: StoreSavedTargetSchedulePayload = {
                        townCode,
                        data: serverNext,
                        targetSchedule: "next",
                    };
                    commit("STORE_SAVED_TARGET_SCHEDULE", serverNextPayload);
                }

                console.log("schedules.ts@saveSchedule: SUCCESSFULLY STORED SCHEDULE", response.data);
            } catch (err: any) {
                console.error("action@saveSchedule:", err.response.data);
                throw new Error(`[action:saveSchedule] Failed to save schedule => ${err}`);
            }
        },
    },
};

export default userModule;
