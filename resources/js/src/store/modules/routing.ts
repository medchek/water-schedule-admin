import { randNumber } from "./../../lib/utils";
import { Module } from "vuex";

interface RoutingModuleState {
    progress: number;
    show: boolean;
}

let progressInterval: ReturnType<typeof setInterval> | null = null;
const stopProgressInterval = () => {
    if (progressInterval !== null) {
        clearInterval(progressInterval);
        progressInterval = null;
    }
};

let hideProgressTimeout: ReturnType<typeof setTimeout> | null = null;
const cancelHideProgressTimeout = () => {
    if (hideProgressTimeout !== null) {
        clearInterval(hideProgressTimeout);
        hideProgressTimeout = null;
    }
};

const routingModule: Module<RoutingModuleState, any> = {
    state: () => ({
        progress: 0,
        show: false,
    }),
    getters: {
        getRouteProgress: (state) => state.progress,
        getShowRouteProgress: (state) => state.show,
    },
    mutations: {
        SHOW_PROGRESS(state) {
            state.show = true;
        },
        HIDE_PROGRESS(state) {
            state.show = false;
        },
        SET_ROUTE_PROGRESS(state, payload: number) {
            state.progress = payload;
        },
        ADD_ROUTE_PROGRESS(state, payload: number) {
            // prevent progress state from going above 100

            state.progress += payload;
        },
        RESET_ROUTE_PROGRESS(state) {
            state.progress = 0;
        },
    },
    actions: {
        /**
         * Resets the progress back to its initial state before triggering it anew
         */
        startRouteProgress({ state, commit }) {
            stopProgressInterval();
            commit("RESET_ROUTE_PROGRESS");
            commit("SHOW_PROGRESS");
            progressInterval = setInterval(() => {
                // if the progress is less than 40, make the likelihood of faster progress greater, after that slow it down
                const minAddProgress = state.progress < 40 ? 4 : 1;
                // when the progress is past 60, slow it down by incrementing it by 3 instead of 7
                const maxAddProgrss = state.progress < 60 ? 10 : 2;
                // the number to add to the progress
                const addProgress = randNumber(minAddProgress, maxAddProgrss);
                // if the route still did not load, freeze the progress at 95
                if (state.progress + addProgress >= 95) {
                    commit("SET_ROUTE_PROGRESS", 95); // to prevent it from going above 95
                    stopProgressInterval();
                } else {
                    commit("ADD_ROUTE_PROGRESS", addProgress);
                }
            }, 500);
        },
        successfulNavigation({ commit, dispatch }) {
            stopProgressInterval();
            commit("SET_ROUTE_PROGRESS", 100);
            dispatch("hideProgress");
        },
        // instantly stops and hides the progress without waiting 500ms
        instantlyHideProgress({ commit }) {
            stopProgressInterval();
            cancelHideProgressTimeout();
            commit("HIDE_PROGRESS");
            commit("RESET_ROUTE_PROGRESS");
        },
        hideProgress({ commit }) {
            cancelHideProgressTimeout();
            // wait for the animation to finish before hiding the progressbar
            hideProgressTimeout = setTimeout(() => {
                commit("HIDE_PROGRESS");
            }, 500);
        },
    },
};

export default routingModule;
