<template>
  <div>
    <div
      v-for="(property, propertyIndex) in filterContracts(properties)"
      :key="propertyIndex"
      class="my-20"
    >
      <h2 class="property-title" @click="setOpenIndex(propertyIndex)">
        {{ property.address.property_name }},
        {{ property.address.road_name }}
      </h2>
      <UpdateBookNowContracts
        :property="property"
        :property-index="propertyIndex"
        :open-index="openIndex"
      />
    </div>
  </div>
</template>

<script>
import UpdateBookNowContracts from './UpdateBookNowContracts.vue'
import { filterContracts } from './../../assets/javascript/utilities.js'

export default {
  components: {
    UpdateBookNowContracts
  },
  data() {
    return {
      properties: this.$store.state.properties,
      openIndex: 0
    }
  },
  mounted() {
    this.$store.subscribe((mutation, state) => {
      this.properties = state.properties
    })
  },
  methods: {
    filterContracts: (arr) => filterContracts(arr),

    setOpenIndex(index) {
      this.openIndex = index
    }
  }
}
</script>

<style lang="postcss" scoped>
.property-title {
  font-size: 18px;
  font-weight: 400;
  line-height: 25px;

  &:hover {
    cursor: pointer;
  }
}
.form-inner {
  display: flex;
  flex-direction: column;

  &__field {
    padding: 10px;
  }
}
.form-input {
  border: 0;
  height: 35px;
  width: 300px;
  padding: 0 10px;

  &:focus {
    outline: none;
  }
}
</style>
