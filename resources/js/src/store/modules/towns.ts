import { Wilaya } from "./wilayas";
import { Module } from "vuex";
import { axios } from "../../lib/shared";

export interface Town {
    id: number;
    name: string;
    ar_name: string;
    code: number;
    wilaya_id: number;
}
export interface Towns {
    [wilayaId: number]: Town[];
}

interface WilayasModuleState {
    towns: Towns;
}

const userModule: Module<WilayasModuleState, any> = {
    state: () => ({
        towns: [],
    }),
    getters: {
        getTownsByWilayaId:
            (state) =>
            (wilayaId: number): Town[] | undefined => {
                return state.towns[wilayaId];
            },
        getFilteredTowns: (state) => (townName: string) => {},
    },
    mutations: {
        ADD_TOWNS(state, payload: { wilayaId: number; towns: Town[] }) {
            state.towns[payload.wilayaId] = payload.towns;
        },
    },

    actions: {
        async fetchTowns({ commit, rootGetters, dispatch }, payload: { wilayaId: string }) {
            // console.log("payload", payload);
            const wilayaId = parseInt(payload.wilayaId);
            try {
                // the wilaya name is required to be displayed in the top of the Towns component, therefore, we need to request the data of the wilayas if it's not already present (upon a full browser refresh while in the towns route)
                if (!(rootGetters.getWilayas as Wilaya[]).length) {
                    // fetch for all the wilaya firsh
                    dispatch("fetchWilayas");
                }
                const response = await axios(`/api/wilayas/${wilayaId}/towns`);
                if (response.status === 200) {
                    // console.log("[fetchTowns 200 response]", response.data);
                    commit("ADD_TOWNS", { wilayaId, towns: response.data });
                }
                return response.status;
                // throw new Error(`[fetchTowns] unexpected response status from the server: code ${response.status}`);
            } catch (err) {
                // err.response.status
                throw new Error(`Failed to get towns data from api => ${err}`);
            }
        },
    },
};

export default userModule;
