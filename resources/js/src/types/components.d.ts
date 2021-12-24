import { Time } from "./../lib/shared";
// schedule related types
import { Period } from "../lib/shared";
import { ScheduleDays } from "../store/modules/schedules";

// export const enum TargetSchedule {
//     Current,
//     Next,
// }
export interface ScheduleProps {
    dayIndex: number;
    scheduleIndex: number;
    type: "from" | "to";
    period: "current" | "next";
    updatedValues: {
        hours: number | null;
        minutes: number | null;
    };
}

export interface ScheduleRequestStructure {
    wilayaCode: number;
    townCode: number;
    current: ScheduleDays | null;
    next: ScheduleDays | null;
}

/** Used in  ScheduleRequest */
interface TargetScheduleRequestStructure {
    scheduleCode?: number;
    skip: boolean;
    update: boolean;
    data: ScheduleDays | null;
}
/** Request data structure for schedules post requests */
export interface ScheduleRequest {
    townCode: number;
    wilayaCode: number;
    current: TargetScheduleRequestStructure;
    next: TargetScheduleRequestStructure;
}

// Towns.vue

// edit/delete action data
export interface TownActionData {
    action: "edit" | "delete";
    wilayaId: number;
    townId: number;
    townName: string;
    arTownName: string | null;
}

export interface ScheduleDisplay {
    arDay: string;
    day: string;
    waterUnavailable: boolean;
    message: string[];
}

export type TargetSchedule = "current" | "next";
export type TargetTime = "from" | "to";

// used in ShceuleDaySubform.vue
export interface AddSegmentArgs {
    targetSchedule: TargetSchedule;
    dayIndex: number;
}

export interface RemoveSegmentArgs {
    targetSchedule: TargetSchedule;
    dayIndex: number;
    periodIndex: number;
}

export interface SetTimeArgs {
    newValue: Time;
    targetTime: TargetTime;
    targetSchedule: TargetSchedule;
    periodIndex: number;
    dayIndex: number;
}

export interface ResetTimeArgs {
    targetTime: TargetTime;
    targetSchedule: TargetSchedule;
    periodIndex: number;
    dayIndex: number;
}

export interface SetErrorArgs {
    message: string;
    targetTime: TargetTime;
    targetSchedule: TargetSchedule;
    periodIndex: number;
    dayIndex: number;
}
export interface ResetErrorArgs {
    targetTime: TargetTime;
    targetSchedule: TargetSchedule;
    periodIndex: number;
    dayIndex: number;
}

export interface ResetAllErrorsArgs {
    targetSchedule: TargetSchedule;
    dayIndex: number;
}

export interface ScheduleFormRequest {
    townCode: number;
    current: {
        method: "patch" | "post";
        data: ScheduleDays | null;
        wasChanged: boolean;
    };
    next: {
        method: "patch" | "post";
        data: ScheduleDays | null;
        wasChanged: boolean;
    };
}

// Settings.vue

export type SettingType = "password" | "app";

export type SettingsList = { label: string; component: string; icon: string }[];
