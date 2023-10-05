<template>
    <div class="container" :dir="$i18n.locale == 'Arabic' ? 'rtl' : 'ltr'">
      <h1 class="page-title"  style="font-size: xx-large; color: black;">{{$t('Our community services')}}</h1>
      <div class="cards">
        <v-row class="main-row">
          <v-col cols="12" md="4" v-for="item in list" :key="item.index">
            <v-card class="mx-auto custom-card" max-width="300" @mouseover="hoveredCard = item.index" @mouseout="hoveredCard = null">
              <div class="card-content" :class="{ 'hovered': hoveredCard === item.index }">
                <v-img :src="item.image" :height="mobile ? 200 : 'auto'" cover></v-img>
                <v-card-title>{{$t(item.title)}}</v-card-title>
                <v-card-actions>
                  <v-btn color="purple-lighten-5" variant="text" @click="item.show = !item.show">{{$t('More')}}</v-btn>
                  <v-spacer></v-spacer>
                  <v-btn :icon="item.show ? 'mdi-chevron-up' : 'mdi-chevron-down'" @click="item.show = !item.show"></v-btn>
                </v-card-actions>
                <v-expand-transition>
                  <div v-show="item.show">
                    <v-divider></v-divider>
                    <v-card-text>{{$t(item.description)}}</v-card-text>
                  </div>
                </v-expand-transition>
              </div>
            </v-card>
          </v-col>
        </v-row>
      </div>
    </div>
  </template>
  
  <script>
  import values1Image from '../../assets/images/Property.png';
  import values2Image from '../../assets/images/values-2.png';
  import values3Image from '../../assets/images/values-5.png';
  
  export default {
    data: () => ({
      hoveredCard: null,
      list: [
        {
          index: 1,
          image: values3Image,
          show: false,
          description: "Supporting communities with Muslim minorities outside the Kingdom",
          title: "At the international level",
        },
        {
          index: 2,
          image: values1Image,
          show: false,
          description: "- Sponsoring the best engineering design award competition -Contribute to the establishment of Prince Sultan Private University by donating land equivalent to 5 million riyals",
          title: "On the educational level",
        },
        {
          index: 3,
          image: values2Image,
          show: false,
          description: "– Donating to the headquarters of Al-Bir Charitable Society in Riyadh – Contributing to the establishment of social centers to serve the elderly, such as the King Salman Center",
          title: "On the charitable level",
        },
      ],
      mobile: false, // Added a variable to track mobile screen
    }),
    mounted() {
      this.mobile = window.innerWidth <= 768; // Set the mobile variable based on screen width
    },
  };
  </script>
  
  <style scoped>
  .container {
    padding-top: 50px;
    background-image: url(../../assets/images/RealEstate-hero.png);
    background-size: cover;
  }
  
  .page-title {
    text-align: center;
    font-size: 50px;
    margin-bottom: 20px;
  }
  
  .main-row {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
  }
  
  .custom-card {
    transition: background-color 0.3s;
    background-color: #333;
  }
  
  /* Apply hover effect to the v-card element */
  .custom-card .card-content.hovered {
    background-color: rgba(117, 117, 117, 0.8);
  }
  
  @media (max-width: 768px) {
    .container {
      padding-top: 0;
    }
  
    .main-row {
      margin-top: 20px;
    }
  
    .page-title {
      font-size: 18px;
    }
  
    .custom-card {
      max-width: 100%;
    }
  }
  </style>
  