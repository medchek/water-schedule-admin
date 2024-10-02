import { axios } from "./../lib/shared";
import { createRouter, createWebHistory, RouteRecordRaw } from "vue-router";
import store from "../store";
import { loadLocaleMessages } from "../locales";

const Home = () => import("../views/Home.vue");
const Wilayas = () => import("../views/Wilayas.vue");
const Login = () => import("../views/Login.vue");
const Signup = () => import("../views/Signup.vue");
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
    {
        path: "/install",
        name: "install",
        component: Signup,
        beforeEnter: async (from, to, next) => {
            try {
                await axios.get("/api/can-install");
                next();
            } catch (err: any) {
                const responseText: string | undefined = err.response.data;
                if (responseText && responseText === "already logged") {
                    next({ name: "wilayas", replace: true });
                } else {
                    next({ name: "login", replace: true });
                }
            }

            // store.dispatch("fetchUser");
        },
    },
    { path: "/:pathMatch(.*)*", name: "not-found", component: NotFound },
];

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes,
});

router.beforeEach(async (_, __, next) => {
    try {
        store.dispatch("startRouteProgress");
        await loadLocaleMessages(store.getters.getLanguage);
    } catch (e) {
        console.error("[beforeEach] Could not load locales");
    } finally {
        next();
    }
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
