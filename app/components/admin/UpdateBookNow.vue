<template>
  <form @submit.prevent="postData">
    <div class="form-inner">
      <div class="form-inner__field">
        <label for="bookNow" class="flex my-20">
          Enter a new "book now" url...
        </label>
        <p v-if="responseMsg !== ''" class="my-20">
          {{ responseMsg }}
        </p>
        <div>
          <input
            id="bookNow"
            v-model="newUrl"
            type="text"
            autocomplete="off"
            name="book-now-url"
            class="form-input"
          />
        </div>
      </div>
      <div class="form-inner__field">
        <FormButton type="submit" color="orange" size="small" name="Submit" />
      </div>
    </div>
  </form>
</template>

<script>
import FormButton from './../form/FormButton'

export default {
  components: {
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
