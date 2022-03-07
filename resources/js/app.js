require('./bootstrap');

window.Vue = require('vue');

// import VueRouter from "vue-router";
import axios from "axios";
import VueLodash from 'vue-lodash';
import lodash from 'lodash';
import moment from 'moment';
// import swal from 'sweetalert';
import VueChatScroll from 'vue-chat-scroll';
import { Form, HasError, AlertError } from 'vform';
import swal from 'sweetalert2'
import store from './store'

window.swal = swal;

const toast = swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});

const VueUploadComponent = require('vue-upload-component')
Vue.component('file-upload', VueUploadComponent)

window.toast = toast;
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

Vue.use(VueChatScroll)
// import App from './App.vue';
// import routes from "./routes";
// Vue.use(VueRouter);
// Vue.use(swal);
Vue.use(axios);
Vue.use(VueLodash, { name: 'custom' , lodash: lodash });

Vue.component('sidebar', require('./components/bars/Sidebar.vue').default)
Vue.component('navbar', require('./components/bars/Navbar.vue').default)

Vue.filter('date', function(created) {
    return moment(created).calendar();
});



const app = new Vue({
    store,
    el: '#app'
    // components: {App}
});
