<template>
    <div class="about-us-container">
      <!-- Header Section -->
      <v-container fluid class="header-section">
        <v-row align="center">
          <v-col cols="12" md="6">
            <h1 class="display-2 text-h2 mb-4">{{$t('About Alsaedan Company')}}</h1>
            <p class="subtitle-1 text-h5">
              {{ $t('We are a leading real estate company dedicated to providing top-quality properties and exceptional service to our clients.') }}
            </p>
          </v-col>
          <v-col cols="12" md="6">
            <img src="@/assets/images/aboutus-new.png" alt="Company Image" class="company-image" />
          </v-col>
        </v-row>
      </v-container>
  
      <!-- Mission Section -->
      <v-container fluid class="mission-section">
        <v-row align="center">
          <v-col cols="12">
            <h2 class="text-h3 mb-4">{{$t('Our Mission')}}</h2>
            <p class="body-1 text-h5">
              {{ $t('At our company, our mission is to provide our clients with the best real estate solutions. We are committed to excellence, integrity, and customer satisfaction.') }}
            </p>
          </v-col>
        </v-row>
      </v-container>
  
      <!-- Team Section -->
      <v-container fluid class="team-section">
        <h2 class="text-h3 mb-4">{{$t('Meet Our Team')}}</h2>
        <v-row>
          <v-col cols="12" md="4" v-for="teamMember in teamMembers" :key="teamMember.id">
            <v-card class="team-card">
              <!-- Insert team member's image here -->
              <img :src="teamMember.image" :alt="teamMember.name" class="team-member-image" />
              <v-card-title class="text-h6">{{ $t(teamMember.name) }}</v-card-title>
              <v-card-subtitle>{{ $t(teamMember.title) }}</v-card-subtitle>
              <v-card-text>{{ $t(teamMember.description) }}</v-card-text>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </div>
    <div style="height: 400px;"></div>
  </template>
  
  <script>
  import fayez from "@/assets/images/fayez-d-al-dosary.png";
  import talal from "@/assets/images/talal-a-alnajar.png";
  import sultan from "@/assets/images/sultan-a-alkhudair.png";
  import badr from "@/assets/images/badr-a-al-hajri.png";
  export default {
    data: () => ({
      teamMembers: [
        {
          id: 1,
          name: 'Dr. Fayez Al-Dosari',
          title: 'GM Real Estate Services',
          description: 'He holds a bachelor’s degree in business administration from King Abdulaziz University. He has worked in the real estate field independently among a number of major real estate companies for a year. 2003 Experience in the real estate field for 7 years. He was promoted to a number of positions at Al Saeeda Buildings Company, becoming Sales Manager, Al-Qadisiyah Branch, then Director of Documents and Property Management, until he was promoted to the position of General Manager of Real Estate Services and Corporate Relations at Amlak International Real Estate Finance Company. Director of Investment and Investment Management at Bin Saedan Real Estate Company for two years. Director of Financial Affairs at Al Saedan Real Estate Company in 2010.',
          image: fayez,
        },
        {
          id: 2,
          name: 'Talal Abdel Najjar',
          title: 'Sales Manager',
          description: 'He holds a masters and bachelors degree in business administration from Prince Sultan University in Riyadh Experience in financial and real estate investments, planning and business development, as well as in evaluating real estate market trends and competitors for more than 10 years as Business Development Manager at Al Mutlaq Real Estate Investment Company Real estate portfolio manager at Zahran Redundancy Group, senior financial analyst at Jones Lang LaSalle and at McCain Capital International.',
          image: talal,
        },
        {
          id: 3,
          name: 'Badr Al Hajri',
          title: 'Chief Financial Officer',
          description: 'He holds a bachelor’s degree in finance from Qassim University. He holds a master’s degree in economics from Murray State University in the United States of America. He has experience in the field of corporate finance in several banks and financing companies for 5 years.',
          image: badr,
        },
        {
          id: 4,
          name: 'Sultan AIKhudair',
          title: 'CEO',
          description: 'He holds a bachelor’s degree in accounting from King Saud University. Experience in investment portfolios and relationships for more than 12 years. Director of corporate relations at Al Rajhi Bank. Director of asset management and investment portfolio at Ann Saedan Real Estate Company. He was promoted to general manager of real estate services management.',
          image: sultan,
        },
        // Add more team members as needed
      ],
    }),
  };
  </script>
  
  <style scoped>
  .about-us-container {
    padding: 20px;
  }
  
  .header-section {
    background-color: #f7f7f7;
    padding: 40px 0;
    text-align: center;
  }
  
  .company-image {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
  }
  
  .mission-section {
    background-color: #fff;
    padding: 40px 0;
    text-align: center;
  }
  
  .team-section {
    padding: 40px 0;
    text-align: center;
  }
  
  .team-card {
    max-width: 300px;
    margin: 0 auto;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }
  
  .team-member-image {
    max-width: 100%;
    height: auto;
    border-radius: 50%;
  }
  </style>
  