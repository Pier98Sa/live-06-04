<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">BoolPress</a>

        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <!--  <a class="nav-link" href="/">Home</a>  modo sbagliato  --> 
              <router-link class="nav-link" :to="{name: 'home'}">Home </router-link>
            </li>

            <li class="nav-item">
                <router-link class="nav-link" :to="{name: 'about'}">Chi Siamo </router-link>
            </li>

            <li class="nav-item">
                <router-link class="nav-link" :to="{name: 'contact'}">Contatti </router-link>
            </li>

            <li class="nav-item">
                <router-link class="nav-link" :to="{name: 'posts'}">Posts </router-link>
            </li>
        </ul>
    </nav>
  </div>
</template>

<script>
export default {
    name:'Header'
}
</script>

<style>
    .router-link-exact-active{
        font-weight:bold;
        text-transform: uppercase;
    }
</style>