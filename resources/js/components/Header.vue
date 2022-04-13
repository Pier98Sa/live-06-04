<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">BoolPress</a>

        <ul class="navbar-nav mr-auto">
            <li class="nav-item" v-for="menuItem in menuItems" :key="menuItem.routeName" >
              <!--  <a class="nav-link" href="/">Home</a>  modo sbagliato  --> 
              <router-link class="nav-link" :to="{name: menuItem.routeName}">{{menuItem.label}} </router-link>
            </li>

        </ul>
    </nav>
  </div>
</template>

<script>
export default {
    name:'Header',
    data(){
        return{
            menuItems: [
                {
                    routeName: 'home',
                    label: 'Home'
                },
                {
                    routeName: 'about',
                    label: 'Chi siamo'
                },
                {
                    routeName: 'contact',
                    label: 'Contatti'
                },
                {
                    routeName: 'blog',
                    label: 'Blog'
                }
            ]
        }
    }
}
</script>

<style>
    .router-link-exact-active{
        font-weight:bold;
        text-transform: uppercase;
    }
</style>