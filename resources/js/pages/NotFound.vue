<template>
    <div class="page">
        <div class="p-5 bg-dark text-white">
            <div class="container">
                <div class="jumbo_text">
                    <h1 class="display-3">Page not found, 404</h1>
                    <p class="lead">
                        Sorry, the page you requested does not exist
                    </p>
                </div>
            </div>
        </div>
        <div class="container p-4">
            The page you requested was not found, to to visit these pages
            <ul>
                <li>
                    <router-link :to="{ name: 'home' }">Home</router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'about' }">About</router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'posts' }">Posts</router-link>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    name: "NotFound",
};
</script>
