<template>
  <div>
    <div
      v-for="(contract, index) in property.contracts"
      :key="index"
      :class="{ hidden: hidden }"
    >
      <p class="mt-15">{{ contract.title }}</p>
      <FormWrapper
        v-slot:default="formData"
        method="post"
        :action="
          `http://localhost:8000/api/update-url?property=${propertyIndex}&contract=${index}`
        "
      >
        <FormTextInput
          name="book_now_url"
          label="Enter a new 'book now' url..."
          :value="contract.book_now_url"
          :form-data="formData"
        />
        <FormButton type="submit" color="orange" size="small" name="Submit" />
      </FormWrapper>
    </div>
  </div>
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
  props: {
    property: {
      type: Object,
      default: () => {}
    },
    propertyIndex: {
      type: Number,
      default: 0
    },
    openIndex: {
      type: Number,
      default: 0
    }
  },
  data() {
    return {
      responseMsg: ''
    }
  },
  computed: {
    hidden() {
      return this.openIndex !== this.propertyIndex
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
