<template>
<div>
   <router-view></router-view>
   <footer-site />
</div>
</template>

<script>
import FooterSite from './components/FooterSite.vue'

export default {
   name: 'AppFrontoffice',
   components: {
      FooterSite,
   }
}
</script>

<style>

</style>
