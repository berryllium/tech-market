export default {
  actions: {
    fetchCatalog(ctx) {
      fetch("db/catalog.json")
        .then(response => response.json())
        .then(json => ctx.commit('updateCatalog', json))
    },
    selectCategory(ctx, category) {
      ctx.commit('setCategory', category)
    },
    search(ctx, str) {
      ctx.commit('filterSearch', str)
    }
  },
  mutations: {
    updateCatalog(state, catalog) {
      state.categories = catalog[0].categories
      state.catalog = catalog[1].products
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
    catalog: [],
    filteredCatalog: [],
    categories: [],
    currentCategory: '',
    loading: true
  },
  getters: {
    allCategories(state) {
      return state.categories
    },
    currentCategory(state) {
      return state.currentCategory
    },
    allCatalog(state) {
      return state.filteredCatalog
    },
    oneProduct: (state) => (id) => {
      return state.catalog.find(element=> element.id == id)
    },
    categoryProducts: (state) => (category) => {
      return state.catalog.find(element=> element.category == category)
    },
    allFeedbacks(state) {
      return state.catalog.filter(element=> element.id == 1)[0].feedbacks
    },
    loadingState(state) {
      return state.loading
    }
  }
}