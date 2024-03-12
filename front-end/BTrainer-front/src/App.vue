<script setup>
import AppFooter from './components/AppFooter.vue';
import AppHeader from './pages/AppHeader.vue';
import AppTrainerGallery from './components/AppTrainerGallery.vue';
</script>

<template>
    <AppHeader/>
    <AppTrainerGallery/>
    <AppFooter/>
    
</template>

<style lang="scss">
@use './styles/general.scss' as *;
</style>
