<template>
  <div class="town-card group flex flex-col bg-white min-h-36 h-36 px-4 pb-4 rounded w-auto relative" @mouseleave="isMenuOpen = false">
    <!-- /MENU -->
    <div class="flex flex-row-reverse absolute right-0 top-2" v-if="!town.protected">
      <button class="hover:text-bgray-700 text-bgray-500" @click="toggleMenu" title="editer ou supprimer cette commune">
        <icon className="h-7 w-7" :icon="mdiDotsVertical" />
      </button>
      <div class="menu flex text-bgray-700 sm:hidden sm:group-hover:flex" v-if="isMenuOpen">
        <button class="focus:bg-bgray-200 w-6 h-7 rounded hover:text-blue-400 focus:text-blue-500" title="editer" @click="emitEdit">
          <icon className="h-5 w-5" :icon="mdiPencil" />
        </button>
        <button class="focus:bg-bgray-200 w-6 h-7 rounded hover:text-red-500 focus:text-red-600" title="supprimer" @click="emitDelete">
          <icon className="h-5 w-5" :icon="mdiTrashCan" />
        </button>
      </div>
    </div>
    <!-- NAME -->
    <div class="capitalize flex-grow flex items-center justify-center text-bgray-700 font-semibold text-lg 2xl:text-xl">{{ town.name }}</div>

    <router-link
      :to="{ name: 'schedule', params: { wilayaId: town.wilayaId, townId: town.code } }"
      class="
        flex
        items-center
        justify-center
        bg-gray-100
        hover:bg-blue-100
        focus:bg-bgray-200
        transition-colors
        h-9
        w-full
        font-semibold
        text-blue-400
        rounded-md
      "
    >
      Programme d'eau
    </router-link>
  </div>
</template>

<script lang="ts">
import { defineComponent, onMounted, PropType, ref } from "vue";
import { Town } from "../../store/modules/towns";
import Icon from "../Icon.vue";
import { mdiDotsVertical, mdiPencil, mdiTrashCan } from "@mdi/js";

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
    const isMenuOpen = ref(false);
    const toggleMenu = () => (isMenuOpen.value = !isMenuOpen.value);
    const emitObject = {
      wilayaId: props.town.wilayaId,
      townId: props.town.id,
      townName: props.town.name,
      arTownName: props.town.arName,
    };
    const emitEdit = () => emit("edit", { action: "edit", ...emitObject });
    const emitDelete = () => emit("delete", { action: "delete", ...emitObject });

    return {
      isMenuOpen,
      toggleMenu,
      emitEdit,
      emitDelete,
      // icons
      mdiDotsVertical,
      mdiPencil,
      mdiTrashCan,
    };
  },
});
</script>