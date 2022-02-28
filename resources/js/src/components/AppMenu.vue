<template>
    <!-- Overlay -->
    <transition name="fade">
        <div
            id="menu-overlay"
            class="absolute lg:hidden w-full h-full top-0 left-0 ring-0 blur-0 bg-bgray-700/50 dark:bg-gray-900/80 z-10"
            v-if="renderMenu"
        ></div>
    </transition>
    <!-- END OVERLAY -->
    <transition :name="slideAnimationName">
        <section
            ref="menuRef"
            id="menu"
            class="absolute lg:relative arabic:right-0 h-full z-10 flex flex-col min-w-72 md:min-w-64 2xl:min-w-80 bg-gradient-to-bl from-blue-400 to-blue-900 dark:from-dark-menu dark:to-dark-alt text-white shadow"
            v-if="renderMenu"
        >
            <div
                id="logo"
                class="flex arabic:flex-row-reverse items-center justify-start text-3xl font-bold italic w-full h-12 xl:h-14 bg-gradient-to-tr from-blue-50 to-white dark:from-dark-header dark:to-dark-header px-4 text-bgray-700 dark:text-white space-x-2 arabic:space-x-reverse"
            >
                <button
                    id="close-menu"
                    class="lg:hidden w-9 h-9 focus:bg-bgray-100 text-bgray-700 rounded"
                    @click="toggleMenu"
                >
                    <Icon :icon="mdiMenu" className="w-8 h-8" />
                </button>
                <p>SEAAL</p>
            </div>
            <div id="menu-links" class="flex flex-col grow w-full py-5 px-2 md:px-4">
                <div class="grow space-y-3">
                    <menu-link :icon="mdiMapOutline" to="/wilayas">{{
                        t("general.wilayas")
                    }}</menu-link>
                    <menu-link :icon="mdiMapMarkerRadius" :to="townLink">{{
                        t("general.towns")
                    }}</menu-link>
                    <menu-link :icon="mdiClockOutline" :to="scheduleLink">{{
                        t("general.schedule")
                    }}</menu-link>
                </div>
                <div class="space-y-3">
                    <menu-link :icon="mdiCogOutline" to="/settings">{{
                        t("general.settings")
                    }}</menu-link>
                    <menu-link
                        :icon="mdiLogout"
                        to="/logout"
                        :prevent="logout"
                        :isLoading="isLogoutLoading"
                        >{{ t("general.logout") }}</menu-link
                    >
                </div>
            </div>
        </section>
    </transition>
    <!-- APP HEADER WHEN THE SIDE MENU IS CLOSED -->
    <div
        id="responive-app-header"
        class="lg:hidden grow-0 arabic:flex-row-reverse flex justify-between items-center w-full min-h-12 bg-white px-4 mb-2"
    >
        <div
            class="flex items-center justify-start space-x-2 arabic:space-x-reverse arabic:flex-row-reverse text-bgray-700"
        >
            <button id="close-menu" class="w-9 h-9 focus:bg-bgray-100 rounded" @click="toggleMenu">
                <Icon :icon="mdiMenu" className="w-8 h-8" />
            </button>
            <p class="text-3xl 2xl:text-4xl italic font-bold">SEAAL</p>
        </div>
        <account-menu forceLight />
    </div>
    <!-- END APP HEADER -->
</template>

<script lang="ts">
import { computed, ComputedRef, defineComponent, onMounted, onUnmounted, ref, watch } from "vue";
import {
    mdiMapOutline,
    mdiMapMarkerRadius,
    mdiClockOutline,
    mdiLogout,
    mdiMenu,
    mdiCogOutline,
} from "@mdi/js";
import MenuLink from "./AppMenuLink.vue";
import Icon from "./Icon.vue";

import { useRouter } from "vue-router";
import { useStore } from "vuex";
import { Town } from "../store/modules/towns";
import { Settings } from "../store/modules/user";
import { useI18n } from "vue-i18n";
import AccountMenu from "./account-menu/AccountMenu.vue";

