<template>
<footer>
   &copy;{{getDateNow()}} | <router-link :to="{name: 'about'}">About us</router-link>
</footer>

</template>

<script>
export default {
   name: 'FooterSite',
   methods: {
      getDateNow(){
         return new Date().getFullYear();
      }
   }
}
</script>

<style>
footer {
   height: 6rem;
   margin-top: 4rem;
   padding: 2rem 0;
}
</style>
