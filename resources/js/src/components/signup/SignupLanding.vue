<template>
  <signup-content
    label="Bienvenu dans la création du compte administrateur"
    description="Cette page va être accessible pour vous accompagner dans la création du premier compte administrateur qui va vous permettre de gérer l'ensemble de l'application. Après avoir créé ce dernier, cette page sera définitivement inaccessible. Néanmoins, vous pouvez toujours ajouter davantage de comptes directement depuis la section utilisateurs de l'application via votre compte administrateur. Ceci vous donnera un contrôle total sur l'ensemble des comptes opérants."
    importantDescription
    className="space-y-2"
  >
    <p class="text-bgray-400 text-xs sm:text-sm 2xl:text-base">Appuyez sur continuer (en bas à droite) quand vous êtes prêt à passer à l'étape suivante.</p>
  </signup-content>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import SignupContent from "./SignupContent.vue";

export default defineComponent({
  components: { SignupContent },
  setup() {},
});
</script>