export default defineComponent({
    components: {
        Icon,
        MenuLink,
        AccountMenu,
    },
    setup() {
        const { t } = useI18n();
        const router = useRouter();
        const store = useStore();
        const userSettings: ComputedRef<Settings | null> = computed(
            () => store.getters.getUserSettings
        );

        const scheduleLink = computed(() => {
            const routeName = router.currentRoute.value.name;
            const { wilayaId, townId } = router.currentRoute.value.params;

            // if the user settings are set, always prioritez them
            if (userSettings.value)
                return `/wilaya/${userSettings.value.wilayaCode}/town/${userSettings.value.townCode}/schedule`;
            // depending on the route name (either /wilaya/n/towns = town or /wilaya/n/town/n/schedule = schedule)
            switch (routeName) {
                case "towns": //
                    const towns: Town[] | undefined = store.getters.getTownsByWilayaId(wilayaId);
                    // if the towns are not present for the current wilaya or settings are not yet set, lead to the default route i.e. Alger-centre
                    if (!towns || !towns.length) return "/wilaya/16/town/16001/schedule";
                    // otherwise send to the first available town code in the town list
                    else return `/wilaya/${wilayaId}/town/${towns[0].code}/schedule`;

                // if the user is on the schedule route, and the settings are not set, return the link for the current page
                // i.e. user stays on the same page
                case "schedule":
                    return `/wilaya/${wilayaId}/town/${townId}/schedule`;
                // default schedule link if anything goes off
                default:
                    return "/wilaya/16/town/16001/schedule";
            }
        });

        const townLink = computed(() => {
            const routeName = router.currentRoute.value.name;
            const { wilayaId } = router.currentRoute.value.params;

            if (userSettings.value) return `/wilaya/${userSettings.value.wilayaCode}/towns`;

            switch (routeName) {
                case "towns":
                    return `/wilaya/${wilayaId}/towns`;

                case "schedule":
                    return `/wilaya/${wilayaId}/towns`;

                default:
                    return "/wilaya/16/towns/";
            }
        });

        const isMenuOpen = ref<boolean>(true);
        const toggleMenu = () => {
            isMenuOpen.value = !isMenuOpen.value;
        };

        const isLogoutLoading = ref<boolean>(false);
        const logout = () => {
            // start loading
            isLogoutLoading.value = true;
            store
                .dispatch("logout")
                .then(() => {
                    router.replace({ name: "login" });
                    store.dispatch("flashSnack", {
                        message: t("general.snack.info.logoutSuccess"),
                        type: "info",
                    });
                })
                .catch((err) => {
                    const status = err.response.status;
                    if (status && status == 419 /* || status == 401 */) {
                        store.dispatch("flashSnack", {
                            message: t("general.snack.info.logoutSuccess"),

                            type: "info",
                        });
                    } else {
                        // if it's another error, show a generic message
                        store.dispatch("flashSnack", {
                            message: t("general.snack.errors.errorWhileLogout"),
                            time: 5000,
                            type: "error",
                        });
                    }
                    throw new Error(`Error while logging out: ${err}`);
                })
                .finally(() => (isLogoutLoading.value = false));
        };
        const windowWidth = ref<number>(window.innerWidth);
        let resizeTimeout: ReturnType<typeof setTimeout> | null = null;
        const onResize = (): void => {
            // debouncing
            if (resizeTimeout) clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => {
                // console.log("window resized!");q
                windowWidth.value = window.innerWidth;
            }, 100);
        };

        onMounted(() => {
            window.addEventListener("resize", onResize);
        });

        onUnmounted(() => {
            window.removeEventListener("resize", onResize);
        });

        // if the window is sm:640 md:768px lg:1024px
        const shouldMenuBeAbsolute = computed(() => windowWidth.value <= 1024);

        const renderMenu = computed(() => {
            // if the screen is >= lg display the menu regardless if it was hidden or not
            if (!shouldMenuBeAbsolute.value) {
                return true;
            } else {
                // otherwise, follow the regular menu state
                return isMenuOpen.value;
            }
        });

        const menuRef = ref<HTMLElement | null>(null);
        const onClickOutside = (e: MouseEvent) => {
            if (menuRef.value) {
                if (menuRef.value.contains(e.target as Node)) {
                    return;
                } else {
                    // close the menu when clicked outside of the menu
                    isMenuOpen.value = false;
                }
            }
        };

        watch(
            shouldMenuBeAbsolute,
            (newVal) => {
                if (newVal) {
                    document.body.addEventListener("mousedown", onClickOutside, { capture: true });
                } else {
                    document.body.removeEventListener("mousedown", onClickOutside, {
                        capture: true,
                    });
                }
            },
            { immediate: true }
        );
        // if ar lang slide the menu from/to the right when it's absolute
        const slideAnimationName = computed(() => {
            const isAr: boolean = store.getters.getIsArLang;
            return isAr ? "slide-right" : "slide";
        });
        // console.log(internalInstance?.appContext.config.globalProperties);
        return {
            mdiMapOutline,
            mdiMapMarkerRadius,
            mdiClockOutline,
            mdiLogout,
            mdiMenu,
            logout,
            isLogoutLoading,
            isMenuOpen,
            toggleMenu,
            renderMenu,
            menuRef,
            scheduleLink,
            townLink,
            // animation
            slideAnimationName,
            // icons
            mdiCogOutline,
            // i18n
            t,
        };
    },
});
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.2s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
/* regular left slide */

.slide-enter-active {
    animation: slide 0.3s;
}
.slide-leave-active {
    animation: slide 0.3s reverse;
}
/* right slide */
.slide-right-enter-active {
    animation: slide-right 0.3s;
}
.slide-right-leave-active {
    animation: slide-right 0.3s reverse;
}

@keyframes slide {
    from {
        transform: translateX(-400px);
    }
    to {
        transform: translateX(0);
    }
}
@keyframes slide-right {
    from {
        transform: translateX(400px);
    }
    to {
        transform: translateX(0);
    }
}
</style>
