export default {
  mutations: {
    clickBuy(state, item) {
      let product = state.cart.find((el) => el.id === item.id)
      if (product) state.cart = state.cart.filter(function(el) {return el !== product})
      else {
        product = Object.assign({count: 1},item)
        state.cart.push(product)
      }
      state.jsonCart=JSON.stringify(state.cart)
    },
    addToCart(state, item) {
      let product = state.cart.find((el) => el.id === item.id)
      if (product) product.count ++
      else {
        product = Object.assign({count: 1},item)
        state.cart.push(product)
      }
      state.jsonCart=JSON.stringify(state.cart)
    },
    removeFromCart(state, item) {
      let product = state.cart.find((el) => el.id === item.id)
      if (product.count > 1) product.count --
      else state.cart = state.cart.filter(function(el) {return el !== product})
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
  }
}