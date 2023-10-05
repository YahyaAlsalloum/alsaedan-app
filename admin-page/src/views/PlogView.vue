<template>
  <div>
    <v-container>

      <!-- Create Plog Form -->
      <v-card class="pa-4" color="primary">
        <v-card-title class="headline white--text">Create Plog</v-card-title>
        <v-card-text>
          <v-form @submit.prevent="createPlog">
            <v-text-field v-model="newPlog.title" label="Title" required></v-text-field>
            <v-file-input v-model="newPlog.image" ref="fileInput" prepend-icon="mdi-camera" label="Image" accept="image/*" ></v-file-input>
            <v-textarea v-model="newPlog.description" label="Description" required></v-textarea>
            <v-btn type="submit" color="success">Create</v-btn>
            <div v-if="uploading"> Uploading...</div>
          </v-form>
        </v-card-text>
      </v-card>
  <v-row>
    <v-col cols="3" v-for="plog in plogs" :key="plog.id" >
  <!-- List of Plogs -->
  <v-card class="my-4" color="blue-grey-lighten-1">
        <v-card-title class="headline white--text">{{ plog.title }}</v-card-title>
        <v-card-text class="white--text">{{ plog.description }}</v-card-text>
        <img :src="getImageUrl(plog.image)" aspect-ratio="2" style="width: 100%;">
        <!-- <img :src="require(getImageUrl(plog.image))" aspect-ratio="2"> -->
        <v-card-actions>
          <router-link :to="'/editPlog/' + plog.id"> Edit</router-link>
          <v-btn @click="deletePlog(plog.id)"  color="error" >Delete</v-btn>
        </v-card-actions>
      </v-card> 
    </v-col> 
  </v-row>
    
    </v-container>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      plogs: [],
      newPlog: { title: '', image: null, description: '' },
      uploading: false, // Add this property
    };
  },
  created() {
    this.fetchPlogs();
  },
  methods: {
    async fetchPlogs() {
      // Implement logic to fetch plogs from your API
      try{
        await axios.get('http://127.0.0.1:8000/api/plogs').then(response=>this.plogs=response.data)
      }catch (error) {
        if (!error.response) {
            // network error
            this.errorStatus = 'Error: Network Error';
        } else {
            this.errorStatus = error.response.data.message;
        }}
    },
    createPlog() {
      this.uploading = true;
      const selectedFile = this.$refs.fileInput.files[0];
  // Check if a file is selected
  if (!selectedFile) {
    console.log('No file selected.');
    this.uploading = false;
    return;
  }

  const formData = new FormData();
  formData.append('title', this.newPlog.title);
  formData.append('image', selectedFile);
  formData.append('description', this.newPlog.description);

  axios.post('http://127.0.0.1:8000/api/plogs', formData,
    {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    })
    .then(response => {
      this.newPlog= { title: '', image: null, description: '' }
      this.fetchPlogs();
    })
    .catch(error => {
console.log(error)  
  }).finally(() => {
      this.uploading = false; // Set uploading to false when uploading is complete
    });;
},

    async deletePlog(plogId) {
await axios.delete(`http://127.0.0.1:8000/api/plogs/${plogId}`);
this.fetchPlogs();
console.log('deleted')
    },
    //onImageChange
    // onImageChange(event) {
    //   // Handle file input change and update this.newPlog.image with the selected file
    //   this.newPlog.image = event.target.files[0];
    // },
    getImageUrl(imageFileName) {
  const backendUrl = 'http://127.0.0.1:8000';
    const imageUrl = `${backendUrl}/storage/images/plogs/${imageFileName}`;
  return imageUrl;
},
  },

};
</script>

<style>
/* You can add custom CSS styles here */
</style>
