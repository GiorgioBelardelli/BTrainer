<script>
import Jumbo from '../components/Jumbo.vue'
import AppTrainerGallery from '../components/AppTrainerGallery.vue';
import Specializations from '../components/Specializations.vue';
import AppBmi from '../components/AppBmi.vue';

export default {
  components: {
    Jumbo,
    AppTrainerGallery,
    AppBmi,
    Specializations
  }
}
</script>

<template>
    <Jumbo/>
    <AppTrainerGallery/>
    <AppBmi/>
    <Specializations/>
</template>