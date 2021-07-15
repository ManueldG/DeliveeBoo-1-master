require("./bootstrap");
window.Vue = require("vue");

import App from './App.vue';
import router from './routes';

const root = new Vue({
    el:'#root',
    router: router,
    render: h => h(App),
}) 