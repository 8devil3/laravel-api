<template>
   <div>
      <h1 class="text-center">Welcome!</h1>
      <h3>Latest posts</h3>
      <hr>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 g-4">
         <card-site v-for="post in arrPosts" :key="post.id" :post="post"/>
      </div>
      <div class="row mt-4 justify-content-center">
         <div class="col-auto">
            <router-link :to="{name: 'postsIndex'}" class="btn btn-primary">All posts</router-link>
         </div>
      </div>
   </div>
</template>

<script>
import CardSite from '../components/CardSite.vue'

export default {
  components: {
      CardSite
   },
   data(){
      return{
         baseURL: 'http://localhost:8000',
         apiURL: '/api/v1/posts?landingPage',
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
               // console.table(result.data.response);
               this.arrPosts = result.data.response;
            });
         }
      }
   }

}
</script>

<style>

</style>
