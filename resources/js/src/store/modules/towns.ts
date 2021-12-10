import { sortArrayOfObjects } from "./../../lib/utils";
import { AxiosResponse } from "axios";
import { Wilaya } from "./wilayas";
import { Module } from "vuex";
import { axios } from "../../lib/shared";

export interface Town {
    id: number;
    name: string;
    arName: string;
    code: number;
    wilayaId: number;
    protected: boolean;
}
/**
 * used on town getters to include the index at which the town was found within the array
 */
export interface TownSearch extends Town {
    index: number;
}
export interface Towns {
    [wilayaId: number]: Town[];
}

export interface AddTownRequest {
    wilayaId: number;
    name: string;
    arName?: string;
}

interface TownResponse {}
interface WilayasModuleState {
    towns: Towns;
}

export interface UpdateTownRequst {
    townId: number;
    name?: string;
    arName?: string;
}

interface TownDeleteResponse {
    wilayaId: number;
    townId: number;
}

const userModule: Module<WilayasModuleState, any> = {
    state: () => ({
        towns: {},
    }),
    getters: {
        getTownsByWilayaId:
            (state) =>
            (wilayaId: number): Town[] | undefined => {
                return state.towns[wilayaId];
            },
        getSortedTownsByWilayaId:
            (state) =>
            (wilayaId: number): Town[] | undefined => {
                if (!state.towns[wilayaId]) return undefined;
                return sortArrayOfObjects(state.towns[wilayaId], "name");
            },
        getTownById:
            (state) =>
            (wilayaId: number | string, townId: number | string): TownSearch | undefined => {
                if (typeof wilayaId === "string") wilayaId = parseInt(wilayaId);
                if (typeof townId === "string") townId = parseInt(townId);
                const towns = state.towns[wilayaId];

                if (towns === undefined) return undefined;
                // t as in town
                const townIndex = towns.findIndex((t) => t.id === townId);
                if (townIndex > -1) {
                    const town = towns[townIndex];
                    return { index: townIndex, ...town };
                } else {
                    return undefined;
                }
            },

        doesTownExist:
            (state) =>
            (wilayaId: number | string, townName: string, arab = false): boolean => {
                if (typeof wilayaId === "string") wilayaId = parseInt(wilayaId);
                const towns = state.towns[wilayaId];

                if (towns === undefined) return false;
                const targetProperty = !arab ? "name" : "arName";
                // t as in town
                return towns.find((t) => t[targetProperty] && t[targetProperty].toLowerCase() == townName.toLowerCase()) !== undefined;
            },

        getFilteredTowns: (state) => (townName: string) => {},
    },
    mutations: {
        ADD_TOWNS(state, payload: { wilayaId: number; towns: Town[] }) {
            state.towns[payload.wilayaId] = payload.towns;
        },
        ADD_SAVED_TOWN(state, payload: Town) {
            if (Object.prototype.hasOwnProperty.call(state.towns, payload.wilayaId)) {
                state.towns[payload.wilayaId].push(payload);
            } else {
                state.towns[payload.wilayaId] = [];
                state.towns[payload.wilayaId][0] = payload;
            }
        },
        UPDATE_TOWN(state, payload: Town) {
            // console.log("UPDATE_TOWN payload => ", payload);

            const townIndex = state.towns[payload.wilayaId].findIndex((town) => town.id === payload.id);
            console.log("UPDATE_TOWN", townIndex);
            if (townIndex >= 0) {
                state.towns[payload.wilayaId][townIndex].name = payload.name;
                state.towns[payload.wilayaId][townIndex].arName = payload.arName;
            }
        },
        DELETE_TOWN(state, payload: TownDeleteResponse) {
            const { wilayaId, townId } = payload;
            const townIndex = state.towns[payload.wilayaId].findIndex((town) => town.id === townId);
            if (townIndex >= 0) {
                state.towns[wilayaId].splice(townIndex, 1);
            }
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
                    await dispatch("fetchWilayas");
                }
                const response: AxiosResponse<Town> = await axios(`/api/wilayas/${wilayaId}/towns`);

                commit("ADD_TOWNS", { wilayaId, towns: response.data });

                return response.status;
                // throw new Error(`[fetchTowns] unexpected response status from the server: code ${response.status}`);
            } catch (err) {
                // err.response.status
                throw new Error(`[fetchTowns] Failed to get towns data from api => ${err}`);
            }
        },
        async saveTown({ commit }, payload: AddTownRequest) {
            try {
                console.log("ADDING A NEW TOWN", payload);

                const response: AxiosResponse<Town> = await axios.post("api/towns", payload);

                commit("ADD_SAVED_TOWN", response.data);
                console.log("successfully saved town", response.data);
                return response;
            } catch (error: any) {
                console.error("[saveTown] saving error response: ", error.response.data);
                throw new Error(`[saveTown] error while saving the town: ${error}`);
            }
        },
        async updateTown({ commit }, payload: UpdateTownRequst) {
            try {
                const { townId, ...updateBody } = payload;
                // console.warn("updateTown body => ", payload);
                const response: AxiosResponse<Town> = await axios.patch(`api/towns/${payload.townId}`, updateBody);
                commit("UPDATE_TOWN", response.data);
                console.log("successfully updated town", response.data);

                return response;
            } catch (error: any) {
                console.error("[updateTown] updating error response: ", error.response.data);
                throw new Error(`[updateTown] error while updating the town: ${error}`);
            }
        },
        async deleteTown({ commit }, id: number) {
            try {
                // console.log("deleting town id=", id);

                const response: AxiosResponse<TownDeleteResponse> = await axios.delete(`api/towns/${id}`);

                commit("DELETE_TOWN", response.data);
                console.log("successfully deleted town: ", response.data);

                return response;
            } catch (error: any) {
                console.error("[deleteTown] deleting error response: ", error.response.data);
                throw new Error(`[deleteTown] error while deleting the town: ${error}`);
            }
        },
    },
};

export default userModule;
