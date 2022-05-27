<template>
<div class="col">
   <article class="card h-100">
      <router-link :to="{ name: 'postShow', params: { slug: post.slug } }">
         <div class="card-body d-flex flex-column">
            <h4 class="card-title">{{ post.title }}</h4>
            <p class="card-text"><i class="fa-solid fa-user"></i> {{ post.author }}<br><i class="fa-solid fa-calendar-days"></i> {{ post.date }}</p>
            <p class="card-text"> {{ post.content }}</p>

            <!-- <router-link :to="{ name: 'postShow', params: { slug: post.slug } }" class="btn btn-primary mt-auto align-self-start">Read</router-link> -->
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
   }
}
</script>

<style lang="scss" scoped>
a {
   text-decoration: none;
   color: #1a1a1a;
}
</style>
