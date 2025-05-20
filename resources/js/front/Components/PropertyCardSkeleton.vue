<template>
    <div class="bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden group transition-all duration-300 hover:shadow-2xl hover:-translate-y-2">
        <div class="relative">
            <img :src="house.first_image_url || 'https://themewagon.github.io/south/img/bg-img/feature1.jpg'" alt="Property Image" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
            <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
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
                        NEW
                    </span>
                    <span class="flex items-center" title="Property Type">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 mr-1 text-south-brown"><path d="M10.75 2.75a.75.75 0 00-1.5 0v8.586l-1.22-1.22a.75.75 0 00-1.06 1.06l2.5 2.5a.75.75 0 001.06 0l2.5-2.5a.75.75 0 10-1.06-1.06l-1.22 1.22V2.75z" /><path d="M3.5 9.75a.75.75 0 01.75-.75h11.5a.75.75 0 010 1.5H4.25a.75.75 0 01-.75-.75zM3 15.25a.75.75 0 01.75-.75h12.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z" /></svg>
                        {{ house.category?.name || 'N/A' }}
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
</template>

<script lang="ts" setup>
defineProps({
    house: {
        type: Object as () => any, // Define a more specific type/interface for 'house'
        required: true,
    }
});
</script>