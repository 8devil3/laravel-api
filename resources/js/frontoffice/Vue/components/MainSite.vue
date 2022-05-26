<template>
<div>
   <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 g-4">
      <card-site v-for="post in arrPosts" :key="post.id" :post="post"/>
   </div>
</div>
</template>

<script>
import CardSite from './CardSite.vue';

export default {
   components: {
      CardSite
   },
   props: {
      arrPosts: Array
   }
}
</script>

<style>

</style>
