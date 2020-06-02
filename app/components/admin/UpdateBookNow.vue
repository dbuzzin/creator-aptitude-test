<template>
  <FormWrapper
    v-slot:default="formData"
    method="post"
    action="http://localhost:8000/api/update-url"
  >
    <FormTextInput
      name="book_now_url"
      label="Enter a new 'book now' url..."
      :form-data="formData"
    />
    <FormButton type="submit" color="orange" size="small" name="Submit" />
  </FormWrapper>
</template>

<script>
import FormWrapper from './../form/FormWrapper.vue'
import FormTextInput from './../form/FormTextInput.vue'
import FormButton from './../form/FormButton.vue'

export default {
  components: {
    FormWrapper,
    FormTextInput,
    FormButton
  },
  data() {
    return {
      newUrl: '',
      responseMsg: ''
    }
  },
  methods: {
    /**
     * Sends the new url to the server which then edits updates the json file.
     */

    postData() {
      this.responseMsg = ''
      this.newUrl !== '' &&
        this.$axios
          .$post('http://localhost:8000/api/update-url', {
            book_now_url: this.newUrl
          })
          .then((response) => {
            this.newUrl = ''
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
