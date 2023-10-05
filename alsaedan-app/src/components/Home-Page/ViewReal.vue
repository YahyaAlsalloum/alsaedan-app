<template>
  <v-app>
    <v-container>
      <v-card elevation="5">
        <v-row no-gutters>
          <v-col cols="12" sm="6">
            <v-img :src="getImageUrl(property.image)" height="400"></v-img>
          </v-col>
          <v-col cols="12" sm="6">
            <v-card-title class="headline">{{ property.name }}</v-card-title>
            <v-card-subtitle class="subheading">{{ property.type }}</v-card-subtitle>
            <v-divider></v-divider>
            <v-card-text>
              <h3 class="subtitle-1">Description:</h3>
              <p>{{ property.description }}</p>
              <h3 class="subtitle-1">Location:</h3>
              <p>{{ property.location }}</p>
            </v-card-text>
            <v-card-actions>
              <v-btn color="error" to="/">Back</v-btn>      
              <div id="google_translate_element"  style="height: fit-content;margin-top: 30px;margin-bottom: 30px;border:10px;background-color: brown;width: 50px;"> </div>

            </v-card-actions>
          </v-col>
        </v-row>
      </v-card>
    </v-container>
  </v-app>
  <div style=""></div>
</template>

<script>
import axios from 'axios';

export default {
  async mounted() {
      const selectedLanguage = this.$store.getters['translations/getCurrentLocale'];
  this.initializeGoogleTranslate(selectedLanguage);
},
  data() {
    return {
      property: {} // This should be populated with the property details
    };
  },
  created() {
    this.getRealByID();
  },
  methods: {
    async getRealByID() {
      const response = await axios.get(`http://127.0.0.1:8000/api/RealEstates/${this.$route.params.id}`);
      this.property = response.data.realEstate;
    },
    getImageUrl(imageFileName) {
      const backendUrl = 'http://127.0.0.1:8000';
      const imageUrl = `${backendUrl}/storage/images/realEstate/${imageFileName}`;
      return imageUrl;
    },
    async initializeGoogleTranslate(selectedLanguage) {
  console.log(selectedLanguage);  
  if (selectedLanguage === 'Arabic') {    // eslint-disable-next-line no-undef
await new google.translate.TranslateElement(console.log('============ar================'),
      {
        pageLanguage: 'ar', 
        includedLanguages: 'en,ar',
        InlineLayout: 'HORIZONTAL',
      },
      'google_translate_element'
    );
  } else {
    // eslint-disable-next-line no-undef
    await new google.translate.TranslateElement(console.log('=========en==================='),
      {
        pageLanguage: 'en', 
        includedLanguages: 'en,ar',
        InlineLayout: 'HORIZONTAL',
      },
      'google_translate_element'
    );
  }
},
  },
};
</script>

<style scoped>
/* Add custom CSS styles here if needed */
.headline {
  font-size: 24px;
  font-weight: bold;
}

.subheading {
  font-size: 18px;
  color: #555;
}

.subtitle-1 {
  font-size: 16px;
  font-weight: bold;
  margin-top: 10px;
}

/* You can further customize the card's styling */
</style>
