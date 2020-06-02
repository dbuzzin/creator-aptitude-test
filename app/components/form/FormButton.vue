<template>
  <div class="form-inner__field">
    <button :type="type" :class="style" @click="onClick">
      {{ name }}
    </button>
  </div>
</template>

<script>
export default {
  props: {
    type: {
      type: String,
      default: 'button'
    },
    name: {
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
    },
    onClick: {
      type: Function,
      default: () => {}
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
  cursor: pointer;

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
