<template>
  <div class="carousel">
    <div ref="photoWrapper" class="photo-wrapper">
      <img
        v-for="(item, index) in photos"
        :key="index"
        :class="{ 'photo-wrapper__photo': true, fade: sliding }"
        :src="item.photo"
      />
    </div>
    <div class="flex">
      <div
        v-for="(item, index) in indicators"
        :key="index"
        :class="{
          indicator: true,
          'indicator--active': activeIndicator === index
        }"
        @click="slideImage(index)"
      ></div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    photos: {
      type: Array,
      default: () => []
    }
  },
  data() {
    return {
      slideSpeed: 150,
      slideCount: 0,
      slidePos: 0,
      sliding: false,
      currentIndex: 0,
      activeIndicator: 0,
      imageGutter: 28
    }
  },
  computed: {
    photoArr() {
      return [...this.photos]
    },
    indicators() {
      const arr = [...this.photoArr.filter((el, i) => ++i < this.photos.length)]

      return arr
    }
  },
  methods: {
    /**
     * Controls the image carousel
     *
     * @param {number} index - The index of the clicked indicator.
     */

    slideImage(index) {
      const wrapper = this.$refs.photoWrapper
      const imgWidth = wrapper.children[0].offsetWidth

      /**
       * Calculates the offset position of a given index
       *
       * @param {number} pos - The index of either the current carousel state or the last indicator clicked.
       * @returns {number} - The calculated value for the offset position.
       */

      const getPosition = (pos) => {
        return pos * (imgWidth + this.imageGutter)
      }

      const currentPosition = -getPosition(this.currentIndex)
      const nextPosition = -getPosition(index)

      /**
       * Calculates the distance between the current position and the next position to slide to.
       */

      const distanceToNext = Math.abs(currentPosition - nextPosition)

      /**
       * The amount the carousel will move on each frame.
       */

      const moveAmount = Math.ceil(distanceToNext / this.slideSpeed)

      /**
       * Sets the current index to the index of the last indicator clicked.
       */

      const stopSliding = () => {
        this.sliding = false
        this.currentIndex = index
      }

      /**
       * The next two functions animate the carousel sliding in either direction.
       *
       * @returns {Function} - Sets the current position to the index of the last clicked indicator.
       */

      const moveForward = () => {
        if (this.slidePos === currentPosition + distanceToNext) {
          return stopSliding()
        }
        if (this.slidePos + moveAmount > currentPosition + distanceToNext) {
          this.slidePos += 1
        } else {
          this.slidePos += moveAmount
        }

        wrapper.style.left = `${this.slidePos}px`

        requestAnimationFrame(moveForward)
      }

      const moveBackward = () => {
        if (this.slidePos === currentPosition - distanceToNext) {
          return stopSliding()
        }
        if (this.slidePos - moveAmount < currentPosition - distanceToNext) {
          this.slidePos -= 1
        } else {
          this.slidePos -= moveAmount
        }

        wrapper.style.left = `${this.slidePos}px`

        requestAnimationFrame(moveBackward)
      }

      if (!this.sliding) {
        this.sliding = true
        this.activeIndicator = index

        /**
         * Calls the direction specific function based on whether the index of the next indicator clicked is higher or lower than the previous
         */

        requestAnimationFrame(() =>
          this.currentIndex < index ? moveBackward() : moveForward()
        )
      }
    }
  }
}
</script>

<style lang="postcss" scoped>
.carousel {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  height: 100%;
}
.photo-wrapper {
  display: flex;

  &__photo {
    height: 250px;
    min-width: 455px;
    border-radius: 2px;
    transition: 0.5s;

    &:not(:last-of-type) {
      margin-right: 28px;
    }
  }
}
.indicator {
  height: 8px;
  width: 8px;
  margin-right: 38px;
  border-radius: 50%;
  background-color: #f0f0f0;
  cursor: pointer;
  transition: 0.5s;

  &--active {
    background-color: #f15b40;
    transition: 0.5s;
  }
}
.fade {
  opacity: 0.5;
  filter: blur(1px);
  transition: 0.5s;
}
</style>
