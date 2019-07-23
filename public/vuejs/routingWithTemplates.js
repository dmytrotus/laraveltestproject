// main.js

import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Main from './components/main.vue';
import About from './components/about-us.vue';
import Contact from './components/contact.vue';

const router = new VueRouter({
  mode: 'history',
  base: __dirname,
  routes: [
    { path: '/', component: Main },
    { path: '/about', component: About },
    { path: '/contact', component: Contact }
  ]
});

new Vue({
  router,
  template: `
    <div>
      <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item"><router-link to="/" class="nav-link">Home</router-link></li>
            <li class="nav-item"><router-link to="/about" class="nav-link">About</router-link></li>
            <li class="nav-item"><router-link to="/contact" class="nav-link">Contact</router-link></li>
          </ul>
        </div>
      </nav>
      <router-view class="view"></router-view>
    </div>
  `
}).$mount('#routeapp');