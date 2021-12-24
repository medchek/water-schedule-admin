<template>
  <transition name="snack">
    <div
      v-if="snack.isShown"
      id="snack"
      class="
        w-11/12
        sm:w-3/5
        md:w-1/2
        2xl:w-2/5
        min-h-14
        h-14
        flex
        py-2
        pr-2
        pl-3
        items-center
        justify-between
        absolute
        bottom-5
        right-0
        left-0
        mx-auto
        shadow-lg
        rounded
        overflow-hidden
        text-sm
        lg:text-base
        z-100
        arabic:direction-rtl arabic:pr-3
      "
      :class="snack.type === 'error' ? 'bg-red-100 text-red-500 ' : 'text-bgray-700 bg-gradient-to-bl to-blue-50 from-bgray-100'"
    >
      <p class="grow font-semibold py-2 my-2">{{ snack.message }}</p>
      <button
        v-if="closable"
        class="min-w-8 w-6 lg:w-10 h-full"
        :class="[snack.type === 'error' ? 'focus:bg-red-50' : 'focus:bg-blue-100']"
        @click="closeSnack"
      >
        <Icon :icon="mdiClose" class="w-6 h-6" />
      </button>
    </div>
  </transition>
</template>


<script lang="ts">
import { computed, defineComponent } from "vue";
import Icon from "./Icon.vue";
import { mdiClose } from "@mdi/js";
import { useStore } from "vuex";

export default defineComponent({
  props: {
    closable: {
      type: Boolean,
      default: true,
    },
  },
  setup() {
    const store = useStore();
    const snack = computed(() => store.getters.getSnack);
    const closeSnack = () => store.commit("HIDE_SNACK");
    return { mdiClose, closeSnack, snack };
  },
  components: { Icon },
});
</script>

<style scoped>
.snack-enter-active {
  animation: snack 0.2s;
}
.snack-leave-active {
  animation: snack 0.2s reverse;
}
@keyframes snack {
  from {
    position: fixed;
    opacity: 0;
    transform: translateY(100px);
  }
  to {
    position: fixed;
    opacity: 1;
    transform: translateY(0);
  }
}
</style>