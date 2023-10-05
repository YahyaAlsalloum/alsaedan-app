<template>
  <div class="nav-bar" :dir="$i18n.locale == 'Arabic' ? 'rtl' : 'ltr'">
    <v-app-bar color="#1A237E" app :elevation="11" scroll-behavior="elevate" scroll-threshold="229" :dir="$i18n.locale == 'Arabic' ? 'rtl' : 'ltr'">
      <v-container>
        <v-row align="center" :dir="$i18n.locale == 'Arabic' ? 'rtl' : 'ltr'" >
          <v-col cols="3" md="2" class="d-flex align-center">
            <img src="@/assets/images/logo.png" alt="" fluid class="logo">
          </v-col>
          <v-col cols="12" md="6">
            <div class="links-container">
              <v-row>
                <v-col v-for="link in links" :key="link.name" cols="auto">
                  <a :href="link.url" class="nav-link mx-2 my-2">{{ $t(link.name) }}</a>                 
                </v-col>
              </v-row>
            </div>
          </v-col>
          <v-col cols="12" md="3" class=" align-center px-2 justify-end">
            <div class="select-container">
              <v-select v-model="currentLocale" :items="availableLocales" label="Select Language" placeholder="English" color="black" ></v-select>
            </div>
          </v-col>
        </v-row>
      </v-container>
    </v-app-bar>
  </div>
</template>

<script>
export default {
  computed: {
    currentLocale: {
      get() {
        return this.$store.getters['translations/getCurrentLocale'];
      },
      set(locale) {
        this.$store.dispatch('translations/setLocale', locale);
        
      },
    },
    availableLocales() {
      return ['English', 'Arabic'];
    },
  },
  data: () => ({
    drawer: false,
    links: [
      { name: 'Home', url: '/' },
      { name: 'About us', url: '/about' },
      { name: 'Services', url: '/Services' },
      { name: 'Blog', url: '/blog' },
      { name: 'Connect us', url: '/Connectus' },
    ],
  }),
  inject: ['Emitter'],
  methods: {
    openMenu() {
      this.Emitter.emit('openMenu'); // Emit the event to open the drawer
    },
  },

};
</script>

<style scoped>
@media (max-width: 768px) {
  .nav-bar {
    padding-top: 10px;
  }
}
.logo {
  height: 40px;
  margin-top: 10px;
  margin-bottom: 5px;
}

.nav-link {
  color: white !important;
  text-decoration: none;
  font-size: 20px;
}

.select-container {
  text-align: center;
  margin-top: 10px;
}
</style>
