import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
//
// import Home from './components/Home.vue';
// import Perfil from './components/Perfil.vue';
//
// const routes = [
//     {
//         path: '/',
//         name: 'Home',
//         component: Home,
//     },
//     {
//         path: '/perfil',
//         name: 'Perfil',
//         component: Perfil,
//     },
// ];
//
// const router = createRouter({
//     history: createWebHistory(),
//     routes,
// });

const app = createApp({});
app.use(router);
app.mount('#app');
