import { AxiosResponse } from "axios";
import { Module } from "vuex";
import { axios } from "../../lib/shared";

export interface Settings {
    wilayaCode: number;
    townCode: number;
}
interface User {
    id: number;
    email: string;
    name: string;
    settings: Settings | null;
}

export interface ResetPasswordPayload {
    currentPassword: string;
    newPassword: string;
    newPasswordConfirmation: string;
}
export interface SaveUserSettingsPayload {
    wilayaCode: number;
    townCode: number;
}
interface UserModuleState {
    user: User | null;
    sessionExpired: boolean;
}

const userModule: Module<UserModuleState, any> = {
    state: () => ({
        user: null,
        sessionExpired: false,
    }),
    getters: {
        getUser: (state) => state.user,
        getUserSettings: (state) => (state.user ? state.user.settings : null),
        getIsSessionExpired: (state) => state.sessionExpired,
    },
    mutations: {
        SET_USER(state, payload: User) {
            state.user = payload;
        },
        RESET_USER(state) {
            if (state.user !== null) state.user = null;
        },
        SAVE_USER_SETTINGS(state, payload: Settings) {
            if (state.user !== null) state.user.settings = payload;
        },
        SET_SESSION_EXPIRED(state, value = true) {
            state.sessionExpired = value;
        },
    },

    actions: {
        async fetchUser({ commit }) {
            try {
                const response = await axios("/api/user");
                // console.log("response =>", response);
                if (response.status === 200) {
                    commit("SET_USER", response.data.data);
                    return true;
                } else {
                    commit("RESET_USER");
                    throw new Error("Cound not get the user");
                }
            } catch (err) {
                commit("RESET_USER");
                throw new Error(`Failed authentication check => ${err}`);
            }
        },
        async logout({ commit }, noAutoReset = false) {
            try {
                const response = await axios.post("/logout");
                if (response.status === 204) {
                    if (!noAutoReset) {
                        // delete the user state
                        commit("RESET_USER");
                    }
                }
                return response;
            } catch (err) {
                console.error("user.ts@logout error => ", err);
                throw err;
            }
        },
        async resetPassword(_, payload: ResetPasswordPayload) {
            try {
                const request = {
                    current_password: payload.currentPassword,
                    new_password: payload.newPassword,
                    new_password_confirmation: payload.newPasswordConfirmation,
                };
                const response = await axios.patch("/api/settings/reset-password", request);
                return response;
            } catch (err) {
                throw err;
            }
        },

        async saveUserSettings({ commit, state }, payload: SaveUserSettingsPayload) {
            try {
                const requestMethod: "post" | "patch" = state.user?.settings ? "patch" : "post";
                const request = {
                    wilaya_code: payload.wilayaCode,
                    town_code: payload.townCode,
                };

                const response: AxiosResponse<Settings> = await axios[requestMethod]("/api/settings/user-settings", request);
                commit("SAVE_USER_SETTINGS", response.data);
            } catch (err) {
                console.error("user.ts@saveuserSettings =>", err);
                throw err;
            }
        },
    },
};

export default userModule;
