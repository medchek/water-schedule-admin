import { Module } from "vuex";

export type SnackType = "info" | "error" | "success";
export interface Snack {
    isShown: boolean;
    message: string;
    type: SnackType;
}

export interface Ui {
    snack: Snack;
}

let timeout: ReturnType<typeof setTimeout> | null = null;

const uiModule: Module<Ui, any> = {
    state: (): Ui => ({
        snack: {
            isShown: false,
            message: ``,
            type: "info",
        },
    }),
    getters: {
        getSnack: (state) => state.snack,
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
    },

    actions: {
        flashSnack({ commit }, { message, type, time }: { message: string; type?: SnackType; time?: number | false }) {
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
    },
};

export default uiModule;
