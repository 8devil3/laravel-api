require('../bootstrap');

window.Vue = require('vue');

import AppFrontoffice from './Vue/AppFrontoffice.vue';

const appFrontoffice = new Vue({
   el: '#appFrontoffice',
   render: h => h(AppFrontoffice)
});
