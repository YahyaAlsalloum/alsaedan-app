import { createStore } from 'vuex';
import translations from './translations';

export default createStore({
  modules: {
    translations,
  },
  // Other store configuration...
});