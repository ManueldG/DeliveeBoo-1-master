//DIPENDENZE
import Vue from "vue";
import VueRouter from "vue-router";

import Home from "./pages/Home.vue";
import Payment from "./pages/Payment.vue";
import RestaurantDetail from "./pages/RestaurantDetail.vue";
import Carrello from "./pages/Carrello.vue";
import Pagamento from "./pages/Pagamento.vue";
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
            path: "/payment",
            name: "payment",
            component: Payment
        },
        {
            path: "/restaurant/:name",
            name: "restaurant-detail",
            component: RestaurantDetail
        },
        {
            path: "/carrello",
            name: "Carrello",
            component: Carrello
        },
        {
            path: "/pagamento",
            name: "pagamento",
            component: Pagamento
        },
        {
            path: "*",
            component: NotFound
        }
    ]
});

export default router;
