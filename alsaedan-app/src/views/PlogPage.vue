<template>
<div style="height: 30px;">
</div>


<v-container style="background-color: rgb(13, 16, 80);width:100%;" >
<v-row v-if="$i18n.locale == 'Arabic'">
        <!-- Left column: List of Blogs -->
        <v-col cols="4" >
          <h1 style="color: aliceblue;">{{$t('Blogs list')}}</h1>
        <v-card v-for="blog in blogs"
        :key="blog.id"
        @click="showBlogDetails(blog)"
        class="blog-card"
        >
            <img :src="getImageUrl(blog.image)" style="height: 100px;" >
            <v-card-title class="blog-title pa-2 " style="background-color: rgba(0, 0, 0, 0.5); width: 100%;">{{ blog.title }}</v-card-title>
        </v-card>
        </v-col>
        <!-- Right column: Blog Details -->
        <v-col cols="8">
        <v-card v-if="selectedBlog" class="blog-details">
            <img :src="getImageUrl(selectedBlog.image)" height="300">
            <v-card-title class="blog-title">{{ selectedBlog.title }}</v-card-title>
            <v-card-text class="blog-description">{{ selectedBlog.description }}</v-card-text>
        </v-card>
        <div v-else class="no-blog-selected">
            {{$t('Select a blog to view details.')}}
        </div>
        </v-col>
    </v-row>
<v-row v-else>

        <!--  Blog Details -->
        <v-col cols="8">
        <v-card v-if="selectedBlog" class="blog-details">
            <img :src="getImageUrl(selectedBlog.image)" height="300">
            <v-card-title class="blog-title">{{ selectedBlog.title }}</v-card-title>
            <v-card-text class="blog-description">{{ selectedBlog.description }}</v-card-text>
        </v-card>
        <div v-else class="no-blog-selected">
            {{$t('Select a blog to view details.')}}
        </div>
        </v-col>
                <!--  List of Blogs -->
                <v-col cols="4" >
          <h1 style="color: aliceblue;">{{$t('Blogs list')}}</h1>
        <v-card v-for="blog in blogs"
        :key="blog.id"
        @click="showBlogDetails(blog)"
        class="blog-card"
        >
            <img :src="getImageUrl(blog.image)" style="height: 100px;" >
            <v-card-title class="blog-title pa-2 " style="background-color: rgba(0, 0, 0, 0.5); width: 100%;">{{ blog.title }}</v-card-title>
        </v-card>
        </v-col>
    </v-row>
    </v-container>
    <div style="height: 250px;">
      <div id="google_translate_element"  style="height: fit-content;margin-top: 30px;margin-bottom: 30px;border:10px;background-color: brown;width: 50px;"> </div>

    </div>
</template>

<script>

import axios from 'axios';

export default {
    data() {
    return {
      selectedLanguage: this.$store.getters['translations/getCurrentLocale'], // Set the default language
      blogs: [],
        selectedBlog: null,
      };
    },

    async mounted() {
      const selectedLanguage = this.$store.getters['translations/getCurrentLocale'];
  this.initializeGoogleTranslate(selectedLanguage);
},

created() {
    // Initialize selectedBlog with the first blog when the component is created
    this.selectedBlog = this.blogs[0];
    this.fetchPlog();

  },
    methods: {

      showBlogDetails(blog) {
        this.selectedBlog = blog;
      },
      async fetchPlog(){
      try{
        await axios.get('http://127.0.0.1:8000/api/plogs').then(response=>this.blogs=response.data)
      }catch (error) {
        if (!error.response) {
            // network error
            this.errorStatus = 'Error: Network Error'; 
        } else {
            this.errorStatus = error.response.data.message;
        }}
    },
    getImageUrl(imageFileName) {
  const backendUrl = 'http://127.0.0.1:8000';
    const imageUrl = `${backendUrl}/storage/images/plogs/${imageFileName}`;
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
  .blog-card {

    cursor: pointer;
    margin-bottom: 20px;
    padding: 10px;
  }
  
  .blog-title {
    font-weight: bold;
    font-size: 20px;
    text-align: center;
  }
  
  .blog-details {
    padding: 20px;
  }
  
  .blog-description {
    font-size: 16px;
  }
  
  .no-blog-selected {
    text-align: center;
    font-size: 18px;
    padding: 50px;
  }
  </style>
  