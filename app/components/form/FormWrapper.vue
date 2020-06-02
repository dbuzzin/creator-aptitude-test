<template>
  <form @submit.prevent="formMethod">
    <div class="form-inner">
      <slot :formData="formData"></slot>
    </div>
  </form>
</template>

<script>
export default {
  props: {
    action: {
      type: String,
      default: ''
    },
    method: {
      type: String,
      default: 'get'
    }
  },
  data() {
    return {
      formData: {}
    }
  },
  computed: {
    formMethod() {
      const method = this.method.toLowerCase()

      switch (method) {
        case 'post':
          return this.postData
      }

      throw new Error('Unknown method type!')
    }
  },
  methods: {
    /**
     * Sends the new url to the server which then edits updates the json file.
     */

    postData() {
      this.$axios
        .$post(this.action, this.formData)
        .then((response) => {
          this.formData = {}
          this.responseMsg = 'Your new url was set successfully!'
        })
        .catch((error) => {
          this.responseMsg =
            'Sorry, there was an issue with your request. Please try again.'
          throw new Error(error)
        })
    }
  }
}
</script>

<style lang="postcss" scoped>
.form-inner {
  display: flex;
  flex-direction: column;

  &__field {
    padding: 10px;
  }
}
</style>
