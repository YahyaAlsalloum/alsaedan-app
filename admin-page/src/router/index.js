import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import plogView from '../views/PlogView.vue'
import editPlog from '@/components/EditPlog.vue'
import realEstate from '@/views/RealEstate.vue'
import EditRealestate from '@/components/EditRealestate.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/plog',
    name: 'plog',
    component: plogView
  },
  {
    path: '/editPlog/:id',
    name: 'editPlog',
    component: editPlog
  },
  {
    path: '/editRealestate/:id',
    name: 'EditRealestate',
    component: EditRealestate
  },
  {
    path: '/real_estate',
    name: 'real_estate',
    component: realEstate
  },

]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
