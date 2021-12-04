import { createRouter, createWebHistory, RouteRecordRaw } from "vue-router";
import Home from "../views/Home.vue";
import Login from "../views/Login.vue";
// import NotFound from "../views/NotFound.vue";
import Wilayas from "../views/Wilayas.vue";
// import Towns from "../views/Towns.vue";
// import Schedule from "../views/Schedule.vue";
// import ScheduleRefactor from "../views/ScheduleRefactor.vue";

const NotFound = () => import("../views/NotFound.vue");
const Towns = () => import("../views/Towns.vue");
const Schedule = () => import("../views/Schedule.vue");

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
            // {
            //     path: "/wilaya/:wilayaId/town/:townId/schedule/refactored",
            //     name: "schedule-ref",
            //     components: {
            //         content: ScheduleRefactor,
            //     },
            //     beforeEnter() {
            //         console.clear();
            //         console.warn(
            //             "[ScheduleRefactor] this route serves as a ground for upgrading the form handling logic to be at vuex level, bringing a harmony between data fetched from the server and the processing of said data at the component level. After the task is complete, this should replace the current schedule route which handles the form at the component level"
            //         );
            //     },
            // },
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

// router.beforeEach((to, from, next) => {});

export default router;
