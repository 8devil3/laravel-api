<template>
   <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 g-4">
      <card-site v-for="post in arrPosts" :key="post.id" :post="post"/>
   </div>
</template>

<script>
import CardSite from './CardSite.vue';

export default {
   name: 'MainSite',
   components: {
      CardSite
   },
   data(){
      return {
         baseURL: 'http://localhost:8000',
         apiURL: '/api/v1/posts',
         arrPosts: []
      }
   },
   created() {
      this.getAllPostsData(this.baseURL + this.apiURL);
   },
   methods: {
      getAllPostsData(url){
         if (url) {
            axios.get(url)
            .then(result => {
               // console.log(result.data.response.data);
               this.arrPosts = result.data.response.data;
            });
         }
      }
   }
}
</script>

<style>

</style>
