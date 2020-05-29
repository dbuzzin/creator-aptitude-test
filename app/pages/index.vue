<template>
  <div v-if="propertyArr.length" class="container">
    <nav class="nav">
      <LinkButton
        route-to="/control-panel"
        color="orange"
        size="small"
        name="Control Panel"
      />
    </nav>
    <div class="my-200">
      <div
        v-for="(property, pIndex) in filterContracts"
        :key="pIndex"
        class="property-card"
      >
        <div class="flex property-card__wrapper">
          <ImageSlider :photos="property.media.photos" />
          <PropertyDetails :property="property" />
        </div>
      </div>
    </div>
  </div>
  <div v-else class="container">
    <h3 class="loading">LOADING...</h3>
  </div>
</template>

<script>
import ImageSlider from './../components/carousel/ImageSlider.vue'
import PropertyDetails from './../components/PropertyDetails.vue'
import LinkButton from './../components/LinkButton.vue'

export default {
  components: {
    ImageSlider,
    PropertyDetails,
    LinkButton
  },
  data() {
    return {
      propertyArr: this.$store.state.properties
    }
  },
  computed: {
    filterContracts() {
      return this.propertyArr.filter((property) => property.contracts.length)
    }
  },
  created() {
    this.$store.dispatch('loadProperties')
  },
  mounted() {
    console.log(this.$store.state)
    this.$store.subscribe((mutation, state) => {
      this.propertyArr = state.properties
    })
  }
}
</script>

<style lang="postcss">
.nav {
  display: flex;
  justify-content: flex-end;
  padding: 10px;
  width: 100%;
}
.property-card {
  margin-bottom: 22px;
  background: radial-gradient(at bottom, #edeff0a8 1%, #ffffff 50%);

  &__wrapper {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 268px;
    width: 938px;
    overflow: hidden;
  }
}
.loading {
  letter-spacing: 5px;
  color: #f15b40;
  font-weight: 800;
}
</style>
