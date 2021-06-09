
import Vue from "vue";
import Vuex from "vuex";
import router from "./routes";
import App from './App.vue'
import storeData from "./store/index";

require('./bootstrap');

Vue.use(Vuex);

const store = new Vuex.Store(storeData);

const app = new Vue({
    router: router,
    store: store,
    components: { App },
    render: h => h(App)
}).$mount("#app");

