<template>
<div class="text-center">
   <h3>404</h3>
   <p>Post or page not found</p>
   <router-link :to="{name: 'postIndex'}">Back to all posts</router-link>
</div>
</template>

<script>
export default {
   name: 'Page404'
}
</script>

<style>

</style>
