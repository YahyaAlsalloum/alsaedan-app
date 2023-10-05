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
        <!-- =============================== land  -->
<div v-show="sector.id=== 'Land'">
  <ul>
<li v-for="item in lands" :key="item.id" style="font-weight: bold; font-size: xx-large;list-style: none;">
  <v-card class="mt-10" style="background-color: rgb(131, 215, 244);">
    <h6>
      {{ $t(item.name) }}<span class="hint-text">{{ $t(item.location) }}</span>   <v-btn :icon="item.show ? 'mdi-chevron-up' : 'mdi-chevron-down'" @click="toggleItem(item)"></v-btn>
    </h6>
  </v-card>
  <v-expand-transition style="background-color: lightblue;">
                  <div v-show="item.show">
                    <v-divider opacity="50"></v-divider>
                    <v-card-text>{{$t(item.details)}}</v-card-text><v-avatar style="width: fit-content;height: fit-content;padding: 10px;" color="white">{{$t('area')}}:{{item.area }}</v-avatar>
                  </div>
                </v-expand-transition>
</li>
</ul>
</div>
        <!-- if sector= Commercial ============================== -->
<div v-show="sector.id=== 'Commercial'">
  <v-container>
      <v-row>
        <v-col v-for="property in Commercial" :key="property.id" cols="12">
          <v-card class="blue-card"  >
            <v-card-title class="white--text mt-3">{{ $t(property.name) }}</v-card-title>
            <v-divider class="my-3" color="white" style="height: 4px;"></v-divider>
            <v-card-text>
              <p v-if="property.location"><strong>{{ $t('Location') }}:</strong> {{ $t(property.location) }}</p>
              <p v-if="property.type"><strong>{{ $t('type') }}:</strong> {{ $t(property.type) }}</p>
              <p v-if="property.Date"><strong>{{ $t('Date of establishment') }}:</strong> {{ $t(property.Date) }}</p>
              <p v-if="property.units"><strong>{{ $t('Number of Units') }}:</strong> {{ $t(property.units) }}</p>
              <p v-if="property.area"><strong>{{ $t('Land Area') }}:</strong> {{ property.area }} {{ $t('m2') }}</p>
              <p v-if="property.Flat"><strong>{{ $t('Land Area') }}:</strong> {{ property.Flat }} </p>
            </v-card-text>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
</div>
        <!-- if sector= Hospitality  =====================-->
<div v-show="sector.id=== 'Hospitality'">
  <v-container>
      <v-row>
        <v-col v-for="property in Hospitality" :key="property.id" cols="12">
          <v-card class="blue-card"  >
            <v-card-title class="white--text mt-3">{{ $t(property.name) }}</v-card-title>
            <v-divider class="my-3" color="white" style="height: 4px;"></v-divider>
            <v-card-text>
              <p><strong>{{ $t('Location') }}:</strong> {{ $t(property.location) }}</p>
              <p><strong>{{ $t('Number of Units') }}:</strong> {{ $t(property.units) }}</p>
              <p><strong>{{ $t('Flat Construction') }}:</strong> {{ property.Flat }}</p>
              <p><strong>{{ $t('Land Area') }}:</strong> {{ property.area }} {{ $t('m2') }}</p>
            </v-card-text>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
</div>
        <!-- if sector= Logistics ========================== -->
<div v-show="sector.id=== 'Logistics'">
  <v-container>
      <v-row>
        <v-col v-for="property in Logistics" :key="property.id" cols="12">
          <v-card class="blue-card"  >
            <v-card-title class="white--text mt-3">{{ $t(property.name) }}</v-card-title>
            <v-divider class="my-3" color="white" style="height: 4px;"></v-divider>
            <v-card-text>
              <p><strong>{{ $t('Location') }}:</strong> {{ $t(property.location) }}</p>
              <p><strong>{{ $t('Project services') }}:</strong> {{ $t(property.services) }}</p>
              <p><strong>{{ $t('Land Area') }}:</strong> {{ property.area }} {{ $t('m2') }}</p>
            </v-card-text>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
</div>
        <!-- if sector= Residential ============================================ -->
