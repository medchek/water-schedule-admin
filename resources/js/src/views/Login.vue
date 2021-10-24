<template>
  <div>
    <form
      class="flex flex-col m-auto w-full sm:w-4/5 md:2/3 lg:w-1/2 2xl:w-2/5 rounded p-5 sm:border border-gray-100 bg-transparent sm:bg-white"
      method="POST"
      @submit.prevent="login"
    >
      <div class="w-full text-center">
        <p class="text-5xl italic font-bold text-blue-900">SEAAL</p>
        <p class="text-gray-400 h-10">Programme d'eau</p>
      </div>

      <div class="space-y-3 mb-6 mt-2">
        <input type="email" placeholder="Email" class="w-full h-12 rounded-md pl-2 border-2 border-blue-50 focus:ring-2 ring-blue-200" v-model="email" />
        <input
          type="password"
          placeholder="Mot de pass"
          class="w-full h-12 rounded-md pl-2 border-2 border-blue-50 focus:ring-2 ring-blue-200"
          v-model="password"
          @dblclick="isAuthenticated"
        />
      </div>

      <button
        class="
          h-12
          w-full
          bg-gradient-to-tr
          transition-colors
          from-blue-500
          to-blue-600
          hover:to-blue-300
          focus:to-blue-800
          rounded
          font-semibold
          text-white text-lg
        "
        type="submit"
        :disabled="!canLogin || isLoading"
      >
        <loader dark v-if="isLoading" />
        <span v-else>Connexion</span>
      </button>
    </form>
  </div>
</template>
<script lang="ts">
import { computed, defineComponent, ref } from "vue";
import { useStore } from "vuex";
import Loader from "../components/Loader.vue";
import { AxiosLogin, isAuth } from "../lib/shared";
import { SnackType } from "../store/modules/ui";
import store from "../store";
import { useRouter } from "vue-router";

export default defineComponent({
  components: { Loader },
  beforeRouteEnter(_to, from, next) {
    // user is authenticated
    const redirectHome = () => {
      next({ replace: true, name: "wilayas" });
      store.dispatch("flashSnack", {
        message: "Vous êtes déja connecté",
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
    const email = ref<string>("admin@seaal.com");
    const password = ref<string>("12345678");
    const canLogin = computed(() => {
      return email.value.length && password.value.length;
    });
    const isLoading = ref<boolean>(false);

    const flashSnack = ({ message, time, type }: { message: string; time?: number | false; type?: SnackType }) => {
      store.dispatch("flashSnack", { message, type, time });
    };

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
                  router.replace({ name: "wilayas" });
                  flashSnack({
                    message: "Vous êtes maintenant connecté",
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
                    flashSnack({ message: "Email ou mot de pass incorrect.", type: "error" });
                    break;
                  case 429:
                    // too many attempts
                    flashSnack({
                      message: "Vous avez essayer de vous connecter plusieurs fois en un espace de temp court, veillez attendre avant to reéssayer.",
                      type: "error",
                      time: 5000,
                    });
                    break;
                  default:
                    flashSnack({ message: "Une errreur est survenue lors de la connexion.", type: "error" });
                    break;
                }
                throw new Error(`Error while attempting to login: ${loginError}`);
              });
          }
        })
        .catch((err) => {
          isLoading.value = false;
          flashSnack({ message: "Une errreur est survenue lors de la connexion (CORS).", type: "error" });
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
    };
  },
});
</script>
