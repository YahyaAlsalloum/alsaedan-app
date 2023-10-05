<template>
  <v-app>
<h1 class="headline black--text">Real Estate</h1>
    <!-- Add Real Estate Form -->
    <v-container>
      <v-card-title class="headline white--text">Add real estate</v-card-title>

      <v-form @submit.prevent="addRealEstate">
        <v-row>
          <v-col cols="12" md="4">
            <v-text-field v-model="newRealEstate.name" label="Name"></v-text-field>
          </v-col>
          <v-col cols="12" md="4">
            <v-text-field v-model="newRealEstate.description" label="Description"></v-text-field>
          </v-col>
          <v-col cols="12" md="4">
            <v-text-field v-model="newRealEstate.location" label="Location"></v-text-field>
          </v-col>
          <v-col cols="12" md="4">
            <v-select v-model="newRealEstate.type" label="Type" :items="propertyTypes"></v-select>
          </v-col>
          <v-col cols="12" md="4">
            <v-file-input v-model="newRealEstate.image" label="Image" ref="fileInput"></v-file-input>
          </v-col>
          <v-col cols="12">
            <div v-if="uploading"> Uploading...</div>
            <v-btn type="submit" color="success">Add real estate</v-btn>
          </v-col>
        </v-row>
      </v-form>
    </v-container>

    <!-- Display Properties by Type -->
    <v-container>
      <v-row>
        <v-col v-for="type in propertyTypes" :key="type" cols="12">
          <h2 class="primary--text">{{ type }}</h2>
          <v-row>
            <v-col v-for="property in filteredProperties(type)" :key="property.id" cols="12" sm="6" md="4">
              <v-card>
                <v-img :src="getImageUrl(property.image)" height="200"></v-img>
                <v-card-title>{{ property.name }}</v-card-title>
                <v-card-subtitle>{{ property.description }}</v-card-subtitle>
                <v-card-text>{{ property.location }}</v-card-text>
                <v-card-actions>
                  <router-link :to="'/editRealestate/' + property.id"> Edit</router-link>
                  <v-btn @click="deleteProperty(property.id)" color="error">Delete</v-btn>
                </v-card-actions>
              </v-card>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
    </v-container>
  </v-app>
</template>

<script>
import axios from 'axios';
export default {
  created(){
    this.fetchRealEstate();
  },

  data() {
    return {
      uploading: false, 

      newRealEstate: {
        name: '',
        description: '',
        location: '',
        type: '',
        image: null,
      },
      propertyTypes: ['Apartment', 'villa', 'Land'],
      properties: [], // Your real estate data
    };
  },
  methods: {
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
    addRealEstate() {
  this.uploading = true;

  // Get the selected file using refs
  const selectedFile = this.$refs.fileInput.files[0];

  // Check if a file is selected
  if (!selectedFile) {
    console.log('No file selected.');
    this.uploading = false;
    return;
  }


  const formData = new FormData();
  formData.append('name', this.newRealEstate.name);
  formData.append('description', this.newRealEstate.description);
  formData.append('location', this.newRealEstate.location);
  formData.append('type', this.newRealEstate.type);
  formData.append('image', selectedFile); // Use the selected file

  axios
    .post('http://127.0.0.1:8000/api/RealEstates', formData ,
    {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    })
    .then((response) => {
      this.clearForm();
      this.fetchRealEstate();
    })
    .catch((error) => {
      console.log('Error:', error);
      console.log('Response Data:', error.response.data);
    })
    .finally(() => {
      this.uploading = false;
    });
}
,
    filteredProperties(type) {
      // Filter properties by type
      return this.properties.filter((property) => property.type === type);
    },

    async deleteProperty(Id) {
      console.log('deleted'+ Id)

      await axios.delete(`http://127.0.0.1:8000/api/RealEstates/${Id}`);
      this.fetchRealEstate();
      console.log('deleted')
    },
    clearForm() {
      // Clear the add real estate form
      this.newRealEstate = {
        name: '',
        description: '',
        location: '',
        type: '',
        image: null,
      };

    },
    getImageUrl(imageFileName) {
  const backendUrl = 'http://127.0.0.1:8000';
    const imageUrl = `${backendUrl}/storage/images/realEstate/${imageFileName}`;
  return imageUrl;
},
  },
};
</script>

<style scoped>
/* Add your custom CSS styles here */
</style>
