<template>
  <a v-if="to" :href="to" :class="style">
    {{ name }}
  </a>
  <nuxt-link v-else-if="routeTo" :to="routeTo" :class="style">
    {{ name }}
  </nuxt-link>
</template>

<script>
export default {
  props: {
    name: {
      type: String,
      default: ''
    },
    to: {
      type: String,
      default: ''
    },
    routeTo: {
      type: String,
      default: ''
    },
    color: {
      type: String,
      default: ''
    },
    size: {
      type: String,
      default: ''
    }
  },
  data() {
    return {
      style: {
        btn: true,
        'btn--orange': this.color === 'orange',
        'btn--large': this.size === 'large',
        'btn--small': this.size === 'small'
      }
    }
  }
}
</script>

<style lang="postcss" scoped>
.btn {
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 14px;
  line-height: 19px;
  letter-spacing: 2px;
  border: 0;
  border-radius: 2px;

  &:focus {
    outline: none;
  }

  &--small {
    padding: 5px 10px;
  }

  &--large {
    height: 46px;
    width: 100%;
  }

  &--orange {
    border: 0.75px solid #f15b40;
    background-color: #f15b40;
    color: #ffffff;
  }
}
</style>
