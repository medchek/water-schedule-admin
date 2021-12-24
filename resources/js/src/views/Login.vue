<template>
  <div>
    <form
      class="
        flex flex-col
        m-auto
        w-full
        sm:w-4/5
        md:2/3
        lg:w-1/2
        2xl:w-2/5
        rounded
        p-5
        sm:border
        border-gray-100
        bg-transparent
        sm:bg-white
        dark:sm:bg-dark-card dark:border-none
      "
      method="POST"
      @submit.prevent="login"
    >
      <div class="w-full text-center arabic:direction-rtl">
        <p class="text-5xl italic font-bold text-blue-900 dark:text-blue-light">SEAAL</p>
        <p class="text-gray-400 h-10">{{ t("general.schedule") }}</p>
      </div>

      <div class="space-y-3 mb-6 mt-2">
        <input
          type="email"
          placeholder="Email"
          class="w-full h-12 rounded-md pl-2 arabic:pr-2 border-2 border-blue-50 focus:ring-2 ring-blue-200 dark:ring-indigo-500 dark:placeholder-bgray-500"
          v-model="email"
        />
        <input
          type="password"
          placeholder="Mot de passe"
          class="w-full h-12 rounded-md pl-2 arabic:pr-2 border-2 border-blue-50 focus:ring-2 ring-blue-200 dark:ring-indigo-500 dark:placeholder-bgray-500"
          v-model="password"
        />
      </div>

      <button
        class="
          h-12
          w-full
          transition-colors
          bg-blue-500
          dark:bg-dark-alt
          hover:bg-blue-400
          dark:hover:bg-blue-light/50
          focus:bg-blue-600
          dark:focus:bg-dark-header
          rounded
          font-semibold
          text-white text-lg
          disabled:cursor-not-allowed disabled:bg-bgray-400 disabled:text-bgray-700 disabled:dark:text-bgray-400 disabled:dark:bg-bgray-700
        "
        type="submit"
        :disabled="!canLogin || isLoading"
      >
        <loader dark v-if="isLoading" />
        <span v-else>{{ t("general.login") }}</span>
      </button>
    </form>
  </div>
</template>
<script lang="ts">
import { computed, defineComponent, ref } from "vue";
import { useStore } from "vuex";
import Loader from "../components/Loader.vue";
import { AxiosLogin, flashSnack, isAuth } from "../lib/shared";
import store from "../store";
import { useRouter } from "vue-router";
import { useI18n } from "vue-i18n";
import i18n from "../locales";

export default defineComponent({
  components: { Loader },
  beforeRouteEnter(_, __, next) {
    // user is authenticated
    const redirectHome = () => {
      next({ replace: true, name: "wilayas" });
      store.dispatch("flashSnack", {
        message: i18n.global.t("general.snack.info.alreadyLoggedIn"),
        type: "info",
        time: 5000,
      });
    };
    if (store.getters.getUser) return redirectHome();

    store
      .dispatch("fetchUser")
      .then((res) => {
        if (res) {
          redirectHome();
        } else {
          next();
        }
      })
      .catch(() => {
        next();
      });
  },
  setup() {
    const store = useStore();
    const router = useRouter();
    const { t } = useI18n();
    const email = ref<string>("");
    const password = ref<string>("");
    const canLogin = computed(() => {
      return email.value.length && password.value.length;
    });
    const isLoading = ref<boolean>(false);

    // const flashSnack = ({ message, time, type }: { message: string; time?: number; type?: SnackType }) => {
    //   store.dispatch("flashSnack", { message, type: type || "info", time: time || 5000 });
    // };

    const login = () => {
      isLoading.value = true;
      AxiosLogin.get("/sanctum/csrf")
        .then((response) => {
          if (response.status === 200) {
            AxiosLogin.post("/login", {
              email: email.value,
              password: password.value,
            })
              .then(() => {
                // console.log(reponse);
                // the user logged in successfully
                // redierct to the home page
                // save the
                store.dispatch("fetchUser").then(() => {
                  // set the expired session state back it its initial value if it has gotten previously changed
                  store.commit("SET_SESSION_EXPIRED", false);
                  router.replace({ name: "wilayas" });
                  flashSnack({
                    message: t("general.snack.info.loginSuccess"),
                    type: "info",
                    time: 5000,
                  });
                });
              })
              .catch((loginError) => {
                isLoading.value = false;
                console.warn(loginError.response.status);
                switch (loginError.response.status) {
                  case 422:
                    // invalid credentials
                    flashSnack({ message: t("general.snack.errors.wrongCredentials"), type: "error" });
                    break;
                  case 429:
                    // too many attempts
                    flashSnack({
                      message: t("general.snack.errors.tooManyLogins"),
                      type: "error",
                      time: 5000,
                    });
                    break;
                  default:
                    flashSnack({ message: t("general.snack.errors.errorWhileLogin"), type: "error" });
                    break;
                }
                throw new Error(`Error while attempting to login: ${loginError}`);
              });
          }
        })
        .catch((err) => {
          isLoading.value = false;
          flashSnack({ message: t("general.snack.errors.cors"), type: "error" });
          throw new Error(`Error while getting CSRF token: ${err}`);
        });
    };

    const isAuthenticated = () => {
      isAuth()
        .then(() => {
          console.log("is auth ok!");
        })
        .catch(() => {
          console.log("is not auth :(");
        });
    };

    return {
      login,
      email,
      password,
      canLogin,
      isLoading,
      isAuthenticated,
      // localization
      t,
    };
  },
});
</script>
