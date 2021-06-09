<template>
   <div class="wrapper">
        <div class="container">
        <header>
            <h1>{{ $route.meta.title }}</h1>
        </header>
        <section>
           <div class="card">
               <span v-for="(blog) in allBlogs" :key="blog.id">
               <li> Name: {{ blog.name }} </li>
               <li> Comment: {{ blog.comments}} </li>
               <span v-for="reply in blog.replies" :key="reply.id" class="replies">
                   <li> Reply: {{ reply.name }} {{ reply.comments }} </li>
                  
               </span>
                <router-link :to="{ name: 'replycomment', params: { id: blog.id }}">Reply</router-link>
               </span>
               <input type="button" @click.prevent="PostComment" class="btn btn-primary" name="postcomment" value="Post Comment">
              
            </div>          
        </section>
        
    </div>
   </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';
export default {

    data() {
        return {

        }
    },
    methods: {
    async getBlogs() {
     await this.$store.dispatch("fetchAllBlogs");
   },
   PostComment() {
       this.$router.push({name: 'postcomment'})
   },
   
   },
    computed: mapGetters(["allBlogs"]),


    mounted() {
        this.getBlogs();
       console.log(this.allBlogs)
    }
   
    
}
</script>

<style scoped>

.wrapper {
    margin: 0 auto;
    padding: 0 auto;
}
header {
   padding: 5px 10px;
   text-align: center;
}
section {
 margin: 4px 10px;
 padding: 3px 6px;
}

.btn {
   
    margin: 5px;
   
}
span {
    margin: 3px;
}
span li {
    padding: 3px 5px;
    text-decoration: none;
    list-style: none;
}

.replies li {
    padding: 0px 5px;
    text-decoration: none;
    list-style: none;
}

</style>