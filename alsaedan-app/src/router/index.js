import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import Connectus from '../views/ConnectUs.vue'
import blog from '../views/PlogPage.vue'
import Services from '../views/ServicesPage.vue'
import AboutUs from '../views/AboutUs.vue'
import ShowReal from '@/components/Home-Page/ViewReal.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/Connectus',
    name: 'Connectus',
    component: Connectus
  },
  {
    path: '/blog',
    name: 'blog',
    component: blog
  },
  {
    path: '/Services',
    name: 'Services',
    component: Services
  },
  {
    path: '/about',
    name: 'about',
    component: AboutUs
  },
  {
    path: '/ShowReal/:id',
    name: 'showReal',
    component: ShowReal
  },

]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
