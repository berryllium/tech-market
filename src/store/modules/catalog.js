export default {
  actions: {
    fetchCatalog(ctx) {
      fetch("db/catalog.json")
        .then(response => response.json())
        .then(json => ctx.commit('updateCatalog', json))
    }
  },
  mutations: {
    updateCatalog(state, catalog) {
      state.catalog = catalog
      state.loading = false
      console.log(catalog)
    }
  },
  state: {
    catalog: [],
    loading: true
  },
  getters: {
    allCatalog(state) {
      return state.catalog
    },
    oneProduct: (state) => (id) => {
      return state.catalog.find(element=> element.id == id)
    },
    allFeedbacks(state) {
      return state.catalog.filter(element=> element.id == 1)[0].feedbacks
    },
    loadingState(state) {
      return state.loading
    },
    allCategories(state) {
      let categories = [];
      state.catalog.forEach(element => {
        categories.push(element.category);
      });
      categories = [...new Set(categories)];
      return categories
    }
  }
}