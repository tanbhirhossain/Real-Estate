<template>
    <!-- 0. Top Bar Contact -->
    <div class="bg-white py-2 border-b border-gray-200 text-xs text-gray-600">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <span>contact@mohonabss.com</span>
        </div>
    </div>

    <!-- 1. Main Navigation -->
    <nav class="bg-south-dark text-white sticky top-0 z-50 shadow-md">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <Link href="/" class="text-2xl font-bold flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 mr-2 text-south-brown">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h7.5" />
                    </svg>
                    MOHONA
                </Link>
                <div class="hidden md:flex space-x-6 items-center uppercase text-sm tracking-wider">
                    <Link href="/" class="hover:text-south-brown transition duration-150">Home</Link>
                    <Link href="/properties" class="hover:text-south-brown transition duration-150">Properties</Link>
                    <Link href="/about" class="hover:text-south-brown transition duration-150">About Us</Link>
<!-- 
                    <a href="#" class="hover:text-south-brown transition duration-150">Pages</a>
                    <a href="#" class="hover:text-south-brown transition duration-150">Blog</a>
                    <a href="#" class="hover:text-south-brown transition duration-150">Mega Menu</a> -->
                    <Link href="/contact" class="hover:text-south-brown transition duration-150">Contact</Link>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="hidden sm:flex items-center space-x-2 text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-south-brown">
                            <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C6.55 22.5 1.5 17.45 1.5 10.5V4.5z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-gray-300">+45 677 8993000 223</span>
                    </div>
                    <button class="hover:text-south-brown transition duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </button>
                    <button class="md:hidden text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>
</template>

<script lang="ts" setup>
    import { Link } from '@inertiajs/vue3';
</script>