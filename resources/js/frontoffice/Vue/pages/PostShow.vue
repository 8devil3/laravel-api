<template>
<div>
   <div v-if="pageNotFound">
      <page-404 />
   </div>
   <div v-else>
      <h1>{{ post.title }}</h1>
      <hr>
      <p><i class="fa-solid fa-user"></i> {{ post.author }}<br><i class="fa-solid fa-calendar-days"></i> {{ post.date }}</p>
      <p>{{ post.content }}</p>
      <hr>
      <router-link :to="{name: 'postIndex'}">Back to all</router-link>
   </div>
</div>
</template>

<script>
import Page404 from './Page404.vue';

export default {
   name: 'PostShow',
   components: {
      Page404
   },
   props: ['slug'],
   data(){
      return {
         baseURL: 'http://localhost:8000',
         apiURL: '/api/v1/posts/',
         post: [],
         pageNotFound: false
      }
   },
   created() {
      this.getPostData(this.baseURL + this.apiURL + this.slug);
   },
   methods: {
      getPostData(url){
         if (url) {
            axios.get(url)
            .then(result => {
               // console.log(this.baseURL + this.apiURL + this.slug);
               if (result.data.response) {
                  this.post = result.data.response;
               } else {
                  this.pageNotFound = true;
               }
            });
         }
      }
   }
}
</script>

<style>

</style>
