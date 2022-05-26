<template>
   <div>
      <header-site />
      <card-site />
   </div>
</template>

<script>
import HeaderSite from './components/HeaderSite.vue'
import CardSite from './components/CardSite.vue'
import axios from 'axios'

export default {
   name: 'AppFrontoffice',
   components: {
      HeaderSite,
      CardSite
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
               console.log(result.data);

               this.arrPosts = result.data.response.data;

               this.nextPageURL = result.data.response.next_page_url;
            });
         }
      }
   }
}
</script>

<style>

</style>
