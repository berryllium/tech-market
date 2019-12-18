import $ from 'jquery'
export default {
  actions: {
    fetchCatalog(ctx) {
      fetch("admin?page=api")
        .then(response => response.json())
        .then(json => ctx.commit('updateCatalog', json))
    },
    sendFeedback(ctx, feedback) {
      $.ajax({
        type: "POST",
        url: "/admin/index.php?page=api&act=feedback",
        data: {
          feedback: feedback,
        },
        success: function (msg) {
          console.log(msg)
          ctx.commit('clearCart')
        }
      })
    },
    selectCategory(ctx, category) {
      ctx.commit('setCategory', category)
    },
    search(ctx, str) {
      ctx.commit('filterSearch', str)
    }
  },
  mutations: {
    updateFeedbacks(state, feedbacks) {
      state.feedbacks = feedbacks
    },
    updateCatalog(state, catalog) {
      console.log(catalog)
      state.catalog = catalog.products
      state.feedbacks = catalog.feedbacks
      state.categories = catalog.categories
      state.contacts = catalog.contacts
      state.filteredCatalog = state.catalog
      state.loading = false
    },
    setCategory(state, category) {
      state.currentCategory = category
    },
    filterSearch(state, str) {
      state.filteredCatalog = state.catalog.filter(product => {
        state.currentCategory = ''
        const reg = new RegExp(str, 'i')
        return reg.test(product.title)
      })
    }
  },
  state: {
    feedbacks: [],
    catalog: [],
    filteredCatalog: [],
    categories: [],
    contacts: [],
    currentCategory: '',
    loading: true
  },
  getters: {
    globalFeedbacks(state) {
      return state.feedbacks
    },
    allCategories(state) {
      return state.categories
    },
    currentCategory(state) {
      return state.currentCategory
    },
    allCatalog(state) {
      return state.catalog
    },
    filteredCatalog(state) {
      return state.filteredCatalog
    },
    oneProduct: (state) => (id) => {
      return state.catalog.find(element => element.id == id)
    },
    categoryProducts: (state) => (category) => {
      return state.catalog.find(element => element.category == category)
    },
    ratingProduct: (state) => (id) => {
      let rating = 0
      const product = state.catalog.find(element => element.id == id)
      if (!product.feedbacks.length) return 0
      product.feedbacks.forEach(el => {
        rating += +el.rating
      })
      return rating / product.feedbacks.length
    },
    allFeedbacks(state) {
      return state.catalog.filter(element => element.id == 1)[0].feedbacks
    },
    loadingState(state) {
      return state.loading
    },
    photoProduct: (state) => (id) => {
      return state.catalog.find(element => element.id == id).photo
    },
    getContacts: (state) => {
      return state.contacts
    }
  }
}