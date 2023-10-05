<template>
    <div>
      <v-card class="pa-4" color="primary">
        <v-card-title class="headline white--text">Update Plog</v-card-title>
        <v-card-text>
          <v-form @submit.prevent="updatePlog">
            <v-text-field v-model="title" label="Title" required></v-text-field>
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
        title: '',
        imageFile: null,
        description: '',
        updating: false,
      };
    },
    created() {

      this.getPlogByID();
    },
    methods: {
      async getPlogByID() {
        try {
          const response = await axios.get(`http://127.0.0.1:8000/api/plogs/${this.$route.params.id}`);
          const data = response.data.plog;

          // Update component data properties
          this.title = data.title || '';
          this.description = data.description || '';
        } catch (error) {
          if (!error.response) {
            // Network error
            this.errorStatus = 'Error: Network Error';
        } else {
            this.errorStatus = error.response.data.message;
          }
        }
      },
      updatePlog() {
        this.updating = true;
        const formData = new FormData();
         // Get the selected file using refs
  const selectedFile = this.$refs.fileInput.files[0];
        formData.append('title', this.title);
        formData.append('image',selectedFile);
        formData.append('description', this.description);

        const plogId = this.$route.params.id; 
    axios.post(`http://127.0.0.1:8000/api/plogs/${plogId}`, formData ,
    {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    }
    
    ).then(response=>{console.log(response.data)})
        .then(() => {
            this.title = '';
            this.imageFile = null;
            this.description = '';
            console.log('Success');
            this.$router.push('/plog');
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
  