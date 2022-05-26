const { default: Axios } = require('axios');

require('../bootstrap');

// window.Vue = require('vue');

// import AppBackoffice from './Vue/AppBackoffice.vue';

// const app = new Vue({
//    el: '#appBackoffice',
//    render: h => h(AppBackoffice)
// });


//autocompilazione slug nei nuovi post
const inputSlug = document.querySelector('#input-slug');
const inputTitle = document.querySelector('#input-title');

if (inputSlug) {
   inputTitle.addEventListener('focusout', function() {
      const inputSlug = document.querySelector('#input-slug');
      inputTitle.value;

      Axios.post('/admin/slugger', {
         string: inputTitle.value,
      }).then(function (response) {
         inputSlug.value = response.data.slug;
      });
   });
}



//reset campi form
const btnReset = document.querySelector('#btn-reset');
const inputForm = document.querySelector('#input-form');

if (btnReset) {
   btnReset.addEventListener('click', function(){
      inputForm.reset();
   });
}



//eliminazione da pagina index
const btnDel = document.querySelectorAll('.btn-del');
const indexForm = document.querySelector('#indexForm');

btnDel.forEach(btn => {
   btn.addEventListener('click', function(){
      if (this.dataset.type == 'post') {
         indexForm.action = this.dataset.baseurl + '/' + this.dataset.slug
      } else if (this.dataset.type == 'category') {
         indexForm.action = this.dataset.baseurl + '/' + this.dataset.id
      } else {
         //nothing
      }
   });
});


//importo il js per trasformare gli input select multipli in tag. Source: https://www.cssscript.com/tags-input-bootstrap-5/
import Tags from './tags.js';
Tags.init('#input-tags');
