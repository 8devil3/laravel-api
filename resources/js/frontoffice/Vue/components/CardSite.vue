<template>
<div class="col">
   <article class="card h-100">
      <router-link :to="{ name: 'postShow', params: { slug: post.slug } }">
         <template v-if="post.img != null">
            <img :src="post.img" :alt="post.title" class="card-img-top">
         </template>
         <template v-else></template>
         <div class="card-body d-flex flex-column">
            <h4 class="card-title">{{ post.title }}</h4>
            <p class="card-text"><i class="fa-solid fa-user"></i> {{ post.author }}<br><i class="fa-solid fa-calendar-days"></i> {{ formatDate(post.date) }}</p>
            <p class="card-text"> {{ post.content }}</p>
         </div>
      </router-link>
   </article>
</div>
</template>

<script>
export default {
   name: 'CardSite',
   props: {
      post: Object
   },
   methods: {
      formatDate(date){
         if (date != '' && date != null){
            return luxon.DateTime.fromFormat(date, 'yyyy-MM-dd hh:mm:ss').toFormat('dd-MM-yyyy');
         } else {
            //nothing
         }
      }
   }
}
</script>

<style lang="scss" scoped>
a {
   text-decoration: none;
   color: #1a1a1a;
}
</style>
