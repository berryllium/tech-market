import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'

Vue.use(VueRouter)

const routes = [
  {
    mode: history,
    path: '/',
    component: Home,
    name: 'Home',
    props: true,
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
    path: '/feedback',
    component: () => import('../views/Feedback.vue')
  },
  {
    path: '/cart',
    component: () => import('../views/Cart.vue')
  },
  {
    path: '/product:id',
    name: 'product',
    props: true,
    component: () => import('../views/Product.vue')
  }
]

const router = new VueRouter({
  mode: 'history',
  routes
})

export default router
