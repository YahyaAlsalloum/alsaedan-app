<template>
  <app-layout>
    <router-view />
  </app-layout>
</template>
<script>
import AppLayout from "@/components/global/AppLayout.vue";
export default {
  components: {
    AppLayout,
  },
  methods:{
    googleTranslateElementInit() {
      window.google.translate.TranslateElement(
        { pageLanguage:this.$store.getters['translations/getCurrentLocale']},
        "google_translate_element"
      );
    },
  }
}
</script>
<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
</style>
