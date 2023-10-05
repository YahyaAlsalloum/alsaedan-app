import { createApp } from 'vue';
import App from './App.vue';
import store from './store';
import router from './router';
import i18n from '@/i18n'
//Emitter config 
import mitt from "mitt";
const Emitter =mitt();

// Vuetify
import 'vuetify/styles';
import { createVuetify } from 'vuetify';
import * as components from 'vuetify/components';
import * as directives from 'vuetify/directives';
import "@mdi/font/css/materialdesignicons.css";

const vuetify = createVuetify({
  components,
  directives,
})

// Load the selected locale from browser storage
const selectedLocale = localStorage.getItem('selectedLocale');
if (selectedLocale) {
  store.commit('translations/setCurrentLocale', selectedLocale);
}


createApp(App).use(vuetify).use(i18n).use(store).provide("Emitter",Emitter).use(router).mount('#app')
