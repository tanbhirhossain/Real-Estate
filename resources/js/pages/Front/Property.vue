<template>
    <AppLayout>
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
    </AppLayout>
</template>

<script lang="ts" setup>
    import AppLayout from '@/front/AppLayout.vue';

    defineProps({
        houses: Array,
        cities: Array,
    });
</script>