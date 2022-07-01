<template>
    <div class="page">
        <div class="p-5 bg-dark text-white">
            <div class="container">
                <div class="d-flex gap-5">
                    <div class="avatar">
                        <img
                            class="rounded-circle"
                            src="https://picsum.photos/200/200"
                            alt=""
                        />
                    </div>
                    <div class="jumbo_text">
                        <h1 class="display-3">Contact me</h1>
                        <p class="lead">
                            Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit. Qui, minima.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="content py-4">
                <vue-form method="post" action="/contact-form">
                    <div class="mb-3">
                        <label for="full_name" class="form-label"
                            >Full Name</label
                        >
                        <input
                            type="text"
                            name="full_name"
                            id="full_name"
                            class="form-control"
                            placeholder="Insert your full name"
                            aria-describedby="fullNameHelper"
                        />
                        <small id="fullNameHelper" class="text-muted"
                            >Type your Full name</small
                        >
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="form-control"
                            placeholder="Insert your Email"
                            aria-describedby="emailHelper"
                        />
                        <small id="emailHelper" class="text-muted"
                            >Type your Email</small
                        >
                    </div>

                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input
                            type="text"
                            name="subject"
                            id="subject"
                            class="form-control"
                            placeholder="Insert your Subject"
                            aria-describedby="fullNameHelper"
                        />
                        <small id="fullNameHelper" class="text-muted"
                            >Type your Subject</small
                        >
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea
                            class="form-control"
                            name="message"
                            id="message"
                            rows="5"
                        ></textarea>
                    </div>

                    <button type="submit" class="btn btn-dark">
                        Send Message
                    </button>
                </vue-form>
            </div>
        </div>
    </div>
</template>

<script>
import VueForm from "../components/VueForm.vue";

export default {
    name: "Contacts",
    components: {
        VueForm,
    },
};
</script>
