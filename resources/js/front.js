
window.axios = require('axios');
// window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
Vue.prototype.$userEmail = document.querySelector("meta[name='user-email']").getAttribute('content');
Vue.prototype.$userName = document.querySelector("meta[name='user-name']").getAttribute('content');
window.Vue = require('vue');
import Vue from 'vue';
import VueRouter from 'vue-router'
import App from "./view/App";

Vue.use(VueRouter);

import Apartments from "./Pages/Apartments";
import SingleApartment from "./Pages/SingleApartment";


// import Posts from "./pages/Posts";
// import Contacts from "./pages/Contacts";
// import About from "./pages/About";


Vue.use(VueRouter)
const router = new VueRouter({
    //mode: 'history',
    routes: [
        {
            path: "/",
            name: "apartments",
            component: Apartments
        },
        {
            path: "/apartments/:id",
            name: "apartment",
            component: SingleApartment
        },

    ],

})
const app = new Vue({
    el: '#root',
    render: h => h(App),
    router
});
