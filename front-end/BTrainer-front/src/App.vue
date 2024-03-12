<script setup>
import AppHeader from './components/AppHeader.vue';
import AppFooter from './components/AppFooter.vue';
import AppTrainerGallery from './components/AppTrainerGallery.vue';
</script>

<template>
    <AppTrainerGallery/>
    <AppHeader/>
    <router-view></router-view>
    <AppFooter/>
    
</template>

<style lang="scss">
@use './styles/general.scss' as *;
</style>
