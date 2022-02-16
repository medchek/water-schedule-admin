<template>
    <view-container :label="t('general.wilayas')">
        <section
            id="towns-toolbar"
            class="flex flex-col lg:flex-row lg:arabic:flex-row-reverse lg:items-center justify-end lg:h-14 w-full mb-2 px-5 space-y-2 lg:space-y-0"
        >
            <app-input
                spellcheck="false"
                maxlength="50"
                className="h-10 text-sm sm:text-base w-full lg:w-80 "
                v-model.trim.lazy="searchTerm"
                :appendIcon="mdiMagnify"
                :placeholder="t('wilaya.searchForWilaya')"
                clearable
            />
        </section>
        <section id="content-main" class="relative w-full h-full grow overflow-y-auto py-2 my-2">
            <load-and-retry
                v-if="isFetching || fetchingError"
                @retry="fetchWilayas"
                :hasFailed="fetchingError"
                :isFetching="isFetching"
                :text="t('wilaya.errorFetching')"
            />
            <!-- SUCCESS -->

            <div
                class="relative grid arabic:direction-rtl grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 grid-rows-none gap-4 w-full h-auto px-5"
                v-if="!isFetching && !fetchingError && wilayas"
            >
                <wilaya-card v-for="wilaya in wilayas" :wilaya="wilaya" :key="wilaya.code" />
            </div>
            <!-- SUCCESS BUT NO SEARCH RESULT -->

            <div v-if="!isFetching && !fetchingError && searchTerm.length && !wilayas.length" class="w-full text-center text-lg text-bgray-700 font-bold">
                <p>{{ t("wilaya.noSearchMatch") }}.</p>
            </div>
        </section>
    </view-container>
</template>
<script lang="ts">
import { computed, defineComponent, onMounted, ref, ComputedRef } from "vue";
import { useStore } from "vuex";
import AppInput from "../components/AppInput.vue";
import Loader from "../components/Loader.vue";
import Retry from "../components/Retry.vue";
import WilayaCard from "../components/wilaya/WilayaCard.vue";
import ViewContainer from "../components/ViewContainer.vue";

import { Wilaya } from "../store/modules/wilayas";

import { mdiMagnify } from "@mdi/js";
import { useI18n } from "vue-i18n";

export default defineComponent({
    components: { Loader, WilayaCard, LoadAndRetry: Retry, AppInput, ViewContainer },
    setup() {
        const { t } = useI18n();
        const store = useStore();
        const isFetching = ref<boolean>(false);
        const fetchingError = ref<boolean>(false);

        const searchTerm = ref<string>("");
        const isAuth = computed(() => store.getters.getUser);

        const allWilayas: ComputedRef<Wilaya[]> = computed(() => store.getters.getWilayas);
        const wilayas: ComputedRef<Wilaya[]> = computed(() => store.getters.getFilteredWilayas(searchTerm.value));

        const fetchWilayas = () => {
            isFetching.value = true;
            if (fetchingError.value) fetchingError.value = false;
            store
                .dispatch("fetchWilayas")
                .catch(() => {
                    if (!fetchingError.value) fetchingError.value = true;
                })
                .finally(() => {
                    isFetching.value = false;
                });
        };
        onMounted(() => {
            if (isAuth === null) return;
            // if wilayas have already been loaded from the server
            if (allWilayas.value.length) return;
            // otherwise, fetch for the wilayas
            fetchWilayas();
        });

        return { fetchWilayas, isFetching, fetchingError, wilayas, searchTerm, mdiMagnify, t };
    },
});
</script>
