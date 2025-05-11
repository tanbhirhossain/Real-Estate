<template>
    <!-- Preloader -->
    <div id="preloader">
        <div class="south-load"></div>
    </div>

    <!-- Header Area -->
    <Header></Header>

    <!-- Slot content -->
    <slot></slot>

    <!-- Footer Area -->
    <Footer></Footer>
</template>

<script setup lang="ts">
    import { onMounted } from 'vue';
    import Header from './Components/Header.vue';
    import Footer from './Components/Footer.vue';

    // Import CSS
    import '/public/temp/style.css'; // Ensure the path is correct

    // Dynamically import JS files
    onMounted(() => {
        const scripts = [
            '/temp/js/jquery/jquery-2.2.4.min.js',
            '/temp/js/popper.min.js',
            '/temp/js/bootstrap.min.js',
            '/temp/js/plugins.js',
            '/temp/js/classy-nav.min.js',
            '/temp/js/jquery-ui.min.js',
            '/temp/js/active.js'
        ];

        scripts.forEach(script => {
            const scriptTag = document.createElement('script');
            scriptTag.src = script;
            scriptTag.async = true;
            document.head.appendChild(scriptTag);
        });
    });
</script>
