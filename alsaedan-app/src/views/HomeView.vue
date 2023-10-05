<template>
  <div class="home ">

  <UpperBanner></UpperBanner>
  <InfoPart1 style="margin-top: 50px;"></InfoPart1>
  <SectorsPage style="margin-top: 100px;"></SectorsPage>
  <ServicesPage style="margin-top: 50px;"></ServicesPage>
  <ContactUs style="margin-top: 100px;" ></ContactUs>
  <GoogleMAp style="margin-top: 50px;"></GoogleMAp>
  
  </div> 
</template>

<script>
import UpperBanner from "@/components/Home-Page/UpperBanner.vue"
import InfoPart1 from "@/components/Home-Page/InfoPart1.vue"
import SectorsPage from "@/components/Home-Page/SectorsPage.vue"
import ServicesPage from "@/components/Home-Page/ServicesPage.vue"
import GoogleMAp from "@/components/Home-Page/GoogleMAp.vue"
import ContactUs from "@/components/Home-Page/ContactUs.vue"


export default {
  name: 'HomeView',
  components:{
    UpperBanner,
    InfoPart1,
    SectorsPage,
    ServicesPage,
    GoogleMAp,
    ContactUs,
    },

  methods: {

  },
  
}
</script>
