<template>
    <div>
      <v-card class="pa-4" color="primary">
        <v-card-title class="headline white--text">Update RealEstate</v-card-title>
        <v-card-text>
          <v-form @submit.prevent="updateReal">
            <v-text-field v-model="name" label="name" required></v-text-field>
            <v-text-field v-model="location" label="location" required></v-text-field>
            <v-select v-model="type" label="Type" :items="propertyTypes"></v-select>
            <v-file-input v-model="imageFile"  ref="fileInput" prepend-icon="mdi-camera" label="Image" accept="image/*" @change="onImageChange"></v-file-input>
            <v-textarea v-model="description" label="Description" required></v-textarea>
            <v-btn type="submit" color="success">Update</v-btn>
            <div v-if="updating">Updating...</div>
          </v-form>
        </v-card-text>
      </v-card>
    </div>
  </template>

  <script>
  import axios from 'axios';
  
  export default {
    name: 'editPlog',
    data() {
      return {
        name: '',
        imageFile: null,
        description: '',
        location: '',
        type: '',
        updating: false,
        propertyTypes: ['Apartment', 'villa', 'Land'],
      };
    },
    created() {

      this.getRealByID();
    },
    methods: {
      async getRealByID() {
        try {
          const response = await axios.get(`http://127.0.0.1:8000/api/RealEstates/${this.$route.params.id}`);
          const data = response.data.realEstate;
  
          // fill data 
          this.name = data.name || '';
          this.description = data.description || '';
          this.location = data.description || '';
          this.type = data.type || '';
          this.imageFile = null;
        } catch (error) {
          if (!error.response) {
            // Network error
            this.errorStatus = 'Error: Network Error';
        } else {
            this.errorStatus = error.response.data.message;
          }
        }
      },
      updateReal() {
        this.updating = true;
        const formData = new FormData();
         // Get the selected file using refs
  const selectedFile = this.$refs.fileInput.files[0];

        formData.append('name', this.name);
        formData.append('image',selectedFile);
        formData.append('description', this.description);
        formData.append('location', this.location);
        formData.append('type', this.type);

        const plogId = this.$route.params.id; 
    axios.put(`http://127.0.0.1:8000/api/RealEstates/${plogId}`, formData ,
    {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    }
    
    ).then(response=>{console.log(response.data)})
        .then(() => {
            this.name = '';
            this.type = '';
            this.location = '';
            this.imageFile = null;
            this.description = '';
            console.log('Success');
            this.$router.push('/real_estate');
        })
        .catch((error) => {
            console.log(error);
        })
        .finally(() => {
            this.updating = false;
          });
      },
      onImageChange(event) {
        // Handle file input change and update this.imageFile with the selected file
        this.imageFile = event.target.files[0];
      },
    },
  };
  </script>
  