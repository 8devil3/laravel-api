<template>
   <div class="container">
      <h1>{{ post.title }}</h1>
      <hr>
      <p><i class="fa-solid fa-user"></i> {{ post.author }}<br><i class="fa-solid fa-calendar-days"></i> {{ post.date }}</p>
      <p>{{ post.content }}</p>
      <hr>
      <router-link :to="{name: 'postIndex'}">Back to all</router-link>
   </div>
</template>

<script>
export default {
   name: 'PostShow',
   props: ['slug'],
   data(){
      return {
         baseURL: 'http://localhost:8000',
         apiURL: '/api/v1/posts/',
         post: []
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
               console.log(this.baseURL + this.apiURL + this.slug);
               this.post = result.data.response;
            });
         }
      }
   }
}
</script>

<style>

</style>
