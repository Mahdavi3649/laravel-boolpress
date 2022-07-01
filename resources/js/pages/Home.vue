<template>
    <div class="page">
        <div class="p-5 bg-info text-black">
            <div class="container">
                <h1 class="display-3">BoolPress Blog</h1>
                <p class="lead">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Accusamus, quod!
                </p>
            </div>
        </div>

        <section class="recent_articles">
            <div class="container">
                <h2 class="py-4">Recent articles</h2>
                <div class="row">
                    <div class="col" v-for="post in posts" :key="post.id">
                        <div class="card">
                            <img
                                class="img-fluid"
                                :src="'storage/' + post.cover_image"
                                alt=""
                            />
                            <div class="card-body">
                                <p>
                                    {{ post.content.slice(0, 100) + "..." }}
                                </p>
                                <a href="#">Read more...</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- container -->
                <div class="go_to_blog m-5 text-center">
                    <router-link
                        class="btn btn-primary text-white"
                        :to="{ name: 'posts' }"
                        >Go to my blog</router-link
                    >
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import Axios from "axios";

export default {
    name: "Home",
    data() {
        return {
            posts: "",
        };
    },
    methods: {},
    mounted() {
        Axios.get("/api/posts")
            .then((response) => {
                console.log(response);
                const posts = response.data.data;
                this.posts = posts.slice(0, 4);
            })
            .catch((e) => {
                console.error(e);
            });
    },
};
</script>
