<template>
    <div :dir="$i18n.locale == 'Arabic' ? 'rtl' : 'ltr'">


        <v-container>
            <v-row>
              <v-col v-for="type in propertyTypes" :key="type" cols="12">
                <h2 class="primary--text">{{ type }}</h2>
      
                <!-- Replace this part with your card slider design -->
                <v-sheet class="mx-auto mt-12" elevation="8" cover color="rgb(8 52 115)">
                  <v-slide-group v-model="model" class="pa-4" center-active prev-icon="mdi-arrow-left-bold-outline" next-icon="mdi-arrow-right-bold-outline">
                    <v-slide-group-item v-for="property in filteredProperties(type)" :key="property.id" v-slot="{ isSelected, toggle }">
                      <v-card :color="isSelected ? 'primary' : 'grey-lighten-1'" class="ma-4" height="300" width="280" @click="toggle,navigateToProperty(property.id)">
                        <div class="d-flex fill-height align-center justify-center">
                          <v-scale-transition>
                            <v-icon v-if="isSelected" color="white" size="48" icon="mdi-close-circle-outline"></v-icon>
                            <div style="width: 100%; display: flex; flex-direction: column; justify-content: space-between; gap: 30px;">
                              <img :src="getImageUrl(property.image)" style="max-height: 200px; width: auto;">
                              <!-- <v-divider :thickness="2" class="border-opacity-20" color="black"></v-divider> -->
                              <div>
                                <h5>{{ property.location }}</h5>
                                <p>click for more details</p>
                              </div>
                            </div>
                          </v-scale-transition>
                        </div>
                      </v-card>
                    </v-slide-group-item>
                  </v-slide-group>
                </v-sheet>
                <!-- End of your card slider design -->
              </v-col>
            </v-row>
          </v-container>

    </div>
</template>



<script>
import axios from 'axios';
export default {
  created(){
    this.fetchRealEstate();
  },

    data() {
      return{
              properties: [], // Your real estate data
        propertyTypes: ['Apartment', 'villa', 'Land'],
        model: null,
    }},
    methods:{
      async fetchRealEstate(){
      try{
        await axios.get('http://127.0.0.1:8000/api/RealEstates').then(response=>this.properties=response.data)
      }catch (error) {
        if (!error.response) {
            // network error
            this.errorStatus = 'Error: Network Error'; 
        } else {
            this.errorStatus = error.response.data.message;
        }}
    },
        filteredProperties(type) {
      // Filter properties by type
      return this.properties.filter((property) => property.type === type);
    },
    getImageUrl(imageFileName) {
  const backendUrl = 'http://127.0.0.1:8000';
    const imageUrl = `${backendUrl}/storage/images/realEstate/${imageFileName}`;
  return imageUrl;
},
navigateToProperty(propertyId) {
    this.$router.push(`/ShowReal/${propertyId}`);
  }
    },  

}
</script>
