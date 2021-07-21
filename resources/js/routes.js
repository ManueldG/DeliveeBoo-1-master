//DIPENDENZE
import Vue from "vue";
import VueRouter from "vue-router";

import Home from "./pages/Home.vue";
import Payment from "./pages/Payment.vue";
import RestaurantDetail from "./pages/RestaurantDetail.vue";
import Cart from "./components/Cart.vue";
import Orders from "./pages/Orders.vue";
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
            path: "/cart",
            name: "Cart",
            component: Cart
        },
        {
            path: "/orders",
            name: "orders",
            component: Orders
        },
        {
            path: "*",
            component: NotFound
        }
    ]
});

export default router;
