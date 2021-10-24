// schedule related types
import { Period } from "../lib/shared";
import { ScheduleDays } from "../store/modules/schedules";

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

export interface ScheduleRequest {
    townCode: number;
    wilayaCode: number;
    current: {
        scheduleCode?: number;
        skip: boolean;
        update: boolean;
        data: ScheduleDays | null;
    };
    next: {
        scheduleCode?: number;
        skip: boolean;
        update: boolean;
        data: ScheduleDays | null;
    };
}
