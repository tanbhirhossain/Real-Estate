<template>
    <AppLayout>
            <!-- 3. Search Filter Section -->
    <section class="bg-gray-50 py-12 md:py-16 -mt-16 relative z-20">
        <div class="container mx-auto px-4">
            <div class="bg-white p-6 md:p-10 shadow-xl rounded-md max-w-5xl mx-auto">
                <!-- Add @submit.prevent to handle client-side filtering without page reload -->
                <form @submit.prevent class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-6 items-end">
                    <div>
                        <label for="keyword" class="block text-sm font-medium text-gray-700 mb-1">Keyword</label>
                        <input v-model="filters.keyword" type="text" id="keyword" placeholder="Keyword" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-south-brown focus:border-transparent text-gray-700">
                    </div>
                    <div>
                        <label for="all-cities" class="block text-sm font-medium text-gray-700 mb-1">All Cities</label>
                        <select v-model="filters.city" id="all-cities" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-south-brown focus:border-transparent text-gray-700 bg-white">
                            <option value="">All Cities</option>
                            <option v-for="city in cities" :key="city" :value="city">{{ city }}</option>
                        </select>
                    </div>
                    <div>
                        <label for="all-categories" class="block text-sm font-medium text-gray-700 mb-1">All Categories</label>
                        <select v-model="filters.category" id="all-categories" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-south-brown focus:border-transparent text-gray-700 bg-white">
                            <option value="">All Categories</option>
                            <!-- Assuming categories prop is an array of objects like {id: 1, name: 'Apartment'} -->
                            <option v-for="category in categories" :key="category.id" :value="category.name">{{ category.name }}</option>
                        </select>
                    </div>
                    <div>
                        <label for="all-offers" class="block text-sm font-medium text-gray-700 mb-1">All Offers</label>
                        <select v-model="filters.offerType" id="all-offers" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-south-brown focus:border-transparent text-gray-700 bg-white">
                            <option value="">All Offers</option>
                            <option value="sale">For Sale</option>
                            <option value="rent">For Rent</option>
                        </select>
                    </div>
                    <div class="sm:col-span-2 lg:col-span-1">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Price Range</label>
                        <div class="flex space-x-2">
                            <input v-model.number="filters.minPrice" type="number" placeholder="Min $" class="w-1/2 p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-south-brown focus:border-transparent text-gray-700">
                            <input v-model.number="filters.maxPrice" type="number" placeholder="Max $" class="w-1/2 p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-south-brown focus:border-transparent text-gray-700">
                        </div>
                    </div>
                     <div>
                        <label for="bedrooms" class="block text-sm font-medium text-gray-700 mb-1">Bedrooms</label>
                        <select v-model="filters.bedrooms" id="bedrooms" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-south-brown focus:border-transparent text-gray-700 bg-white">
                            <option value="">Bedrooms</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3+">3+</option>
                        </select>
                    </div>
                    <div>
                        <label for="bathrooms" class="block text-sm font-medium text-gray-700 mb-1">Bathrooms</label>
                        <select v-model="filters.bathrooms" id="bathrooms" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-south-brown focus:border-transparent text-gray-700 bg-white">
                            <option value="">Bathrooms</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3+">3+</option>
                        </select>
                    </div>
                    <div class="sm:col-span-2 lg:col-span-1">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Area (sq ft)</label>
                         <div class="flex space-x-2">
                            <input v-model.number="filters.minArea" type="number" placeholder="Min sq ft" class="w-1/2 p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-south-brown focus:border-transparent text-gray-700">
                            <input v-model.number="filters.maxArea" type="number" placeholder="Max sq ft" class="w-1/2 p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-south-brown focus:border-transparent text-gray-700">
                        </div>
                    </div>
                    <div class="col-span-1 sm:col-span-2 lg:col-span-4 flex flex-col sm:flex-row justify-between items-center gap-4 pt-4">
                        <a href="#" class="text-sm text-south-brown hover:underline">+ More Filters</a>
                        <!-- The button type="submit" will not cause a page reload due to @submit.prevent on the form -->
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
                <p class="text-gray-500 mt-2" v-if="filteredHouses.length > 0">Showing {{ filteredHouses.length }} properties.</p>
                <p class="text-gray-500 mt-2" v-else>No properties match your current filters.</p>
            </div>

            <!-- Use filteredHouses here -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div v-if="filteredHouses.length === 0" class="col-span-full text-center text-gray-500 py-10">
                    No properties found matching your criteria. Try adjusting your filters.
                </div>
                <!-- Property Card -->
                <div v-for="house in filteredHouses" :key="house.id" class="bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden group transition-all duration-300 hover:shadow-2xl hover:-translate-y-2">
                    <div class="relative">
                        <!-- Use house.first_image_url if available, otherwise fallback -->
                        <img :src="house.first_image_url || 'https://themewagon.github.io/south/img/bg-img/feature1.jpg'" alt="Property Image" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                        <!-- Dynamically display offer type if available on house object -->
                        <span v-if="house.offer_type" class="absolute top-4 left-4 bg-south-brown text-white text-xs font-semibold px-3 py-1.5 rounded shadow-md uppercase tracking-wider">
                            {{ house.offer_type === 'sale' ? 'For Sale' : (house.offer_type === 'rent' ? 'For Rent' : house.offer_type) }}
                        </span>
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
                                    NEW <!-- This could be dynamic too if you have a field for it -->
                                </span>
                                <span class="flex items-center" title="Property Type">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 mr-1 text-south-brown"><path d="M10.75 2.75a.75.75 0 00-1.5 0v8.586l-1.22-1.22a.75.75 0 00-1.06 1.06l2.5 2.5a.75.75 0 001.06 0l2.5-2.5a.75.75 0 10-1.06-1.06l-1.22 1.22V2.75z" /><path d="M3.5 9.75a.75.75 0 01.75-.75h11.5a.75.75 0 010 1.5H4.25a.75.75 0 01-.75-.75zM3 15.25a.75.75 0 01.75-.75h12.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z" /></svg>
                                    {{ house.category?.name || 'N/A' }} <!-- Display category name -->
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
    </AppLayout>
