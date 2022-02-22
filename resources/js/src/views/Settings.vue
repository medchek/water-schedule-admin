<template>
    <view-container :label="t('general.settings')">
        <div
            id="settings-base"
            class="overflow-hidden flex flex-col lg:flex-row lg:arabic:flex-row-reverse grow h-full w-full"
        >
            <section
                id="settings-selectors"
                class="flex lg:flex-col items-center lg:h-full w-full lg:w-72 lg:min-w-72 xl:w-80 xl:min-w-80 2xl:w-90 2xl:min-w-90 space-x-4 lg:space-x-0 lg:space-y-4 pr-5 lg:pt-5 mb-5 px-5"
            >
                <setting-selector-button
                    v-for="setting in settingsList"
                    :key="setting.component"
                    :isSelected="selectedComponent == setting.component"
                    :icon="setting.icon"
                    @click="selectSettings(setting.component)"
                    >{{ setting.label }}</setting-selector-button
                >
                <!-- <setting-selector-button :isSelected="selectedComponent == 'ui'" :icon="mdiViewDashboard" @click="selectSettings('ui')"
          >Interface</setting-selector-button
        > -->
            </section>
            <section class="overflow-auto grow h-full lg:px-4 px-5 pb-3 lg:pt-4">
                <component :is="selectedComponentName"></component>
            </section>
        </div>
    </view-container>
</template>

<script lang="ts">
import { computed, ComputedRef, defineAsyncComponent, defineComponent, ref } from "vue";
import SettingSelectorButton from "../components/settings/SettingSelectorButton.vue";
import ViewContainer from "../components/ViewContainer.vue";
import SettingsPassword from "../components/settings/SettingsPassword.vue";
import { SettingsList, SettingsComponent } from "../types/components";
import FlexibleLoader from "../components/FlexibleLoader.vue";
// icons
import { mdiLockOutline, mdiViewDashboard, mdiBrightness4 } from "@mdi/js";
import { useI18n } from "vue-i18n";

export default defineComponent({
    components: {
        ViewContainer,
        SettingSelectorButton,
        SettingsUi: defineAsyncComponent({
            loader: () => import("../components/settings/SettingsUi.vue"),
            loadingComponent: FlexibleLoader,
        }),
        SettingsTheme: defineAsyncComponent({
            loader: () => import("../components/settings/SettingsTheme.vue"),
            loadingComponent: FlexibleLoader,
        }),
        SettingsPassword,
    },
    setup() {
        const { t } = useI18n();
        const settingsList: ComputedRef<SettingsList> = computed(() => [
            { label: t("settings.password.label"), component: "password", icon: mdiLockOutline },
            { label: t("settings.ui.label"), component: "ui", icon: mdiViewDashboard },
            { label: t("settings.theme.label"), component: "theme", icon: mdiBrightness4 },
        ]);

        const selectSettings = (component: SettingsComponent) => {
            selectedComponent.value = component;
        };

        const selectedComponent = ref<SettingsComponent>("password");
        const selectedComponentName = computed<string>(() => "settings-" + selectedComponent.value);
        return {
            settingsList,
            selectSettings,
            selectedComponent,
            selectedComponentName,
            // localization
            t,
        };
    },
});
</script>
