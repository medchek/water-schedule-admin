<template>
  <div>
    <!-- lower than lg stack the menu on top of the content as a header for when the user hides the side menu, another should appear on the top of the screen -->
    <div class="flex h-full w-full flex-col lg:flex-row lg:arabic:flex-row-reverse overflow-hidden">
      <Menu />
      <router-view name="content"></router-view>
    </div>
  </div>
</template>
<script lang="ts">
import { computed, defineComponent, watch } from "vue";

import store from "../store";
import Menu from "../components/AppMenu.vue";

import { flashSnack } from "../lib/shared";
import { useStore } from "vuex";
import { useRouter } from "vue-router";
import { useI18n } from "vue-i18n";
import i18n from "../locales";

export default defineComponent({
  components: { Menu },
  beforeRouteEnter(_, from, next) {
    // ! DEVONLY
    // console.warn("YOU ARE CURRENTLY ACCESSING THE APP FROM AN UNPROTECTED ROUTE WHICH IS MEANT FOR DEVELOPEMENT ONLY");
    // console.warn("DO NOT FORGET TO REVERT BACK TO AUTH CHECKING WHEN DONE WITH TESTING");

    // return next();

    const redirectToLogin = () => {
      next({ replace: true, name: "login" });
      flashSnack({
        message: i18n.global.t("general.snack.errors.unauthorized"),
        time: 5000,
      });
    };

    // if the user is not auth, redirect to login
    // if (!store.getters.getUser) return redirectToLogin();

    store
      .dispatch("fetchUser")
      .then((res) => {
        if (res) {
          next();
        } else {
          redirectToLogin();
        }
      })
      .catch(() => {
        redirectToLogin();
      });
  },
  // beforeRouteUpdate(_, __, next) {
  //   console.log("BEFORE ROUTE LEAVE");
  //   const isUserLogged = store.getters.getUser;
  //   if (isUserLogged === null) {
  //     next({ replace: true, name: "login" });
  //   } else {
  //     next();
  //   }
  // },
  setup() {
    const store = useStore();
    const isSessionExpired = computed(() => store.getters.getIsSessionExpired);
    const router = useRouter();
    const { t } = useI18n();

    watch(isSessionExpired, (newVal) => {
      if (newVal) {
        router.replace({ name: "login" });
        flashSnack({ message: t("general.snack.errors.sessionExpired") });
      }
    });
  },
});
</script>
