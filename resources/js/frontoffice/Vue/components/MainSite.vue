<template>
<div>
   <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 g-4">
      <card-site v-for="post in arrPosts" :key="post.id" :post="post"/>
   </div>
   <div class="mt-5">
      <nav aria-label="Page navigation">
         <ul class="pagination justify-content-center">
            <li class="page-item" :class="{disabled: currentPage == 1}" @click="getAllPostsData(firstPageURL)"><a class="page-link">First</a></li>
            <li class="page-item" :class="{disabled: currentPage == 1}" @click="getAllPostsData(previousPageURL)"><a class="page-link">Previous</a></li>

            <li v-if="currentPage > 3" class="page-item" @click="getAllPostsData(paginationURL + (currentPage - 3))"><a class="page-link">{{ currentPage - 3 }}</a></li>
            <li v-else></li>
            <li v-if="currentPage > 2" class="page-item" @click="getAllPostsData(paginationURL + (currentPage - 2))"><a class="page-link">{{ currentPage - 2 }}</a></li>
            <li v-else></li>
            <li v-if="currentPage > 1" class="page-item" @click="getAllPostsData(previousPageURL)"><a class="page-link">{{ currentPage - 1 }}</a></li>
            <li v-else></li>

            <li class="page-item active"><span class="page-link">{{ currentPage }}</span></li>

            <li v-if="currentPage < lastPage-1" class="page-item" @click="getAllPostsData(nextPageURL)"><a class="page-link">{{ currentPage + 1 }}</a></li>
            <li v-else></li>
            <li v-if="currentPage < lastPage-2" class="page-item" @click="getAllPostsData(paginationURL + (currentPage + 2))"><a class="page-link">{{ currentPage + 2 }}</a></li>
            <li v-else></li>
            <li v-if="currentPage < lastPage-3" class="page-item" @click="getAllPostsData(paginationURL + (currentPage + 3))"><a class="page-link">{{ currentPage + 3 }}</a></li>
            <li v-else></li>

            <li class="page-item" :class="{disabled: currentPage == lastPage}" @click="getAllPostsData(nextPageURL)"><a class="page-link">Next</a></li>
            <li class="page-item" :class="{disabled: currentPage == lastPage}" @click="getAllPostsData(lastPageURL)"><a class="page-link">Last</a></li>
         </ul>
      </nav>
   </div>
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
         arrPosts: [],
         firstPageURL: null,
         lastPageURL: null,
         previousPageURL: null,
         nextPageURL: null,
         currentPage: null,
         lastPage: null,
         paginationURL: null
      }
   },
   created() {
      this.getAllPostsData(this.baseURL + this.apiURL);
      this.paginationURL = this.baseURL + this.apiURL + '?page=';
   },
   methods: {
      getAllPostsData(url){
         if (url) {
            axios.get(url)
            .then(result => {
               // console.table(result.data.response.data);
               this.arrPosts = result.data.response.data;

               this.firstPageURL = result.data.response.first_page_url;
               this.lastPageURL = result.data.response.last_page_url;
               this.previousPageURL = result.data.response.prev_page_url;
               this.nextPageURL = result.data.response.next_page_url;
               this.currentPage = result.data.response.current_page;
               this.lastPage = result.data.response.last_page;
            });
         }
      }
   }
}
</script>

<style lang="scss" scoped>
a.page-link {
   cursor: pointer;
}
</style>
