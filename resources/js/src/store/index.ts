import { createStore, createLogger } from "vuex";
import ui from "./modules/ui";
import user from "./modules/user";
import wilayas from "./modules/wilayas";
import towns from "./modules/towns";
import schedules from "./modules/schedules";
import routing from "./modules/routing";

export default createStore({
    modules: {
        ui,
        user,
        wilayas,
        towns,
        schedules,
        routing,
    },
    // plugins: [createLogger()],
});
