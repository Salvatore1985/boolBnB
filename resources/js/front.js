window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Vue = require('vue');

// import VueRouter from 'vue-router'
import App from "./view/App";

// Vue.use(VueRouter);

// import Home from "./pages/Home";
// import Posts from "./pages/Posts";
// import Contacts from "./pages/Contacts";
// import About from "./pages/About";


// Vue.use(VueRouter)
// const router = new VueRouter({
//     mode: 'history',
//     routes: [
//         {
//             path:"/",
//             name: "home",
//             component: Home
//         },
//         {
//             path:"/about-us",
//             name: "about",
//             component: About
//         },
//         {
//             path:"/posts",
//             name: "posts",
//             component: Posts
//         },
//         {
//             path:"/contacts",
//             name: "contacts",
//             component: Contacts
//         },

//     ],

// })
const app = new Vue({
    el: '#root',
    render: h => h(App),
    // router
});
