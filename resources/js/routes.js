//DIPENDENZE
import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from './pages/Home.vue';
import NotFound from './pages/NotFound.vue';

//ATTIVAZIONE
Vue.use(VueRouter);

const router = new VueRouter({
    mode : 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '*',
            component: NotFound 
        }
    ]
});

export default router;