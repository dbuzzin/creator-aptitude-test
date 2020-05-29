<template>
  <div>
    <nuxt />
  </div>
</template>

<style lang="postcss">
html {
  font-family: 'Source Sans Pro', -apple-system, BlinkMacSystemFont, 'Segoe UI',
    Roboto, 'Helvetica Neue', Arial, sans-serif;
  font-size: 16px;
  word-spacing: 1px;
  -ms-text-size-adjust: 100%;
  -webkit-text-size-adjust: 100%;
  -moz-osx-font-smoothing: grayscale;
  -webkit-font-smoothing: antialiased;
  box-sizing: border-box;
}

*,
*:before,
*:after {
  position: relative;
  box-sizing: inherit;
  margin: 0;
  font-family: Open Sans;
}

:any-link {
  text-decoration: none !important;
}

body {
  background-color: #ffffff;
}

.container {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  margin: 0 auto;
  min-height: 100vh;
}

.color-grey {
  color: #585453;
}
.fw-normal {
  font-weight: normal;
}

.flex {
  display: flex;
}
.mt-15 {
  margin-top: 15px;
}
.mt-30 {
  margin-top: 30px;
}
.my-10 {
  margin-top: 10px;
  margin-bottom: 10px;
}
.my-20 {
  margin-top: 20px;
  margin-bottom: 20px;
}
.my-200 {
  margin-top: 200px;
  margin-bottom: 200px;
}
</style>
