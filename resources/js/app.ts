// require('./bootstrap');
import { createApp } from "vue";
import router from "./src/router";
import store from "./src/store";
import App from "./src/App.vue";
import i18n from "./src/locales";

const app = createApp(App).use(i18n).use(store).use(router);

app.mount("#app");
