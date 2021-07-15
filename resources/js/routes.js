//DIPENDENZE
import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from './pages/Home.vue';
import Restaurants from './pages/Restaurants.vue';
import RestaurantDetail from './pages/RestaurantDetail.vue';
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
            path: '/restaurants',
            name: 'restaurants',
            component: Restaurants
        },
        {
            path: '/restaurant/:name',
            name: 'restaurant-detail',
            component: RestaurantDetail
        },
        {
            path: '*',
            component: NotFound 
        }
    ]
});

export default router;