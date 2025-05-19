<template>
    <FrontLayout>

 <!-- 2. Hero Image Section -->
    <section class="hero-bg-image bg-cover bg-center h-[500px] md:h-[600px] lg:h-[700px] relative flex items-center justify-center">
        <div class="relative z-10 text-center p-6 find-home-text-bg">
            <h1 class="text-white text-4xl sm:text-5xl md:text-6xl font-bold uppercase tracking-wider">
                Find Your Home
            </h1>
        </div>
    </section>

    <!-- 3. Search Filter Section -->
    <section class="bg-gray-50 py-12 md:py-16 -mt-16 relative z-20">
        <div class="container mx-auto px-4">
            <div class="bg-white p-6 md:p-10 shadow-xl rounded-md max-w-5xl mx-auto">
                <form class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-6 items-end">
                    <div>
                        <label for="keyword" class="block text-sm font-medium text-gray-700 mb-1">Keyword</label>
                        <input type="text" id="keyword" placeholder="Keyword" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-south-brown focus:border-transparent text-gray-700">
                    </div>
                    <div>
                        <label for="all-cities" class="block text-sm font-medium text-gray-700 mb-1">All Cities</label>
                        <select  id="all-cities" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-south-brown focus:border-transparent text-gray-700 bg-white">
                            <option>All Cities</option> 
                            <option v-for="city in cities" :key="city">{{ city }}</option> 
 
                        </select>
                    </div>
                    <div>
                        <label for="all-categories" class="block text-sm font-medium text-gray-700 mb-1">All Categories</label>
                        <select id="all-categories" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-south-brown focus:border-transparent text-gray-700 bg-white">
                            <option>All Categories</option>
                            <option >Apartment</option>
                              <option>House</option>
                        </select>
                    </div>
                    <div>
                        <label for="all-offers" class="block text-sm font-medium text-gray-700 mb-1">All Offers</label>
                        <select id="all-offers" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-south-brown focus:border-transparent text-gray-700 bg-white">
                            <option>All Offers</option> <option>For Sale</option> <option>For Rent</option>
                        </select>
                    </div>
                    <div class="sm:col-span-2 lg:col-span-1">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Price Range</label>
                        <div class="flex space-x-2">
                            <input type="number" placeholder="Min $" class="w-1/2 p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-south-brown focus:border-transparent text-gray-700">
                            <input type="number" placeholder="Max $" class="w-1/2 p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-south-brown focus:border-transparent text-gray-700">
                        </div>
                    </div>
                     <div>
                        <label for="bedrooms" class="block text-sm font-medium text-gray-700 mb-1">Bedrooms</label>
                        <select id="bedrooms" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-south-brown focus:border-transparent text-gray-700 bg-white">
                            <option>Bedrooms</option> <option>1</option> <option>2</option> <option>3+</option>
                        </select>
                    </div>
                    <div>
                        <label for="bathrooms" class="block text-sm font-medium text-gray-700 mb-1">Bathrooms</label>
                        <select id="bathrooms" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-south-brown focus:border-transparent text-gray-700 bg-white">
                            <option>Bathrooms</option> <option>1</option> <option>2</option> <option>3+</option>
                        </select>
                    </div>
                    <div class="sm:col-span-2 lg:col-span-1">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Area (sq ft)</label>
                         <div class="flex space-x-2">
                            <input type="number" placeholder="Min sq ft" class="w-1/2 p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-south-brown focus:border-transparent text-gray-700">
                            <input type="number" placeholder="Max sq ft" class="w-1/2 p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-south-brown focus:border-transparent text-gray-700">
                        </div>
                    </div>
                    <div class="col-span-1 sm:col-span-2 lg:col-span-4 flex flex-col sm:flex-row justify-between items-center gap-4 pt-4">
                        <a href="#" class="text-sm text-south-brown hover:underline">+ More Filters</a>
                        <button type="submit" class="w-full sm:w-auto bg-south-brown hover:bg-opacity-80 text-white font-semibold py-3 px-10 rounded-md transition duration-150 uppercase tracking-wider">
                            Search
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- 4. Featured Properties Section - ENHANCED -->
    <section class="py-12 md:py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-10 md:mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 uppercase">Featured Properties</h2>
                <p class="text-gray-500 mt-2">Suspendisse dictum enim sit amet libero malesuada feugiat.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Property Card 1 -->
                <div v-for="(house, index) in houses" :key="house.id" class="bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden group transition-all duration-300 hover:shadow-2xl hover:-translate-y-2">
                    <div class="relative">
                        <img src="https://themewagon.github.io/south/img/bg-img/feature1.jpg" alt="Property Image" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                        <span class="absolute top-4 left-4 bg-south-brown text-white text-xs font-semibold px-3 py-1.5 rounded shadow-md uppercase tracking-wider">For Sale</span>
                        <div class="absolute bottom-0 left-0 w-full p-4 bg-gradient-to-t from-black/80 via-black/50 to-transparent">
                            <p class="text-white text-2xl font-bold">৳ {{ house.price.toFixed(2) }}</p>
                        </div>
                    </div>
                    <div class="p-5">
                        <h3 class="text-xl font-bold text-gray-800 mb-1 group-hover:text-south-brown transition-colors duration-200">
                            <a :href="`/room/${house.slug}`" class="hover:underline">{{ house.title }}</a>
                        </h3>
                        <p class="text-sm text-gray-500 mb-3 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 mr-1.5 text-gray-400 flex-shrink-0"> <path fill-rule="evenodd" d="M9.69 18.933l.003.001C9.89 19.02 10 19 10 19s.11.02.308-.066l.002-.001.006-.003.018-.008a5.741 5.741 0 00.281-.145l.005-.002.007-.004.011-.007a48.45 48.45 0 002.406-1.916l.003-.002c1.604-1.41 3.096-3.076 3.999-4.817.888-1.707 1.261-3.49 1.261-5.224C18 5.48 14.433 2 10 2S2 5.48 2 9.755c0 1.734.373 3.517 1.261 5.224.903 1.74 2.395 3.406 3.999 4.817l.003.002a48.445 48.445 0 002.406 1.916l.011.007.007.004.005.002a5.74 5.74 0 00.28.145l.019.008.006.003zM10 11.75a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" /> </svg>
                            {{ house.address }}
                        </p>
                        <p class="text-gray-600 text-sm my-4 h-12 line-clamp-2">
                            {{ house.short_desc }}
                        </p>
                        <div class="border-t border-gray-200 pt-4 mt-4">
                            <div class="flex flex-wrap justify-between items-center text-xs text-gray-600 gap-y-3 gap-x-2">
                                <span class="inline-flex items-center bg-yellow-100 text-yellow-800 px-2.5 py-1 rounded-full font-medium">
                                    <svg class="w-3 h-3 mr-1.5 text-yellow-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                    NEW
                                </span>
                                <span class="flex items-center" title="Property Type">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 mr-1 text-south-brown"><path d="M10.75 2.75a.75.75 0 00-1.5 0v8.586l-1.22-1.22a.75.75 0 00-1.06 1.06l2.5 2.5a.75.75 0 001.06 0l2.5-2.5a.75.75 0 10-1.06-1.06l-1.22 1.22V2.75z" /><path d="M3.5 9.75a.75.75 0 01.75-.75h11.5a.75.75 0 010 1.5H4.25a.75.75 0 01-.75-.75zM3 15.25a.75.75 0 01.75-.75h12.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z" /></svg>
                                    House
                                </span>
                                <span class="flex items-center" title="Bedrooms">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1 text-south-brown"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" /></svg>
                                    {{ house.bedroom }} Bed
                                </span>
                                <span class="flex items-center" title="Bathrooms">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1 text-south-brown"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5V21M10.5 10.5V21M10.5 10.5C10.5 7.90215 8.79995 5.75 6.375 5.75C4.20005 5.75 2.25 7.90215 2.25 10.5V10.5C2.25 12.375 3.375 14.625 6.375 14.625C8.25 14.625 9.375 16.125 9.375 16.125" /><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 11.25l-3.75-5.25M13.5 11.25l3.75-5.25M13.5 11.25v3.75M13.5 15H9.75M13.5 15H15M13.5 15v3.75M13.5 18.75v3.75M13.5 22.5v-3.75" /></svg>
                                    {{ house.bathroom }} Bath
                                </span>
                                <span class="flex items-center" title="Area">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1 text-south-brown"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" /></svg>
                                    {{ house.size }} sq ft
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

               
            </div>
        </div>
    </section>

    <!-- 5. CTA Rent Section -->
    <section class="cta-rent-bg bg-cover bg-center py-20 md:py-32 relative">
        <div class="absolute inset-0 bg-black opacity-60"></div>
        <div class="container mx-auto px-4 text-center relative z-10">
            <h2 class="text-3xl md:text-4xl font-bold text-white uppercase">Are you looking for a place to rent?</h2>
            <p class="text-gray-300 mt-4 mb-8 text-lg">Suspendisse dictum enim sit amet libero malesuada feugiat.</p>
            <a href="#" class="bg-south-brown hover:bg-opacity-80 text-white font-semibold py-3 px-10 rounded-md transition duration-150 uppercase tracking-wider">
                Search
            </a>
        </div>
    </section>

    <!-- 6. Client Testimonials Section -->
    <section class="py-12 md:py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-10 md:mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 uppercase">Client Testimonials</h2>
                <p class="text-gray-500 mt-2">Suspendisse dictum enim sit amet libero malesuada feugiat.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                {[...Array(3)].map((_, i) => (
                <div key={i} class="bg-white p-8 rounded-lg shadow-lg text-center transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <h4 class="text-lg font-semibold text-gray-800 mb-3">Perfect Home for me</h4>
                    <p class="text-gray-600 text-sm leading-relaxed mb-6">
                        Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit.
                    </p>
                    <div class="flex flex-col items-center">
                        <img :src="'https://themewagon.github.io/south/img/clients-img/${i % 3 + 1}.jpg'" alt="Client" class="w-16 h-16 rounded-full mb-3 object-cover border-2 border-gray-200">
                        <p class="font-semibold text-gray-700">Diane Smith, <span class="font-normal text-gray-500">Customer</span></p>
                    </div>
                </div>
                ))}
            </div>
        </div>
    </section>

    <!-- 7. Jeremy Scott Realtor Section -->
     <section class="py-12 md:py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 items-center">
                <div>
                    <div class="flex items-center mb-4">
                        <span class="text-4xl text-south-brown mr-3 font-serif italic">❞</span>
                        <div>
                            <h2 class="text-3xl font-bold text-gray-800">JEREMY SCOTT</h2>
                            <p class="text-south-brown">Realtor</p>
                        </div>
                    </div>
                    <p class="text-gray-600 leading-relaxed mb-6">
                        Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odio vestibulum est mattis effic iturut magna. Curabitur rhoncus auctor eleifend. Fusce venenatis diam urna, eu pharetra arcu varius ac. Etiam cursus turpis lectus, id iaculis risus tempor id. Phasellus fringilla nisl sed scm scelerisque, eget aliquam magna vehicula.
                    </p>
                    <div class="space-y-3 text-gray-700 mb-6">
                        <p class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 mr-2 text-south-brown"><path fill-rule="evenodd" d="M2 3.5A1.5 1.5 0 013.5 2h1.148a1.5 1.5 0 011.465 1.175l.716 3.578a1.5 1.5 0 01-1.052 1.767l-.933.267c-.41.117-.643.555-.48.95a11.542 11.542 0 006.254 6.254c.395.163.833-.07.95-.48l.267-.933a1.5 1.5 0 011.767-1.052l3.578.716A1.5 1.5 0 0118 15.352V16.5a1.5 1.5 0 01-1.5 1.5H15c-1.149 0-2.263-.15-3.326-.43A13.022 13.022 0 012.43 8.326 13.019 13.019 0 012 5V3.5z" clip-rule="evenodd" /></svg>
                            +45 677 8993000 223
                        </p>
                        <p class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 mr-2 text-south-brown"><path d="M3 4a2 2 0 00-2 2v1.161l8.441 4.221a1.25 1.25 0 001.118 0L19 7.161V6a2 2 0 00-2-2H3z" /><path d="M19 8.839l-7.77 3.885a2.75 2.75 0 01-2.46 0L1 8.839V14a2 2 0 002 2h14a2 2 0 002-2V8.839z" /></svg>
                            office@template.com
                        </p>
                    </div>
                    <img src="https://themewagon.github.io/south/img/core-img/signature.png" alt="Signature" class="h-12">
                </div>
                <div class="realtor-jeremy-bg bg-cover bg-center h-96 md:h-[550px] rounded-lg shadow-md">
                </div>
            </div>
        </div>
    </section>
   
</FrontLayout>
   
</template>

<script setup lang="ts">
    import FrontLayout from '@/front/AppLayout.vue';


    defineProps({
        houses: Array,
        cities: Array,
        categroies: Array,
    })

</script>

