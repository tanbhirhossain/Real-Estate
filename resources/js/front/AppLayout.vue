<template>
    <Header />

    <div class="page-wrapper">
        <slot />
    </div>

    <Footer />
</template>

<script setup lang="ts">
import Header from './Components/Header.vue';
import Footer from './Components/Footer.vue';
</script>

<style>
body {
    font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
}

.hero-bg-image {
    background-image: url('https://themewagon.github.io/south/img/bg-img/hero1.jpg');
}

.cta-rent-bg {
    background-image: url('https://themewagon.github.io/south/img/bg-img/cta.jpg');
}

.realtor-jeremy-bg {
    background-image: url('https://themewagon.github.io/south/img/bg-img/testimonial.jpg');
}

.find-home-text-bg {
    background-color: rgba(0, 0, 0, 0.7);
}

/* Multi-line text ellipsis */
.line-clamp-2 {
    overflow: hidden;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
}

.line-clamp-3 {
    overflow: hidden;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 3;
}

/* Directly using color values without Tailwind config */
.bg-south-brown {
    background-color: #96704f;
}

.bg-south-dark {
    background-color: #1f2428;
}
</style>
