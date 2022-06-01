<template>
<div>
   <h1 class="text-center mb-3">All posts</h1>
   <hr>
   <main-site />
</div>
</template>

<script>
import MainSite from '../components/MainSite.vue'

export default {
   name: 'PostsIndex',
   components: {
      MainSite
   }
}
</script>

<style>

</style>
