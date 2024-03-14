<script setup>
import AppHeader from './components/AppHeader.vue';
import AppFooter from './components/AppFooter.vue';
import AppBmi from './components/AppBmi.vue';
</script>

<template>
    <AppHeader/>
    <router-view></router-view>
    <AppFooter/>
</template>

<style lang="scss">
@use './styles/general.scss' as *;
</style>
