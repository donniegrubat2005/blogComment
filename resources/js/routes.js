import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

const router =new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/bloglist",
            name: "bloglist",
            component: () => import("./components/Blog.vue"),
            meta: {
                title: "Blog Post",
            }
        },
        {
            path: "/",
            name: "postcomment",
            component: () => import("./components/Comment.vue"),
            meta: {
                title: "Post Comments",
            }
        },
        {
            path: "/reply-comment",
            name: "replycomment",
            component: () => import("./components/Reply.vue"),
            meta: {
                title: "Reply Comments",
            }
        }
    ]
});

export default router;
