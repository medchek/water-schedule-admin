<template>
    <div
        id="account-menu-dropdown"
        ref="menuRef"
        class="flex flex-col rounded shadow-lg absolute right-0 arabic:left-0 w-60 h-auto bg-white mt-2 z-[5] p-4"
    >
        <div id="main-menu" class="flex flex-col w-full h-full" v-if="!isOpenableOpen">
            <section class="border-b-2 border-gray-100 pb-2 mb-2 arabic:text-right">
                <p class="font-semibold text-blue-500 capitalize">{{ user.name }}</p>
                <p class="text-sm text-gray-400">{{ user.email }}</p>
            </section>
            <section class="text-bgray-600">
                <account-menu-dropdown-item
                    :icon="mdiWeb"
                    :text="t('settings.lang.label')"
                    openable
                    @click="openOpenable('lang')"
                />
                <account-menu-dropdown-item
                    :icon="mdiBrightness6"
                    :text="t('settings.theme.label')"
                    openable
                    @click="openOpenable('theme')"
                />
                <account-menu-dropdown-item
                    :icon="mdiCogOutline"
                    :text="t('general.settings')"
                    href="/settings"
                    @click.prevent="navigate({ name: 'settings' })"
                />
                <account-menu-dropdown-item
                    :icon="mdiLogout"
                    :text="t('general.logout')"
                    :isLoading="isLogginOut"
                    @click.prevent="logout"
                    href="/logout"
                />
            </section>
        </div>
        <div
            v-else
            id="openable"
            class="flex flex-col w-full h-auto text-bgray-700 arabic:direction-rtl"
        >
            <section
                id="openable-header"
                class="flex items-center h-10 min-h-10 space-x-2 arabic:space-x-reverse border-b-2 border-bgray-100 pb-2 mb-2"
            >
                <!-- menu return -->
                <button
                    class="hover:bg-bgray-100 focus:bg-bgray-200 rounded-lg w-10 h-10"
                    @click="closeOpenable"
                >
                    <icon :icon="mdiChevronLeft" className="w-8 h-8 arabic:rotate-180" />
                </button>
                <span>{{ openableTitle }}</span>
            </section>
            <component @selected="$emit('close')" :is="openableComponent"></component>
        </div>
    </div>
</template>

<script lang="ts">
import { computed, defineAsyncComponent, defineComponent, onMounted, onUnmounted, ref } from "vue";
import { useStore } from "vuex";
import {
    mdiWeb,
    mdiChevronRight,
    mdiBrightness6,
    mdiLogout,
    mdiCogOutline,
    mdiChevronLeft,
} from "@mdi/js";
import Icon from "../Icon.vue";
import AccountMenuDropdownItem from "./AccountMenuDropdownItem.vue";
import Loader from "../Loader.vue";
import { useRouter } from "vue-router";
import { flashSnack } from "../../lib/shared";
import { useI18n } from "vue-i18n";

export default defineComponent({
    emits: ["clickedOutside", "close"],
    components: {
        Icon,
        AccountMenuDropdownItem,
        AccountMenuOpenableThemeMenu: defineAsyncComponent({
            loader: () => import("./AccountMenuOpenableThemeMenu.vue"),
            loadingComponent: Loader,
        }),
        AccountMenuOpenableLanguageMenu: defineAsyncComponent({
            loader: () => import("./AccountMenuOpenableLanguageMenu.vue"),
            loadingComponent: Loader,
        }),
    },
    setup(_, { emit }) {
        const store = useStore();
        const router = useRouter();
        const { t } = useI18n();

        const user = computed(() => store.getters.getUser);
        const isOpenableOpen = ref(false);
        const closeOpenable = () => (isOpenableOpen.value = false);
        const openableComponent = ref("account-menu-openable-theme-menu");
        const openableTitle = ref("Apparence");

        const openOpenable = (component: "theme" | "lang") => {
            openableComponent.value =
                component == "theme"
                    ? "account-menu-openable-theme-menu"
                    : "account-menu-openable-language-menu";
            openableTitle.value =
                component == "theme" ? t("settings.theme.label") : t("settings.lang.label");
            isOpenableOpen.value = true;
        };

        const menuRef = ref<HTMLElement | null>(null);
        const onClickOutside = (e: MouseEvent) => {
            if (menuRef.value === null) return;
            if (e.target !== menuRef.value && !menuRef.value.contains(e.target as Node)) {
                const targetId = (e.target as HTMLElement).id;
                // prevent click outside emit if the open account button was clicked so that it's correctly togglable as intended
                if (targetId != "open-account-menu-button") {
                    emit("clickedOutside");
                }
            }
        };

        onMounted(() => {
            document.body.addEventListener("mousedown", onClickOutside, { capture: true });
        });

        onUnmounted(() =>
            document.body.removeEventListener("mousedown", onClickOutside, { capture: true })
        );

        const isLogginOut = ref(false);
        const logout = async () => {
            isLogginOut.value = true;
            store
                .dispatch("logout", true)
                .then(() => {
                    emit("close");
                    store.commit("RESET_USER");
                    router.replace({ name: "login" });
                    flashSnack({
                        message: t("general.snack.info.logoutSuccess"),
                    });
                })
                .catch(() =>
                    flashSnack({
                        message: t("general.snack.errors.errorWhileLogout"),
                        type: "error",
                    })
                )
                .finally(() => (isLogginOut.value = false));
        };
        const navigate = (to: { name: string }) => {
            router.push(to);
            emit("close");
        };
        return {
            // ref
            menuRef,
            //
            user,
            isOpenableOpen,
            openOpenable,
            closeOpenable,

            openableComponent,
            openableTitle,
            //
            navigate,
            isLogginOut,
            logout,
            // localization
            t,
            // icon
            mdiWeb,
            mdiBrightness6,
            mdiChevronRight,
            mdiLogout,
            mdiCogOutline,
            mdiChevronLeft,
        };
    },
});
</script>
