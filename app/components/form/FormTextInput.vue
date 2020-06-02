<template>
  <div class="form-inner__field">
    <label :for="id" class="flex my-20">
      {{ label }}
    </label>
    <input
      :id="id"
      v-model="formData.formData[name]"
      :autocomplete="autoComplete"
      :name="name"
      type="text"
      class="form-input"
    />
  </div>
</template>

<script>
export default {
  props: {
    id: {
      type: String,
      default: ''
    },
    name: {
      type: String,
      default: ''
    },
    value: {
      type: String,
      default: ''
    },
    label: {
      type: String,
      default: ''
    },
    autoComplete: {
      type: String,
      default: 'off'
    },
    formData: {
      type: Object,
      default: () => {}
    }
  }
}
</script>

<style lang="postcss" scoped>
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
