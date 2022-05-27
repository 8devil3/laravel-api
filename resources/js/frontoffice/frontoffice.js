require('../bootstrap');


// Vue.js
window.Vue = require('vue');
import AppFrontoffice from './Vue/AppFrontoffice.vue';


// Vue Router
import VueRouter from 'vue-router';

import PageAbout from './Vue/pages/PageAbout.vue';
import PostsIndex from './Vue/pages/PostsIndex.vue';
import PostShow from './Vue/pages/PostShow.vue';


Vue.use(VueRouter);

const router = new VueRouter({
   mode: 'history', //per evitare che i link generati contengano l'hashtag
   routes: [
      {
         path: '/',
         name: 'postIndex',
         component: PostsIndex
      },
      {
         path: '/about',
         name: 'about',
         component: PageAbout
      },
      {
         path: '/posts/:slug',
         name: 'postShow',
         component: PostShow,
         props: true
      }
   ]
});


const appFrontoffice = new Vue({
   el: '#appFrontoffice',
   render: h => h(AppFrontoffice),
   router
});
