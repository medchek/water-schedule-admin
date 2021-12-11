<template>
  <router-link :to="to" custom active-class="bg-blue-50/10" v-slot="{ route, href, navigate }">
    <a
      class="
        flex
        items-center
        space-x-3
        justify-start
        w-full
        h-10
        2xl:h-12
        font-semibold
        text-sm
        md:text-base
        2xl:text-lg
        transition-colors
        hover:bg-blue-50/20
        rounded
        md:px-4
        px-2
        text-white
      "
      :class="route.name == $route.name && 'bg-blue-50/10 is-active-link'"
      :href="href"
      @click.prevent="navigateTo(navigate)"
    >
      <icon :icon="icon" class="h-6 w-6 2xl:w-7 2xl:h-7" v-if="!isLoading" />
      <loader dark thin class="h-6 w-6" v-else />
      <span>
        <slot></slot>
      </span>
    </a>
  </router-link>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import Icon from "./Icon.vue";
import Loader from "./Loader.vue";
export default defineComponent({
  components: {
    Icon,
    Loader,
  },
  props: {
    icon: {
      required: true,
      type: String,
    },
    to: {
      type: String,
      required: true,
      default: "/",
    },
    prevent: {
      type: Function,
      default: null,
    },
    isLoading: {
      type: Boolean,
      default: false,
    },
  },

  setup(props) {
    const navigateTo = (navigate: () => void) => {
      if (props.prevent) return props.prevent();
      navigate();
    };
    return { navigateTo };
  },
});
</script>

