<script>
import Jumbo from '../components/Jumbo.vue';
import Intro from '../components/Intro.vue';
import AppTrainerGallery from '../components/AppTrainerGallery.vue';
import Specializations from '../components/Specializations.vue';
// import AppBmi from '../components/AppBmi.vue';

export default {
  components: {
    Jumbo,
    Intro,
    AppTrainerGallery,
    Specializations
    // AppBmi,
  }
}
</script>

<template>
  <Jumbo />
  <Intro />
  <Specializations />
  <AppTrainerGallery />
  <!-- <AppBmi/> -->
</template>