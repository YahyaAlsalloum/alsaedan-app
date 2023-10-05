<template>
  <div class="real-estate-page">
    <!-- Hero Image Section -->
    <v-row class="hero-section">
      <v-col cols="12">
        <div>
          <v-carousel cycle height="400" hide-delimiter-background show-arrows="hover">
            <v-carousel-item v-for="(slide, i) in slides" :key="i">
              <img :src="slide" style="max-width: 100%; height: auto;">
            </v-carousel-item>
          </v-carousel>
        </div>
      </v-col>
    </v-row>

    <v-row class="sectors-section">
      <v-col cols="12">
        <h2 class="text-h3 mb-4" :key="$i18n.locale">{{$t('Real Estate Sectors')}}</h2>
      </v-col>

      <!-- Cards for each sector -->
      <v-col cols="12" md="4" v-for="sector in sectors" :key="sector.id">
        <v-card class="sector-card" @click="toggleSector(sector)">
          <div class="sector-image">
            <v-icon>mdi-{{ sector.icon }}</v-icon>
          </div>
          <v-card-title class="text-h6">{{ $t(sector.name) }}</v-card-title>
        </v-card>
      </v-col>
    </v-row>

    <!-- Sections for each sector -->
    <v-row class="section mt-0" v-for="sector in sectors" :key="sector.id" v-show="sector.open">
      <v-col cols="12" v-if="sector.open">
        <h2 class="text-h3 mt-0">{{ $t(sector.name) }}</h2>
      </v-col>

      <!-- ==================show belaw========================= -->
      <v-col cols="12" md="6" v-if="sector.open">
        <!-- if sector= land  -->
<div v-show="sector.id=== 'Land'">
  <ul>
<li v-for="item in lands" :key="item.id" style="font-weight: bold; font-size: xx-large;list-style: none;">
  {{ $t(item.name) }} <span>{{ item.location }}</span>
  <v-btn :icon="item.show ? 'mdi-chevron-up' : 'mdi-chevron-down'" @click="toggleItem(item)"></v-btn>
  <v-expand-transition>
                  <div v-show="item.show">
                    <v-divider></v-divider>
                    <v-card-text>{{$t(item.details)}}</v-card-text>
                  </div>
                </v-expand-transition>
</li>
</ul>
</div>
        <!-- if sector= Commercial  -->
<div v-show="sector.id=== 'Commercial'">
<h1>yoooooo Commercial</h1>
</div>
        <!-- if sector= Hospitality  -->
<div v-show="sector.id=== 'Hospitality'">
<h1>yoooooo Hospitality</h1>
</div>
        <!-- if sector= Logistics  -->
<div v-show="sector.id=== 'Logistics'">
<h1>yoooooo Logistics</h1>
</div>
        <!-- if sector= Residential  -->
<div v-show="sector.id=== 'Residential'">
<h1>yoooooo Residential</h1>
</div>
      </v-col>
      <!-- images carousel -->
      <v-col cols="12" md="6" v-if="sector.open">
        <div>
          <v-carousel cycle height="300" hide-delimiter-background show-arrows="hover">
            <v-carousel-item v-for="(slide, i) in slides" :key="i">
              <img :src="slide" style="max-width: 100%; height: auto;">
            </v-carousel-item>
          </v-carousel>
        </div>
      </v-col>
    </v-row>
  </div>
  <div style="height: 400px;"></div>
  
</template>

  <script>

  import img1 from "@/assets/images/t3.jpg";
  import img2 from "@/assets/images/home-hero.png";
  import img3 from "@/assets/images/identity-bg.png";
  import img4 from "@/assets/images/project_4.jpg";
  import img5 from "@/assets/images/project_2.jpg";   
export default {
  
  data: () => ({
    lands: [
    {
      id: 1,
      name: 'Alolaya landplot',
      location:'Al-Qadisiyah, Riyadh',
      details: 'The Olaya neighborhood, which embraces the most prominent landmarks of the capital, Riyadh, such as the Kingdom Towers and Al-Faisaliah Towers, and vital roads such as King Fahd Road and Mecca Road, making it one of the most lively neighborhoods in Riyadh, and from it was the beginning of land development at Al Saedan Real Estate Company. The year of development was 1970',
      show: false,
    },
    {
      id: 2,
      name: 'Al-Qadisiyah landplot',
      location:'Al-Qadisiyah, Riyadh',
      details: 'Details for Land 2 Lorem ipsum dolor sit amet.',
      show: false,
    },
    // Add more land items here
  ],
    slides: [img1,img2,img3,img4,img5],
    sectors: [
      {
        id: 'Commercial',
        name: 'Commercial Sector',
        icon: 'domain',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        open: false,
      },
      {
        id: 'Hospitality',
        name: 'Hospitality Sector',
        icon: 'hand-heart',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        open: true,
      },
      {
        id: 'Logistics',
        name: 'Logistics Sector',
        icon: 'bridge',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        open: false,
      },
      {
        id: 'Land',
        name: 'Land Sector',
        icon: 'barley',
        description:"Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        open: false,
        
      },
      {
        id: 'Residential',
        name: 'Residential Sector',
        icon: 'office-building',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        open: false,
      },
    ],
  }),

  methods: {
  
    toggleItem(item) {
      // Close all items before opening the clicked one
      this.lands.forEach(land => {
        if (land !== item) {
          land.show = false;
        }
      });
      // Toggle the 'show' property for the clicked item
      item.show = !item.show;
    },
    toggleSector(selectedSector) {
      this.sectors.forEach(sector => {
        if (sector === selectedSector) {
          sector.open = !sector.open; // Toggle the open state for the selected sector
        } else {
          sector.open = false; // Close other sectors
        }
      });
    },
    
  },

};
</script>
  <style scoped>
  .real-estate-page {
    padding: 20px;
  }
  
  .hero-section {
    background-color: #f7f7f7;
    padding: 40px 0;
    text-align: center;
  }
  
  .section {
    margin-top: 0;
    margin-bottom: 0;
    padding-top: 20px; /* Adjust this value as needed */
    padding-bottom: 20px; /* Adjust this value as needed */
    text-align: center;
  }
  
  .sectors-section {
    background: linear-gradient(rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.7)), url('@/assets/images/brokerage.png');
    background-size: cover;
    background-position: bottom;
    padding: 40px 0;
    text-align: center;
  }
  
  .sector-card {
    cursor: pointer;
    transition: transform 0.2s ease-in-out;
    background-color: rgba(255, 255, 255, 0.8); /* Transparent background */
    border-radius: 8px;
  }
  
  .sector-card:hover {
    transform: scale(1.05);
  }
  
  .sector-image img {
    max-width: 100%;
    height: auto;
  }
  
  .section {
    padding: 40px 0;
    text-align: center;
  }
  
  .photo-slider {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }
  
  .photo-slider img {
    max-width: 100%;
    height: auto;
    margin: 10px;
  }
  </style>
  