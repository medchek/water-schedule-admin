import { Module } from "vuex";
import { axios } from "../../lib/shared";

interface User {
    id: number;
    email: string;
    name: string;
}

interface UserModuleState {
    user: User | null;
}

const userModule: Module<UserModuleState, any> = {
    state: () => ({
        user: null,
    }),
    getters: {
        getUser: (state) => state.user,
    },
    mutations: {
        SET_USER(state, payload: User) {
            state.user = payload;
        },
        RESET_USER(state) {
            if (state.user !== null) state.user = null;
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
    },
};

export default userModule;
