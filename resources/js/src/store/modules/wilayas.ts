import { Module } from "vuex";
import { axios } from "../../lib/shared";

export interface Wilaya {
    id: number;
    name: string;
    arName: string;
    code: number;
}

interface WilayasModuleState {
    wilayas: Wilaya[];
}

const userModule: Module<WilayasModuleState, any> = {
    state: () => ({
        wilayas: [],
    }),
    getters: {
        getWilayas: (state) => {
            return state.wilayas;
        },

        getFilteredWilayas: (state, _, __, rootGetters) => (rawWilayaName: string) => {
            const wilayaName = rawWilayaName.trim().toLowerCase();
            // if the wilayaName is not present, return the whole list
            if (!wilayaName.length || parseInt(wilayaName) == 0) return state.wilayas;
            // if user searches for wilaya code, return by code instead of by name
            if (/^[0-9]{1,2}$/gi.test(wilayaName)) {
                const wilayaCode = parseInt(wilayaName);
                // if the wilaya code is between 1 and the biggest code in the wilaya list
                if (wilayaCode >= 1 && wilayaCode <= state.wilayas[state.wilayas.length - 1].code) {
                    return state.wilayas.filter((wilaya) => wilaya.code === wilayaCode);
                }
            } else {
                const targetName = rootGetters.getLanguage == "ar" ? "arName" : "name";
                return state.wilayas.filter((wilaya: Wilaya) => wilaya[targetName].toLowerCase().includes(wilayaName));
            }
        },
        getWilayaByCode:
            (state) =>
            (wilayaCode: number): Wilaya | undefined =>
                state.wilayas.find((wilaya) => wilaya.code === wilayaCode),
    },
    mutations: {
        SET_WILAYAS(state, payload: Wilaya[]) {
            state.wilayas = payload;
        },
    },

    actions: {
        async fetchWilayas({ commit }) {
            try {
                const response = await axios("/api/wilayas");
                if (response.status === 200) {
                    commit("SET_WILAYAS", response.data);
                    return true;
                } else {
                    throw new Error(`[fetchWilayas] unexpected response status from the server: code ${response.status}`);
                }
            } catch (err) {
                throw new Error(`Failed to get wilayas data from api => ${err}`);
            }
        },
    },
};

export default userModule;
