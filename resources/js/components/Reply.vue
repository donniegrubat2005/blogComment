<template>
   <div class="wrapper">
        <div class="container">
        <header>
            <h1>{{ $route.meta.title }}</h1>
        </header>
        <section>
          <form @submit.prevent="createReply">
            <label>Name: </label>
            <input type="hidden" name="id" v-model="blog.blog_id">
            <input type="text" name="name" id="name" v-model="blog.name" required class="form-control">
             <label>Message: </label>
             <textarea cols="5" rows="5" name="message" id="message" v-model="blog.comments" required class="form-control"></textarea>
             <input type="submit" class="btn btn-primary" id="submit">
           </form>
            
        </section>
    </div>
   </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';
export default {
    data() {
        return {
          blog: {
          blog_id: this.$route.params.id,
          name: '',
          comments: '' 
          }
           
        }
    },
    methods: {
         ...mapActions(["createReply"]),
      createReply() {
      this.$store.dispatch('createReply', this.blog)
       .then((res) => {
        this.returntoList();
       })
       .catch((error) => {
       return false;
      })
     
      
    },
    returntoList() {
      this.$router.push({ name: "bloglist" });
    },

    },

    // computed: {
    //     id() {
    //         return this.$route.params.id
    //         }
    // }
   
    
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

</style>