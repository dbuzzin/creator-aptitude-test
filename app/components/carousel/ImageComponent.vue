<template>
  <img :src="url" />
</template>

<script>
export default {
  props: {
    url: {
      type: String,
      default: ''
    },
    sliding: {
      type: Boolean,
      default: false
    }
  }
}
</script>

<style lang="postcss" scoped>
/*  */
</style>