</template>

<script lang="ts" setup>
    import AppLayout from '@/front/AppLayout.vue';
    import { ref, computed, reactive } from 'vue';

    // Define props including categories
    const props = defineProps({
        houses: Array as () => any[], // Assuming 'any' for house structure for now, define a type/interface for better type safety
        cities: Array as () => string[],
        categories: Array as () => { id: number; name: string }[], // Assuming category has id and name
    });

    // Reactive state for filters
    const filters = reactive({
        keyword: '',
        city: '',
        category: '',
        offerType: '', // 'sale', 'rent'
        minPrice: null as number | null,
        maxPrice: null as number | null,
        bedrooms: '', // '', '1', '2', '3+'
        bathrooms: '', // '', '1', '2', '3+'
        minArea: null as number | null,
        maxArea: null as number | null,
    });

    // Computed property to filter houses
    const filteredHouses = computed(() => {
        if (!props.houses) return [];

        return props.houses.filter(house => {
            // Keyword filter (checks title, address, short_desc)
            if (filters.keyword) {
                const searchTerm = filters.keyword.toLowerCase();
                if (
                    !house.title?.toLowerCase().includes(searchTerm) &&
                    !house.address?.toLowerCase().includes(searchTerm) &&
                    !house.short_desc?.toLowerCase().includes(searchTerm)
                ) {
                    return false;
                }
            }

            // City filter
            if (filters.city && house.city !== filters.city) {
                return false;
            }

            // Category filter (assuming house.category.name exists)
            if (filters.category && house.category?.name !== filters.category) {
                return false;
            }

            // Offer Type filter (assuming house.offer_type exists and is 'sale' or 'rent')
            // Ensure your house objects have an 'offer_type' property for this to work.
            if (filters.offerType && house.offer_type !== filters.offerType) {
                return false;
            }

            // Price range filter
            if (filters.minPrice !== null && house.price < filters.minPrice) {
                return false;
            }
            if (filters.maxPrice !== null && house.price > filters.maxPrice) {
                return false;
            }

            // Bedrooms filter
            if (filters.bedrooms) {
                if (filters.bedrooms === '3+') {
                    if (house.bedroom < 3) return false;
                } else {
                    if (house.bedroom !== parseInt(filters.bedrooms)) return false;
                }
            }

            // Bathrooms filter
            if (filters.bathrooms) {
                if (filters.bathrooms === '3+') {
                    if (house.bathroom < 3) return false;
                } else {
                    if (house.bathroom !== parseInt(filters.bathrooms)) return false;
                }
            }

            // Area range filter
            if (filters.minArea !== null && house.size < filters.minArea) {
                return false;
            }
            if (filters.maxArea !== null && house.size > filters.maxArea) {
                return false;
            }

            return true; // House passes all filters
        });
    });
</script>