<template>
    <div style="height: 00px; border: 1px solid black;margin-top: 100px !important;">
      <!-- Your content here -->
      <div style="height: 00px; border: 1px solid black;margin-top: 50px;">
      </div>
  
      <!-- Footer -->
      <v-footer :app="true" class="bg-indigo-lighten-1 text-center d-flex flex-column" :class="{ 'footer-hidden': !showFooter }">
      <div>
        <!-- Social media icons -->
        <v-btn v-for="icon in icons" :key="icon" class="mx-4" :icon="icon" variant="text" @click="openSocialMediaLink(icon)">
        </v-btn>
      </div>

      <v-row align="center" justify="center">
        <v-col cols="3" class="text-left ">
          <v-icon size="35">mdi-information-outline</v-icon> <br/>
          <div style="display: flex;justify-content: center;flex-direction: column;">
            {{$t('Contact Information:')}}
            <br>
            {{$t('Phone')}} : 920004365
            <br/>
            {{$t('Email')}} :  cs@alsaedan.com
          </div>
        </v-col>
        <v-col cols="6"><div style="width: 100%;"> {{ $t(('Feel free to ask us any questions. You can reach out to us through our social media profiles or using the contact details provided on the side.')) }}</div></v-col>
        <v-col cols="3" class="text-left">
          <div>
            <v-icon size="35">mdi-clock-alert-outline</v-icon><br/>
            {{$t('Work Hours')}}:
            <br>
            {{$t('Sunday through Thursday 8:00 AM - 4:00 PM Friday and Saturday are closed')}}
          </div>
        </v-col>
      </v-row>

      <!-- Footer Divider -->
      <v-divider></v-divider>

      <div>
        {{ new Date().getFullYear() }}
        <!-- — <strong>Vuetify</strong> -->
      </div>
    </v-footer>
    </div>
  </template>
  
  <script>
export default {
  data: () => ({
    icons: ['mdi-facebook', 'mdi-twitter', 'mdi-linkedin', 'mdi-instagram'],
    showFooter: false, // Initially hide the footer
  }),
  created() {
    window.addEventListener('scroll', this.handleScroll);
  },
  beforeUnmount() {
    window.removeEventListener('scroll', this.handleScroll);
  },
  methods: {
    handleScroll() {
      // Calculate how close the user is to the bottom of the page
      const scrollY = window.scrollY;
      const windowHeight = window.innerHeight;
      const documentHeight = document.documentElement.scrollHeight;

      if (scrollY + windowHeight >= documentHeight) {
        // User has reached the bottom of the page, show the footer
        this.showFooter = true;
      } else {
        // User is not at the bottom, hide the footer
        this.showFooter = false;
      }
    },
    //============Determine the URL based on the clicked icon===============
    openSocialMediaLink(icon) {
      let url = '';

      switch (icon) {
        case 'mdi-facebook':
          url = 'https://www.facebook.com';
          break;
        case 'mdi-twitter':
          url = 'https://x.com/alsaedancompany?s=21&t=5hA82Lbzl-7Fd7q3GuVa9w';
          break;
        case 'mdi-linkedin':
          url = 'https://www.linkedin.com/company/alsaedan-real-estate-co-/';
          break;
        case 'mdi-instagram':
          url = 'https://instagram.com/alsaedancompany?igshid=MzRlODBiNWFlZA==';
          break;
        default:
          // Handle any other icons or no URL found
          break;
      }
      if (url) {
        window.open(url, '_blank'); // Open link in a new tab/window
      }
    },
  },
};
</script>
  
  <style scoped>
 .footer-hidden {
  display: none !important;
}

  </style>
  