<template>
<div class="col">
   <article class="card h-100">
      <div class="card-body d-flex flex-column">
         <h5 class="card-title">{{ post.title }}</h5>
         <p class="card-text">{{ post.content }}</p>
         <p class="card-text">{{ formatDate(post.date) }}</p>
         <a href="#" class="btn btn-primary mt-auto align-self-start">Read</a>
      </div>
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
      formatDate(date) {
         return luxon.DateTime.fromISO(date).setLocale('it').toLocaleString();
      }
   }
}
</script>

<style>

</style>
