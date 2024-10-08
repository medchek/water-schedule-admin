<template>
  <div class="town-card group flex flex-col dark:bg-dark-card bg-white min-h-36 h-36 px-4 pb-4 rounded w-auto relative" @mouseleave="isMenuOpen = false">
    <!-- /MENU -->
    <div class="flex flex-row-reverse absolute right-0 top-2 arabic:flex-row" v-if="!town.protected">
      <!-- DOTS BTN -->
      <button class="dark:text-white hover:text-bgray-700 text-bgray-500" @click="toggleMenu" title="editer ou supprimer cette commune">
        <icon className="h-7 w-7" :icon="mdiDotsVertical" />
      </button>
      <!-- DELETE & EDIT BTNS -->
      <div class="menu flex dark:text-white text-bgray-700 sm:hidden sm:group-hover:flex arabic:flex-row-reverse" v-if="isMenuOpen">
        <!-- EDIT BTN-->
        <button class="focus:bg-bgray-200 w-6 h-7 rounded hover:text-blue-400 focus:text-blue-500" :title="t('general.modify')" @click="emitEdit">
          <icon className="h-5 w-5" :icon="mdiPencil" />
        </button>
        <!-- DELETE BTN-->
        <button class="focus:bg-bgray-200 w-6 h-7 rounded hover:text-red-500 focus:text-red-600" :title="t('general.delete')" @click="emitDelete">
          <icon className="h-5 w-5" :icon="mdiTrashCan" />
        </button>
      </div>
    </div>
    <!-- NAME -->
    <div class="capitalize grow flex items-center justify-center dark:text-white text-bgray-700 font-semibold text-lg 2xl:text-xl">
      {{ isArLocale ? town.arName : town.name }}
    </div>

    <router-link
      :to="{ name: 'schedule', params: { wilayaId: town.wilayaId, townId: town.code } }"
      class="
        flex
        items-center
        justify-center
        bg-gray-100
        hover:bg-blue-100
        focus:bg-bgray-200
        dark:bg-gradient-to-br dark:from-indigo-100 dark:to-white dark:hover:from-white dark:hover:to-indigo-300
        transition-colors
        h-9
        w-full
        font-semibold
        text-blue-400
        dark:text-blue-600 dark:hover:text-blue-800
        rounded-md
      "
    >
      {{ t("town.goToSchedule") }}
    </router-link>
  </div>
</template>

<script lang="ts">
import { computed, defineComponent, PropType, ref } from "vue";
import { Town } from "../../store/modules/towns";
import Icon from "../Icon.vue";
import { mdiDotsVertical, mdiPencil, mdiTrashCan } from "@mdi/js";
import { useI18n } from "vue-i18n";
import { useStore } from "vuex";

export default defineComponent({
  components: { Icon },
  emits: ["edit", "delete"],
  props: {
    town: {
      type: Object as PropType<Town>,
      required: true,
    },
  },
  setup(props, { emit }) {
    const store = useStore();
    const { t } = useI18n();
    const isArLocale = computed(() => store.getters.getIsArLang);
    const isMenuOpen = ref(false);
    const toggleMenu = () => (isMenuOpen.value = !isMenuOpen.value);
    const emitObject = {
      wilayaId: props.town.wilayaId,
      townId: props.town.id,
      townName: isArLocale ? props.town.arName : props.town.name,
      // arTownName: props.town.arName,
    };
    const emitEdit = () => emit("edit", { action: "edit", ...emitObject });
    const emitDelete = () => emit("delete", { action: "delete", ...emitObject });

    return {
      isMenuOpen,
      toggleMenu,
      emitEdit,
      emitDelete,
      // localization
      isArLocale,
      t,
      // icons
      mdiDotsVertical,
      mdiPencil,
      mdiTrashCan,
    };
  },
});
</script>