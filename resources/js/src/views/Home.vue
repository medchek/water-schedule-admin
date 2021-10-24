<template>
  <div>
    <!-- lower than md stack the menu on top of the content as a header for when the user hides the side menu, another should appear on the top of the screen -->
    <div class="flex h-full w-full flex-col md:flex-row overflow-hidden">
      <Menu />
      <router-view name="content"></router-view>
    </div>
  </div>
</template>
<script lang="ts">
import { defineComponent } from "vue";

import store from "../store";
import Menu from "../components/AppMenu.vue";
export default defineComponent({
  components: { Menu },
  beforeRouteEnter(_, from, next) {
    // ! DEVONLY
    // console.warn("YOU ARE CURRENTLY ACCESSING THE APP FROM AN UNPROTECTED ROUTE WHICH IS MEANT FOR DEVELOPEMENT ONLY");
    // console.warn("DO NOT FORGET TO REVERT BACK TO AUTH CHECKING WHEN DONE WITH TESTING");

    // return next();

    const redirectToLogin = () => {
      next({ replace: true, name: "login" });
      store.dispatch("flashSnack", {
        message: "Vous devez être connecté pour accéder à cette page",
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
});
</script>
