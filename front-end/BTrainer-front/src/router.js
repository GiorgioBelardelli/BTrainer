import { createRouter, createWebHistory } from 'vue-router';
import Home from './pages/Home.vue';
// import About from './pages/About.vue';
import Risultati from './pages/Risultati.vue';

const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    // {
    //     path: '/about',
    //     name: 'About',
    //     component: About
    // },
    {
        path: '/risultati',
        name: 'Risultati',
        component: Risultati
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
