const { default: Axios } = require('axios');

require('../bootstrap');

window.Vue = require('vue');

import AppFrontoffice from './Vue/AppFrontoffice.vue';

const app = new Vue({
   el: '#appFrontoffice',
   render: h => h(AppFrontoffice)
});
