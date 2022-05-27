<template>
<div>
   <h1 class="text-center mb-3">Welcome</h1>
   <h3>Posts list</h3>
   <hr>
   <main-site />
</div>
</template>

<script>
import MainSite from '../components/MainSite.vue'

export default {
   name: 'PostIndex',
   components: {
      MainSite
   }
}
</script>

<style>

</style>
