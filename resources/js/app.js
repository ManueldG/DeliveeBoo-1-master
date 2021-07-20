require("./bootstrap");
window.Vue = require("vue");
import Vue from "vue";

import App from "./App.vue";
import router from "./routes";
import "bootstrap/scss/bootstrap.scss";

const root = new Vue({
    el: "#root",
    router: router,
    render: h => h(App)
});
