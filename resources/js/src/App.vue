<template>
  <router-view class="w-full h-screen max-h-screen flex flex-col bg-gradient-to-br from-gray-50 to-bgray-100"> </router-view>
  <div id="modal" class="absolute overflow-hidden"></div>
  <Snack />
</template>

<script lang="ts">
import { defineComponent } from "vue";
import Snack from "./components/Snack.vue";

export default defineComponent({
  setup() {},
  components: {
    Snack,
  },
});
</script>

<style>
body {
  height: 100%;
  width: 100%;
}
#app {
  width: 100%;
  height: 100%;
  min-height: 100vh;
  max-height: 100vh;
}
input:focus {
  outline: none;
}
</style>