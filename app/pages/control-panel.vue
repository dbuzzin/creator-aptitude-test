<template>
  <div class="container">
    <div class="control-wrapper my-100">
      <div class="control-inner">
        <nav>
          <div class="control-nav">
            <ul class="control-nav__list mt-30">
              <li class="control-nav__item">
                <nuxt-link to="/control-panel">
                  Update Booking URL
                </nuxt-link>
              </li>
              <li class="control-nav__item go-back">
                <nuxt-link to="/">
                  Back to main page
                </nuxt-link>
              </li>
            </ul>
          </div>
        </nav>
        <div class="control-main">
          <UpdateBookNow />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import UpdateBookNow from './../components/admin/UpdateBookNow'

export default {
  components: {
    UpdateBookNow
  },
  created() {
    this.$store.dispatch('loadProperties')
  }
}
</script>

<style lang="postcss" scoped>
.control-wrapper {
  display: flex;
  /* height: 700px; */
  width: 80%;
  padding: 50px 20px;
  background-color: #f0f0f0;
  font-size: 14px;
  line-height: 19px;
}
.control-inner {
  display: flex;
  height: 100%;
  width: 100%;
}
.control-nav {
  display: flex;
  flex-direction: column;
  align-items: center;
  height: 100%;
  width: 200px;
  border-right: 1px solid #cecece;

  &__list {
    display: flex;
    flex-direction: column;
    height: 100%;
    list-style: none;
    padding: 0;
  }

  &__item {
    display: flex;
    &:not(:last-of-type) {
      margin-bottom: 10px;
    }
  }
}
.control-main {
  display: flex;
  padding: 0 50px;
}
</style>
