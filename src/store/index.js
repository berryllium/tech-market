import Vue from 'vue'
import Vuex from 'vuex'
import catalog from './modules/catalog'
import cart from './modules/cart'
import feedbacks from './modules/feedbacks'
import createPersistedState from 'vuex-persistedstate'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
  },
  mutations: {
  },
  actions: {
  },
  modules: {
    catalog,
    cart,
    feedbacks
  },
  plugins: [createPersistedState({
    paths: ['cart'],
  })]
})
