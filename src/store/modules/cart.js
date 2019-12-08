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
      console.log (state.jsonCart)
      alert("Добавление в корзину товара с id=" + id);
    },
    decCartProduct(state, id) {
      let product = state.cart.find(el => el.id === id)
      if (product.count > 1) product.count --
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
    }
  }
}