import { createRouter, createWebHistory, RouteRecordRaw } from "vue-router";
import store from "../store";
// import Home from "../views/Home.vue";
// import NotFound from "../views/NotFound.vue";
// import Wilayas from "../views/Wilayas.vue";
// import Towns from "../views/Towns.vue";
// import Schedule from "../views/Schedule.vue";
// import ScheduleRefactor from "../views/ScheduleRefactor.vue";

const Home = () => import("../views/Home.vue");

const Wilayas = () => import("../views/Wilayas.vue");
const Login = () => import("../views/Login.vue");
const NotFound = () => import("../views/NotFound.vue");
const Towns = () => import("../views/Towns.vue");
const Schedule = () => import("../views/Schedule.vue");
const Settings = () => import("../views/Settings.vue");

const routes: Array<RouteRecordRaw> = [
    {
        path: "/",
        name: "home",
        component: Home,
        redirect: { name: "wilayas" },
        children: [
            {
                path: "/wilayas",
                name: "wilayas",
                components: {
                    content: Wilayas,
                },
            },
            {
                path: "/wilaya/:wilayaId/towns",
                name: "towns",
                components: {
                    content: Towns,
                },
            },
            {
                path: "/wilaya/:wilayaId/town/:townId/schedule",
                name: "schedule",
                components: {
                    content: Schedule,
                },
            },
            {
                path: "/settings",
                name: "settings",
                components: {
                    content: Settings,
                },
            },
        ],
    },
    {
        path: "/login",
        name: "login",
        component: Login,
    },
    { path: "/:pathMatch(.*)*", name: "not-found", component: NotFound },
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
});

router.beforeEach((from, to, next) => {
    store.dispatch("startRouteProgress");
    // check if user is not authenthicaed
    next();
});
router.onError(() => {
    store.dispatch("instantlyHideProgress");
});

router.afterEach((from, to, failure) => {
    if (from.params.code && from.params.code == "401") {
        store.dispatch("instantlyHideProgress");
    }
});

router.beforeResolve(() => {
    store.dispatch("successfulNavigation");
});

export default router;
