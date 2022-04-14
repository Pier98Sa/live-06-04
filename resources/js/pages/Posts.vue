<template>
  <main>
      <div class="container">
          <h1>Elenco dei post</h1>

          <div class="row">
              <div class="col-6 " v-for="post in posts" :key="post.id">
                <Post
                    :title="post.title"
                    :content="post.content"
                    :slug="post.slug"
                    :category="post.category"
                    :tags="post.tags"
                    :img="post.cover"
                />
              </div>
          </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item" :class="(currentPage == 1)? 'disabled':''"><span class="page-link" @click="getPosts(currentPage - 1)">Precedente</span></li>
                    <li class="page-item" :class="(currentPage == lastPage)? 'disabled':''"><span class="page-link" @click="getPosts(currentPage + 1)">Successivo</span></li>
                   
                </ul>
            </nav>
      </div>
      
  </main>
</template>

<script>
import Post from '../components/partials/Post.vue'
export default {
    name: 'Main',
    components:{
        Post
    },

    data() {
        return{
            posts:[],
            currentPage : 1,
            lastPage: null
        }
    },
    methods: {
        getPosts(apiPage){
            axios.get('/api/posts', {
                'params':{
                    'page': apiPage
                }
            }).then((response) => {
                this.currentPage = response.data.results.current_page;
                this.posts = response.data.results.data;
                this.lastPage = response.data.results.last_page;
            });
        },
    },
    created() {
       this.getPosts();
    }
}
</script>

<style>

</style>