<div v-show="sector.id=== 'Residential'">
  <v-container>
      <v-row>
        <v-col v-for="property in Residential" :key="property.id" cols="4">
          <v-card class="blue-card"  >
            <v-card-title class="white--text mt-3">{{ $t(property.name) }}</v-card-title>
            <v-divider class="my-3" color="white" style="height: 4px;"></v-divider>
            <v-card-text>
              <p><strong>{{ $t('Location') }}:</strong> {{ $t(property.location) }}</p>
              <p><strong>{{ $t('Number of Units') }}:</strong> {{ $t(property.units) }}</p>
              <p><strong>{{ $t('Flat Construction') }}:</strong> {{ property.Flat }}</p>
              <p><strong>{{ $t('Land Area') }}:</strong> {{ property.area }} {{ $t('m2') }}</p>
            </v-card-text>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
</div>
      </v-col>
      <!-- images carousel ---------------------------------->
      <v-col cols="12" md="6" v-if="sector.open">
        <v-row>
          <v-carousel cycle height="300" hide-delimiter-background show-arrows="hover">
            <v-carousel-item v-for="(slide, i) in slides" :key="i">
              <img :src="slide" style="max-width: 100%; height: auto;">
            </v-carousel-item>
          </v-carousel>
        </v-row>
        
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
      name: 'Alolaya landplot(690)',
      location:'Alolaya, Riyadh',
      details: 'The Olaya neighborhood, which embraces the most prominent landmarks of the capital, Riyadh, such as the Kingdom Towers and Al-Faisaliah Towers, and vital roads such as King Fahd Road and Mecca Road, making it one of the most lively neighborhoods in Riyadh, and from it was the beginning of land development at Al Saedan Real Estate Company. The year of development was 1970',
      area:'2,682,000 m2',
      show: false,
    },
    {
      id: 2,
      name: 'Al-Qadisiyah Plan (2160/A)',
      location:'Al-Qadisiyah, Riyadh',
      details: 'Al-Qadisiyah plan is located east of the city of Riyadh on Imam Abdullah bin Saud bin Abdulaziz Road. It is also bordered to the north by Dammam Road and to the west by Sheikh Jaber Road. Among the most prominent nearby landmarks are King Fahd International Airport and the car showroom grounds, developed in 1979 AD.',
      area:'1,000,000 m2',
      show: false,
    },
    {
      id: 3,
      name: 'Al-Murasalat Neighborhood Plan (1324)',
      location:'Al Mursalat, Riyadh',
      details: 'Al-Murasalat neighborhood is one of the oldest neighborhoods in the Olaya Municipality - north of Riyadh. The neighborhood is characterized by its quiet atmosphere and abundance of required services such as: mosques, schools, shopping and entertainment places, and medical services. Year of development 1980',
      area:'1,500,000 m2',
      show: false,
    },
    {
      id: 4,
      name: 'Al-Muruj/Al-Masif neighborhood plan (2593/c)',
      location:'Al Murooj, Riyadh',
      details: 'Al-Muruj neighborhood is one of the most important neighborhoods in the north of the city of Riyadh, affiliated with the Olaya Municipality, due to the increasing demand for housing there due to the abundance of services and facilities: such as schools, mosques, places of entertainment, shopping, and medical services. Year of development: 1983',
      area:'2,108,000 m2',
      show: false,
    },
    {
      id: 5,
      name: 'Al Nakheel Neighborhood Plan (2593/C)',
      location:'Al Nakheel, Riyadh',
      details: 'Al Nakheel neighborhood is also one of the most important, quiet, upscale residential neighborhoods in northern Riyadh. The neighborhood is distinguished by its proximity to King Saud University and the King Abdullah Financial Center, and provides services such as mosques, schools, entertainment and shopping places, and medical services. Year of development 1983 AD',
      area:'2,756,356 m2',
      show: false,
    },
    {
      id: 6,
      name: 'Muhammadiyah District Plan (1578/B)',
      location:'Muhammadiyah, Riyadh',
      details: 'Al-Muhammadiyah neighborhood is one of the most prestigious and lively residential neighborhoods in northern Riyadh, which connects 4 main streets, Turki Al-I, Al-Takhasosi, Al-Imam Road, and King Abdullah Road. Year of development 1983 AD',
      area:'1,500,000 m2',
      show: false,
    },
    {
      id: 7,
      name: 'Rahmaniya neighborhood plan (2822)',
      location:'Al Rahmaniyah, Riyadh',
      details: 'Al-Rahmaniyah neighborhood is also one of the most important, quiet, upscale neighborhoods in northern Riyadh. It is one of the neighborhoods affiliated with the Municipality of Al-Ma’athar, close to all services. It is characterized by a strategic location that facilitates entry into and exit from it. Year of development: 1985 AD',
      area:'1,720,000 m2',
      show: false,
    },
    {
      id: 8,
      name: 'Granada plan (2956)',
      location:'Granada district, Riyadh',
      details: 'The Granada plan is located in the northeast of the city of Riyadh and is distinguished by its intersection with the former Khalid bin Al-Walid Inkas Road and the Imam Abdullah bin Saud bin Abdulaziz Road. Year of development 1993 AD',
      area:'304.426 m2',
      show: false,
    },
    {
      id: 9,
      name: 'Al-Rehab plan, Al-Salmaniyah neighborhood (14/m)',
      location:'Al Murooj, Riyadh',
      details: 'Al-Rehab Plan is a model project to develop an integrated neighborhood that keeps pace with the development of Diriyah Governorate, an extension of King Khalid Road opposite Al-Malqa District and its urban extension towards the north, five minutes away from King Saud University, and is characterized by unprecedented tranquility and beauty. Year of development 2008 AD',
      area:'1,335,042 m2',
      show: false,
    },
    {
      id: 10,
      name: 'Al-Khuzama Plan, Al-Malqa District (3226)',
      location:'Al-Malaki, Riyadh',
      details: 'Al-Khuzama plan in the northern front of Riyadh - Al-Malqa district - is one of the modern, upscale neighborhoods in the north of the capital and is considered one of the most sought-after areas among those searching for real estate in Riyadh due to its strategic location and what is characterized by sophistication, tranquility and abundance of services. Year of development 2009 AD',
      area:'1,000,000 m2',
      show: false,
    },
    {
      id: 11,
      name: 'mukhatat tayiba ( 3390 )',
      location:'Taiba, Riyadh',
      details: 'The plan is located in the south of the city of Riyadh, along the Al-Aziziyah main road with Al-Yaqout Street branching off from Al-Kharj Road, and the area is characterized by population density and proximity to public services. Year of development 2014 AD',
      area:'1,682,010.77 m2',
      show: false,
    },
    {
      id: 12,
      name: 'Ribal 1 plan, Al-Rimal neighborhood (3240/A)',
      location:'Al Rimal, Riyadh',
      details: 'The Ribal 1 plan in the heart of the city of Arab heritage, culture and values - Al-Rimal neighborhood - Al-Janadriyah Road, east of Riyadh, is a model of the concept of an upscale residential neighborhood. Year of development 2019 AD',
      area:'1,004,653 m2',
      show: false,
    },
    {
      id: 13,
      name: 'Yunusiya chart (3868)',
      location:'Al-Younisiyah, Riyadh',
      details: 'The Yunusiyah scheme is located in the Al-Arid neighborhood, north of the city of Riyadh, on King Abdulaziz Road. It is distinguished by its proximity to the Al-Amana and Al-Arid plans, and easy access to the scheme via the Special Forces Bridge. It is currently considered part of the King Salman bin Abdulaziz development project for the city north of Riyadh. Development year 2019 AD',
      area:'435,081.81 m2',
      show: false,
    },
    {
      id: 14,
      name: 'Ribal 2 plan, Al-Rimal district (3936)',
      location:'Al Rimal, Riyadh',
      details: 'The Ribal 2 plan - Al-Rimal District - east of Riyadh is located in the middle of some of the most important landmarks of the city of Riyadh, such as: King Khalid International Airport, King Abdulaziz Equestrian Square, the National Festival for Heritage and Culture, Al-Janadriyah, Naif College for National Security, King Fahd Security College, and King Fahd Stadium. Year of development 2022 AD',
      area:'1,073,612 m2',
      show: false,
    },
    {
      id: 15,
      name: 'Olaya Hills Plan (654 c/h)',
      location:'Southern Obhur, Jeddah',
      details: 'The Olaya Hills plan is located in the south of Obhur, Medina Road, and is distinguished by its distinguished location, close to the new Roshen project, King Abdullah Sports City, and the Social Insurance Project. It is 8 km away from King Abdulaziz Airport. The residential plan was approved for residential buildings with 4.5 floors for each residential building. It is currently being developed and will be completed at the beginning of the first quarter of 2024 AD...',
      area:'694,607 m2',
      show: false,
    },
    
  ],
  Residential:[
    {
      "id":1,
      "name":"Al Nobalaa Compound",
    "location":"Riyadh - Al-Rehab District",
      "units":"22 villas/220 apartments",
      "Flat":"31,532",
      "area":"40,790",
  
  },
    {
      "id":2,
      "name":"Marada Compound",
    "location":"Riyadh - Al-Taawun District",
      "units":"10 villas/145 apartments",
      "Flat":"23,443",
      "area":"12,941",
  
  },
    {
      "id":3,
      "name":"Al Nafal Compound",
    "location":"Riyadh - Al-Nafal District",
      "units":"40 villas",
      "Flat construction":"14,767",
      "area":"13,782",
  
  },
  ],
  Logistics:[
    {
      "id":1,
      "name":"Sunset station",
      "location":"Riyadh - Tuwaiq district",
      "services": "gas stations",
      "area":"6275.66",
    },
    {
      "id":2,
      "name":"Al-Masif station",
      "location":"Riyadh - Al-Masif district",
      "services": "gas stations",
      "area":"4440",
    },
    {
      "id":3,
      "name":"Taiba station",
      "location":"Riyadh - Taiba district",
      "services": "gas stations",
      "area":"6023",
    },
    {
      "id":4,
      "name":"Sudair Station - 1",
      "location":"The twim",
      "services": "gas stations",
      "area":" 60000",
    },
    {
      "id":5,
      "name":"Jeddah Logistics warehouses",
      "location":"South of Jeddah - Al-Khamra district",
      "services": "depot",
      "area":" 77,461",
    },
  ],
  Hospitality:[
    {
      "id":1,
      "name":"Courtyard Hotel - Riyadh",
    "location":"Riyadh, Al Murooj district",
      "units":"9 floors/220 rooms",
      "Flat":"12,052",
      "area":"10,683",
    },
  ],
  Commercial:[
  {
      "id":1,
      "name":"Tijan Plaza - Riyadh",
    "location":"Riyadh - Salmaniya",
    "type":"Restaurants - coffee shops - offices",
    "Date": "2015",
      "units":"",
      "Flat":"5403.532",
      "area":"5403.532",
    },
  {
      "id":2,
      "name":"Rawana Plaza 1 - Riyadh",
    "location":"Riyadh - Al-Taawoun",
    "type":"Restaurants - coffee shops - beauty center",
    "Date": "2015",
      "units":"13",
      "Flat":"1,650",
      "area":"2116.522",
    },
  {
      "id":3,
      "name":"Rawana Plaza 2 - Riyadh",
    "location":"Riyadh - Al-Taawoun",
    "type":"Showrooms - offices",
    "Date": "2021",
      "units":"5",
      "Flat":"6444",
      "area":"",
    },
  {
      "id":4,
      "name":"Family Oasis - Riyadh",
    "location":"Riyadh - King Fahd District",
    "type":"Centrepoint clothing sale",
    "Date": "1986",
      "units":"",
      "Flat":"",
      "area":"103422",
    },
  {
      "id":5,
      "name":"Madrid Building - Riyadh",
    "location":"Madrid - Riyadh",
    "type":"Zakat and income offices",
    "Date": "2005",
      "units":"",
      "Flat":"",
      "area":"152892",
    },
  {
      "id":6,
      "name":"Al-Murasalat Building - Riyadh",
    "location":"Riyadh - Al-Muruj district",
    "type":"Offices",
    "Date": "",
      "units":"",
      "Flat":"",
      "area":"",
    },
  {
      "id":7,
      "name":"Concord Building - Riyadh",
    "location":"Riyadh - Al-Muruj district",
    "type":"Electricity company offices",
    "Date": "2003",
      "units":"",
      "Flat":"",
      "area":"2556.16",
    },
  {
      "id":8,
      "name":"Al Saedan Company Tower - Riyadh",
    "location":"Riyadh - Al-Muruj district",
    "type":"Offices",
    "Date": "2006",
      "units":"",
      "Flat":"10,950",
      "area":"",
    },
  {
      "id":9,
      "name":"Stage Center - Riyadh",
    "location":"Riyadh - Al-Muruj district",
    "type":"Offices - restaurants - coffee shops - hotels",
    "Date": "2022",
      "units":"225 apartments / 20 galleries",
      "Flat":"",
      "area":"63500",
    },
  {
      "id":10,
      "name":"Rawana Plaza 3 - Riyadh",
    "location":"Riyadh - Al-Qadisiyah district",
    "type":"Showrooms - offices",
    "Date": "2021",
      "units":"4 offices / 3 showrooms",
      "Flat":"",
      "area":"1869",
    },
  {
      "id":11,
      "name":"Al Diyar workers housing complex",
    "location":"Riyadh - Al-Taawun District",
    "type":"Showrooms - offices",
    "Date": "",
      "units":"1200",
      "Flat":"157,773",
      "area":"101,698",
    },
  {
      "id":12,
      "name":"Al Murooj Building",
    "location":"Riyadh - Al-Muruj district",
    "type":"",
    "Date": "",
      "units":"3 Number of floors",
      "Flat":"7,346",
      "area":"12,721",
    },
  {
      "id":13,
      "name":"Elegance Tower",
    "location":"Riyadh - Al-Muruj district",
    "type":"",
    "Date": "",
      "units":"29 Number of floors",
      "Flat":"225.83",
      "area":"5,695",
    },
  {
      "id":14,
      "name":"Garden Square project",
    "location":"Al-Masif neighborhood on the Northern Ring Road in Riyadh",
    "type":"2 basements, in addition to commercial showrooms, restaurants and cinemas",
    "Date": "",
      "units":"",
      "Flat":"20,546",
      "area":"10,684",
    },
  {
      "id":15,
      "name":"Oro project",
    "location":"Al-Tawmiya neighborhood on King Fahd in Riyadh",
    "type":"The project consists of 1 basement, in addition to commercial showrooms, restaurants, and cinemas",
    "Date": "",
      "units":"",
      "Flat":"16,000 + 20،000 for basements ",
      "area":"10,684",
    },
  {
      "id":16,
      "name":"Ribal Commercial Project",
    "location":"Al Rimal, Riyadh",
    "type":"Exhibitions, restaurants and supermarkets",
    "Date": "",
      "units":"",
      "Flat":"10,000",
      "area":"26,443",
    },
  {
      "id":17,
      "name":"Al-Qadisiyah station project",
    "location":"Al-Qadisiyah, Riyadh",
    "type":"A distinctive petrol station that includes shops, restaurants and a drive-thru",
    "Date": "",
      "units":"",
      "Flat":"4,000",
      "area":"12,240",
    },
  {
      "id":18,
      "name":"Sunset Commercial Project",
    "location":"Najm Al-Din Road, Al-Shoroub District, Riyadh",
    "type":"Lulu supermarket, restaurants and retail stores",
    "Date": "",
      "units":"",
      "Flat":"8,000",
      "area":"24,000",
    },
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
          sector.open = true; // Toggle the open state for the selected sector
        } else {
          sector.open = false; // Close other sectors
        }
      });
    },
    
  },

};
</script>
  <style scoped>
  .blue-card {
  background-color: rgb(26, 35, 126);
  border-radius: 10px;
  color: white;
  margin: 20px;
}
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
  .hint-text {
  font-size: small; 
  color: gray; 
  margin-left: 5px; 
} 
  </style>
  