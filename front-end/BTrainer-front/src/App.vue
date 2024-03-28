<script setup>
import AppHeader from './components/AppHeader.vue';
import AppFooter from './components/AppFooter.vue';
// import ArrowUp from './components/ArrowUp.vue'
</script>

<template>
    <AppHeader />
    <router-view></router-view>
    <!-- <ArrowUp /> -->
    <AppFooter />
</template>

<style lang="scss">
@use './styles/general.scss' as *;
</style>