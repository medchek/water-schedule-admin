<template>
  <transition name="fade">
    <!-- v-if="showModal" -->
    <section class="absolute flex items-center justify-center bg-bgray-700 bg-opacity-50 w-screen h-screen py-4 px-4 sm:px-0 z-50 overflow-hidden">
      <transition name="scale">
        <div :class="className" id="modal-base" v-if="triggerTransition" ref="modalRef">
          <slot></slot>
        </div>
      </transition>
    </section>
  </transition>
</template>

<script lang="ts">
import { defineComponent, onMounted, onUnmounted, ref } from "vue";

export default defineComponent({
  emits: ["modalClickedOutside"],
  props: {
    closeModal: {
      type: Function,
      // required: true,
    },
    className: {
      type: String,
      required: true,
    },
    showModal: {
      type: Boolean,
      required: true,
    },
  },
  setup(props, { emit }) {
    const modalRef = ref<HTMLElement | null>(null);
    const triggerTransition = ref<boolean>(false);
    let triggerTransitionTimeout: ReturnType<typeof setTimeout> | null = null;

    const onBodyClick = (event: MouseEvent) => {
      // console.log("ref", modalRef.value);
      // console.log("target", event.target);
      if (!modalRef.value) return;
      const snack = document.getElementById("snack");
      // prevent closing the model when clicking on the snackbar
      if (snack) {
        if (snack == event.target || snack.contains(event.target as Node)) return;
      }
      // if the clicked target is not inside the ref, close the modal
      if (!modalRef.value.contains(event.target as Node)) {
        if (props.closeModal) {
          props.closeModal(true);
        }
        emit("modalClickedOutside");
      }
    };

    const onKeyPress = (event: KeyboardEvent) => {
      if (event.key === "Escape") {
        if (props.closeModal) props.closeModal(false);
        emit("modalClickedOutside");
      }
    };

    onMounted(() => {
      if (triggerTransitionTimeout) clearTimeout(triggerTransitionTimeout);

      triggerTransitionTimeout = setTimeout(() => {
        triggerTransition.value = true;
      }, 50);

      document.body.addEventListener("mousedown", onBodyClick, {
        capture: true,
      });

      document.body.addEventListener("keydown", onKeyPress, { capture: true });
    });

    onUnmounted(() => {
      triggerTransition.value = false;
      if (triggerTransitionTimeout) clearTimeout(triggerTransitionTimeout);

      document.body.removeEventListener("mousedown", onBodyClick, {
        capture: true,
      });

      document.body.removeEventListener("keydown", onKeyPress, { capture: true });
    });

    return { modalRef, triggerTransition };
  },
});
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.2s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

.scale-enter-active {
  animation: scale 0.25s;
}
.scale-leave-active {
  animation: scale 0.25s reverse;
}
@keyframes scale {
  from {
    opacity: 0;
    transform: scale(0);
  }
  to {
    opacity: 1;
    transform: scale(1);
  }
}
</style>
