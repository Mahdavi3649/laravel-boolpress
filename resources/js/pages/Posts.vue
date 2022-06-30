<template>
    <div>
        <bannerComponent />

        <div class="container-fluid">
            <div class="row">
                <main class="col-12 col-md-9 co l-lg-10">
                    <section class="posts pt-5">
                        <div class="container">
                            <div
                                class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4"
                            >
                                <div
                                    class="col"
                                    v-for="post in postResponse.data"
                                    :key="post.id"
                                >
                                    <div class="product card">
                                        <img
                                            :src="'storage/' + post.cover_image"
                                            :alt="post.title"
                                        />
                                        <div class="card-body">
                                            <h3>{{ post.title }}</h3>
                                            <p>{{ trimText(post.content) }}</p>
                                            <a href="#">Read more</a>
                                        </div>

                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col">
                                                    <div
                                                        class="author"
                                                        v-if="post.user"
                                                    >
                                                        <strong
                                                            >Author:
                                                        </strong>
                                                        {{ post.user.name }}
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <span v-if="post.category">
                                                        <strong
                                                            >Category:
                                                        </strong>
                                                        {{ post.category.name }}
                                                    </span>
                                                    <div
                                                        class="tags"
                                                        v-if="
                                                            post.tags.length > 0
                                                        "
                                                    >
                                                        <strong>Tags: </strong>
                                                        <ul
                                                            class="list-unstyled"
                                                        >
                                                            <li
                                                                v-for="tag in post.tags"
                                                                :key="tag.id"
                                                            >
                                                                {{ tag.name }}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <nav aria-label="Page navigation" class="py-5">
                                <ul class="pagination justify-content-center">
                                    <li
                                        class="page-item"
                                        v-if="postResponse.current_page > 1"
                                    >
                                        <a
                                            class="page-link"
                                            href="#"
                                            aria-label="Previous"
                                            @click.prevent="
                                                getAllPosts(
                                                    postResponse.current_page +
                                                        1
                                                )
                                            "
                                        >
                                            <span aria-hidden="true"
                                                >&laquo;</span
                                            >
                                            <span class="sr-only"
                                                >Previous</span
                                            >
                                        </a>
                                    </li>

                                    <li
                                        :class="{
                                            'page-item': true,
                                            active:
                                                page ==
                                                postResponse.current_page,
                                        }"
                                        v-for="page in postResponse.last_page"
                                        :key="page"
                                    >
                                        <a
                                            class="page-link"
                                            href="#"
                                            @click.prevent="getAllPosts(page)"
                                            >{{ page }}</a
                                        >
                                    </li>

                                    <li
                                        class="page-item"
                                        v-if="
                                            postResponse.current_page <
                                            postResponse.last_page
                                        "
                                    >
                                        <a
                                            class="page-link"
                                            href="#"
                                            aria-label="Next"
                                            @click.prevent="
                                                getAllPosts(
                                                    postResponse.current_page +
                                                        1
                                                )
                                            "
                                        >
                                            <span aria-hidden="true"
                                                >&raquo;</span
                                            >
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </section>
                </main>

                <aside class="bg-white col-12 col-md-3 col-lg-2">
                    <div class="widget">
                        <strong>Categories</strong>
                        <ul>
                            <li
                                v-for="category in categories"
                                :key="category.id"
                            >
                                {{ category.name }}
                            </li>
                        </ul>
                    </div>
                    <div class="widget">
                        <strong>Tags</strong>
                        <ul>
                            <li v-for="tag in tags" :key="tag.id">
                                {{ tag.name }}
                            </li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</template>

<script>
import bannerComponent from "../components/bannerComponent.vue";
export default {
    name: "Posts",
    components: { bannerComponent },

    data() {
        return {
            categories: "",
            postResponse: "",
            tags: "",
        };
    },
    methods: {
        getAllPosts(postPage) {
            axios
                .get("/api/posts", {
                    params: {
                        page: postPage,
                    },
                })

                .then((response) => {
                    console.log(response);
                    this.postResponse = response.data;
                })
                .catch((e) => {
                    console.error(e);
                });
        },

        getAllCategories() {
            axios
                .get("/api/categories")
                .then((response) => {
                    console.log(response);
                    this.categories = response.data;
                })
                .catch((e) => {
                    console.error(e);
                });
        },

        getAllTags() {
            axios
                .get("/api/tags")
                .then((response) => {
                    console.log(response);
                    this.tags = response.data;
                })
                .catch((e) => {
                    console.error(e);
                });
        },

        trimText(text) {
            if (text.length > 100) {
                return text.slice(0, 100) + "...";
            }
            return text;
        },
    },

    mounted() {
        this.getAllPosts(1);
        this.getAllCategories();
        this.getAllTags();
    },
};
</script>

<style lang="scss" scoped>
aside {
    .widget {
        padding: 16px;
        border-radius: 16px;
        margin: 10px;
        background-color: rgb(189, 233, 145);
    }
}
</style>
