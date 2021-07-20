//DIPENDENZE
import Vue from "vue";
import VueRouter from "vue-router";

import Home from "./pages/Home.vue";
import RestaurantDetail from "./pages/RestaurantDetail.vue";
import Carrello from "./pages/Carrello.vue";
import NotFound from "./pages/NotFound.vue";

//ATTIVAZIONE
Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/restaurant/:name",
            name: "restaurant-detail",
            component: RestaurantDetail
        },
        {
            path: "/restaurant/:name/carrello",
            name: "Carrello",
            component: Carrello
        },
        {
            path: "*",
            component: NotFound
        }
    ]
});

export default router;
