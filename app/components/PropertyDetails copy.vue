<template>
  <div class="property-details">
    <h2 class="property-details__heading">
      {{ property.address.property_name }},
      {{ property.address.road_name }}
    </h2>
    <h3 class="property-details__sub-heading color-grey">
      Available from {{ availableFrom }}
    </h3>
    <div class="property-details__rooms">
      <span>
        <img src="./../assets/images/icon-bed.png" />
        <p>{{ property.cluster_size }} Bedroom</p>
      </span>
      <span>
        <img src="./../assets/images/icon-bath.png" />
        <p>{{ property.bathrooms }} Bathroom</p>
      </span>
      <span>
        <img src="./../assets/images/icon-couch.png" />
        <p>1 Living Space</p>
      </span>
    </div>
    <h3 class="property-details__sub-heading">
      <span class="fw-normal">£{{ calculateRentPerMonth }} PCM</span>
      Excluding Bills
    </h3>
    <LinkButton
      :to="property.contracts[0].book_now_url"
      :color="'orange'"
      :size="'large'"
      :name="'BOOK NOW'"
      class="mt-15"
    />
  </div>
</template>

<script>
import LinkButton from './LinkButton.vue'

export default {
  components: {
    LinkButton
  },
  props: {
    property: {
      type: Object,
      default: () => {}
    }
  },
  computed: {
    /**
     * Calculates rent PCM based on the weekly prices in the first contract.
     */

    calculateRentPerMonth() {
      const prices = this.property.contracts[0].prices
      const pricePerWeek = parseInt(prices[0].price_per_person_per_week)

      return Math.floor((pricePerWeek * 52) / 12)
    },

    /**
     * Generates a string with the month and year of the start date.
     */

    availableFrom() {
      const startDate = this.property.contracts[0].start_date
      const numericMonth = parseInt(startDate.match(/\b\d{2}(?=-)/))
      const year = startDate.match(/^\d{4}/)
      const months = [
        'Jan',
        'Feb',
        'Mar',
        'Apr',
        'May',
        'Jun',
        'Jul',
        'Aug',
        'Sep',
        'Oct',
        'Nov',
        'Dec'
      ]

      let str = ''

      months.forEach((month, index) => {
        if (++index === numericMonth) {
          str = `${month} ${year}`
        }
      })

      return str
    }
  }
}
</script>

<style lang="postcss" scoped>
.property-details {
  position: absolute;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  top: 11px;
  left: 367px;
  height: 228px;
  width: 385px;
  padding: 25px;
  border: 1px solid #f0f0f0;
  background-color: #ffffff;
  font-family: Open Sans;

  &__heading {
    margin-bottom: 10px;
    font-size: 18px;
    font-weight: 300;
    line-height: 25px;
  }

  &__sub-heading {
    font-size: 14px;
    font-weight: 300;
    line-height: 19px;
  }

  &__rooms {
    display: flex;
    align-items: center;
    margin: 12.5px 0;
    font-weight: 300;
    font-size: 12px;
    line-height: 16px;

    & > span {
      display: flex;
      margin-right: 15px;

      & > * {
        align-self: center;
      }

      & > p {
        margin-left: 5px;
      }
    }
  }
}
</style>
