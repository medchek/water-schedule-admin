// require('./bootstrap');
import { createApp } from "vue";
import router from "./src/router";
import App from "./src/App.vue";

const app = createApp(App).use(router);

app.mount("#app");
