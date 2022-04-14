<template>
  <div class="card">
        <div class="card-body">
            <h2 class="card-title">{{title}}</h2>
            <img class="img-fluid" :src='img' alt="title">
            <h4 class="card-text" >{{ category? category.name : '&nbsp;'}}</h4>
            <p class="card-text">{{troncateText(content)}}</p>
            <router-link class="btn btn-primary" :to="{name: 'single-post', params: {slug: slug} }">Vedi articolo completo</router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Post',
    props: ['img','title','content','slug','category', 'tags'],

    data(){
        return{
          strTroncateLen: 50  
        }
        
    },
    methods: {
        troncateText(text){
            if (text.length > this.strTroncateLen){
               return text.substring(0, this.strTroncateLen) + '...'; 
            } else{
                return text;
            }
            
        }
    }
}
</script>

<style>

</style>