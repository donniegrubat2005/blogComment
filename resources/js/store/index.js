
const baseURL = "http://localhost:8000/api";

const state = {
    blogs: []
};

const getters = {
allBlogs: (state) => {
  return state.blogs;
}
};

const mutations = {
 SET_BLOGS: (state, blogs) => (state.blogs = blogs),
 
 CREATE_POST:(state, blog) => {
     let blogs = state.blogs.push(blog);
     state.blogs = blogs;
 },

 CREATE_REPLY:(state, blog) => {
  let blogs = state.blogs.push(blog);
  state.blogs = blogs;
} 

};

const actions = {
 async fetchAllBlogs({ commit }) {
     const response = await axios.get(baseURL + '/blogs');
 
     commit('SET_BLOGS', response.data);
   },

  
   async addPost({commit}, blog){
     const response = await axios.post(baseURL + `/blogsComment`, blog);
     commit('CREATE_POST', response.data);

 },

 async createReply({commit}, blog){
  const response = await axios.post(baseURL + `/blogsReply`, blog);
  commit('CREATE_REPLY', response.data);

},
};

export default {
 state,
 getters,
 mutations,
 actions
}