<template>
   <div class="wrapper">
        <div class="container">
        <header>
             <h1>{{ $route.meta.title }}</h1>
        </header>
        <section>
          <form @submit.prevent="createPost">
            <label>Name: </label>
            <input type="text" name="name" id="name" v-model="blog.name" required class="form-control">
             <label>Message: </label>
             <textarea cols="5" rows="5" name="message" id="message" v-model="blog.comments" required class="form-control"></textarea>
             <input type="submit" class="btn btn-primary" value="Submit" id="submit">
             <input type="button" @click.prevent="returntoList" value="Cancel" class="btn btn-secondary" id="cancel">
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
          name: '',
          comments: ''
        }
      }
    },
    methods: {
       ...mapActions(["addPost"]),
      createPost() {
      this.$store.dispatch('addPost', this.blog)
      .then((res) => {
       this.returntoList();
      }).catch((error) => {
       return false;
      })
      
      
    },

    returntoList() {
      this.$router.push({ name: "bloglist" });
    },
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

</style>