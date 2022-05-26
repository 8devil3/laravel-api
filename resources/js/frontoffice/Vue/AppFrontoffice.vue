<template>
   <main-site :arrPosts="arrPosts" />
</template>

<script>
import MainSite from './components/MainSite.vue'
import axios from 'axios'

export default {
   name: 'AppFrontoffice',
   components: {
      MainSite,
   },
   data(){
      return {
         baseURL: 'http://localhost:8000',
         apiURL: '/api/posts',
         nextPageURL: null,
         prevPageURL: null,
         arrPosts: []
      }
   },
   created() {
      this.getData(this.baseURL + this.apiURL);
   },
   methods: {
      getData(url){
         if (url) {
            axios.get(url)
            .then((result) => {
               this.arrPosts = result.data.response.data;
            });
         }
      }
   }
}
</script>

<style>

</style>
