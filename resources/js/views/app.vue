<template>
  <div>
    <Header/>
    <Main/>
    <Footer/>
  </div>
</template>

<script>
  import Main from '../components/Main.vue';
  import Header from '../components/Header.vue';
  import Footer from '../components/Footer.vue';
  
  export default {
    name: 'App',
    components:{
      Main,
      Header,
      Footer
    }
  }
</script>

<style>

</style>