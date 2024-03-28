import { createRouter, createWebHistory } from 'vue-router';
import Home from './pages/Home.vue';
import Risultati from './pages/Risultati.vue';
import About from './pages/About.vue';

const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/risultati',
        name: 'Risultati',
        component: Risultati,
    },
    {
        path: '/about/:id',
        name: 'About',
        component: About,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
