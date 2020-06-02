<template>
  <div class="container">
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
        v-for="(property, pIndex) in filterContracts(propertyArr)"
        :key="pIndex"
      >
        <div
          v-for="(contract, index) in property.contracts"
          :key="index"
          class="property-card"
        >
          <div class="flex property-card__wrapper">
            <ImageSlider :photos="property.media.photos" />
            <PropertyDetails :contract-index="index" :property="property" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import ImageSlider from './../components/carousel/ImageSlider.vue'
import PropertyDetails from './../components/PropertyDetails.vue'
import LinkButton from './../components/LinkButton.vue'
import { filterContracts } from './../assets/javascript/utilities.js'

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
  mounted() {
    this.$store.subscribe((mutation, state) => {
      this.propertyArr = state.properties
    })
  },
  methods: {
    filterContracts: (arr) => filterContracts(arr)
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
</style>
