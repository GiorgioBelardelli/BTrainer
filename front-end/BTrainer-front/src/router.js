import { createRouter, createWebHistory } from 'vue-router';
import Home from './pages/Home.vue';
import Risultati from './pages/Risultati.vue';

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
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

// Aggiungi una guardia di navigazione per gestire il comportamento dello scroll
router.beforeEach((to, from, next) => {
    // Fai scorrere la finestra fino all'inizio della pagina
    window.scrollTo(0, 0);
    // Prosegui con la navigazione
    next();
});

export default router;
