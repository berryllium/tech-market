import { stat } from "fs"

export default {
  mutations: {
    addToCart(state, id) {
      let product = state.cart.find(el => el.id === id)
      if (product) product.count ++
      else {
        product = {id: id, count: 1}
        state.cart.push(product)
      }
      state.jsonCart=JSON.stringify(state.cart)
    },
    setCount(state, item) {
      let product = state.cart.find(el => el.id === item.id)
      if (item.count > 0) product.count = item.count
      state.jsonCart=JSON.stringify(state.cart)
    },
    removeFromCart(state, id) {
      state.cart = state.cart.filter(el => el.id !== id)
      state.jsonCart=JSON.stringify(state.cart)
    },
    setCart(state) {
      state.cart = JSON.parse(state.jsonCart)
    },
    clearCart(state) {
      state.cart = []
      state.jsonCart=JSON.stringify(state.cart)
    }
  },
  state: {
    cart: [],
    jsonCart: "[]"
  },
  getters: {
    allCart(state) {
      return state.cart
    },
    getJsonCart(state) {
      return state.jsonCart
    },
    getCount: (state) => (id) => {
      return state.cart.find(element=> element.id == id).count
    },
    getAllCount: (state) => {
      return state.cart.length ? state.cart.length : ''
    }
  }
}