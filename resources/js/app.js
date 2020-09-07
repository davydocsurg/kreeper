require('./bootstrap');

window.Vue = require('vue');

// import VueRouter from "vue-router";
import axios from "axios";
// import App from './App.vue';
// import routes from "./routes";
// Vue.use(VueRouter);
Vue.use(axios);

Vue.component('navbar', require('./components/bars/Navbar.vue').default)
// Vue.component('sidebar', require('./components/bars/Sidebar.vue').default)

const app = new Vue({
    el: '#app'
    // components: {App}
});
