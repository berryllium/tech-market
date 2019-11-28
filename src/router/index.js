import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    component: Home
  },
  {
    path: '/about',
    component: () => import('../views/About.vue')
  },
  {
    path: '/delivery',
    component: () => import('../views/Delivery.vue')
  },
  {
    path: '/contacts',
    component: () => import('../views/Contacts.vue')
  },
  {
    path: '/guarantee',
    component: () => import('../views/Guarantee.vue')
  },
  {
    path: '/Feedback',
    component: () => import('../views/Feedback.vue')
  }
]

const router = new VueRouter({
  routes
})

export default router
