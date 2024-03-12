<script>

</script>

<template>
<div class="container">
    <h1>TEST GIALLO</h1>
  <h2>TEST GRIGIO</h2>
  <h3>TEST GRIGIO SCURO</h3>
</div>

</template>

<style lang="scss" scoped>
@use '../styles/partials/mixins' as *;
@use '../styles/partials/variables' as *;

.container {
  background-color: #000;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;

  h1 {
    color: $yellow;
  }
  
  h2 {
    color: $lightgrey;
  }
  
  h3 {
    color: $grey;
  }
}
</style>
