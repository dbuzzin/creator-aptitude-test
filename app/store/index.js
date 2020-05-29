export const state = () => ({
  properties: []
})

export const mutations = {
  UPDATE_PROPERTIES(state, properties) {
    state.properties = properties
  }
}

export const actions = {
  loadProperties({ commit }) {
    this.$axios
      .get('http://localhost:8000/api')
      .then((result) => {
        commit('UPDATE_PROPERTIES', result.data.properties)
      })
      .catch((error) => {
        throw new Error(`API ${error}`)
      })
  }
}
