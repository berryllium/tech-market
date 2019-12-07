export default {
  actions: {
    fetchFeedbacks(ctx) {
      fetch("db/feedbacks.json")
        .then(response => response.json())
        .then(json => ctx.commit('updateFeedbacks', json))
    }
  },
  mutations: {
    updateFeedbacks(state, feedbacks) {
      state.feedbacks = feedbacks
      console.log(state.feedbacks)
    },
  },
  state: {
    feedbacks: []
  },
  getters: {
    globalFeedbacks(state) {
      return state.feedbacks
    }
  }
}