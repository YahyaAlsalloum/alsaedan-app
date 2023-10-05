import i18n from '@/i18n';

const state = {
  currentLocale: 'en', // Default locale
};

const getters = {
  getCurrentLocale: (state) => state.currentLocale,
};

const mutations = {
  setCurrentLocale: (state, locale) => {
    state.currentLocale = locale;
    i18n.global.locale = locale; // Set the locale for i18n
    localStorage.setItem('selectedLocale', locale); // Use localStorage or cookies

  },
};

const actions = {
  setLocale: ({ commit }, locale) => {
    commit('setCurrentLocale', locale);
  },
};

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions,
};