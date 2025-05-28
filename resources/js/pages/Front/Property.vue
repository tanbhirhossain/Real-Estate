<template>
    <AppLayout>
        <!-- Search Filter Section -->
        <section class="bg-gray-50 py-12 md:py-16 -mt-16 relative z-20">
            <div class="container mx-auto px-4">
                <div class="bg-white p-6 md:p-10 shadow-xl rounded-md max-w-5xl mx-auto">
                    <form @submit.prevent="manualTriggerFilter" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-6 items-end">
                        <div>
                            <label for="keyword" class="block text-sm font-medium text-gray-700 mb-1">Keyword</label>
                            <input v-model.trim="formFilters.keyword" type="text" id="keyword" placeholder="Keyword" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-south-brown focus:border-transparent text-gray-700">
                        </div>
                        <div>
                            <label for="all-cities" class="block text-sm font-medium text-gray-700 mb-1">All Cities</label>
                            <select v-model="formFilters.city" id="all-cities" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-south-brown focus:border-transparent text-gray-700 bg-white">
                                <option value="">All Cities</option>
                                <option v-for="city in cities" :key="city" :value="city">{{ city }}</option>
                            </select>
                        </div>
                        <div>
                            <label for="all-categories" class="block text-sm font-medium text-gray-700 mb-1">All Categories</label>
                            <select v-model="formFilters.category" id="all-categories" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-south-brown focus:border-transparent text-gray-700 bg-white">
                                <option value="">All Categories</option>
                                <option v-for="cat in categories" :key="cat.id" :value="cat.name">{{ cat.name }}</option>
                            </select>
                        </div>
                        <div>
                            <label for="all-offers" class="block text-sm font-medium text-gray-700 mb-1">All Offers</label>
                            <select v-model="formFilters.offerType" id="all-offers" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-south-brown focus:border-transparent text-gray-700 bg-white">
                                <option value="">All Offers</option>
                                <option value="sale">For Sale</option>
                                <option value="rent">For Rent</option>
                            </select>
                        </div>
                        <div class="sm:col-span-2 lg:col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Price Range</label>
                            <div class="flex space-x-2">
                                <input v-model.number="formFilters.minPrice" type="number" placeholder="Min $" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-south-brown focus:border-transparent text-gray-700">
                                <input v-model.number="formFilters.maxPrice" type="number" placeholder="Max $" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-south-brown focus:border-transparent text-gray-700">
                            </div>
                        </div>
                         <div>
                            <label for="bedrooms" class="block text-sm font-medium text-gray-700 mb-1">Bedrooms</label>
                            <select v-model="formFilters.bedrooms" id="bedrooms" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-south-brown focus:border-transparent text-gray-700 bg-white">
                                <option value="">Bedrooms</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="3+">3+</option>
                            </select>
                        </div>
                        <div>
                            <label for="bathrooms" class="block text-sm font-medium text-gray-700 mb-1">Bathrooms</label>
                            <select v-model="formFilters.bathrooms" id="bathrooms" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-south-brown focus:border-transparent text-gray-700 bg-white">
                                <option value="">Bathrooms</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="3+">3+</option>
                            </select>
                        </div>
                        <div class="sm:col-span-2 lg:col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Area (sq ft)</label>
                             <div class="flex space-x-2">
                                <input v-model.number="formFilters.minArea" type="number" placeholder="Min sq ft" class="w-1/2 p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-south-brown focus:border-transparent text-gray-700">
                                <input v-model.number="formFilters.maxArea" type="number" placeholder="Max sq ft" class="w-1/2 p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-south-brown focus:border-transparent text-gray-700">
                            </div>
                        </div>
                        <div class="col-span-1 sm:col-span-2 lg:col-span-4 flex flex-col sm:flex-row justify-end items-center gap-4 pt-4">
                             <button type="submit" class="w-full sm:w-auto bg-south-brown hover:bg-opacity-80 text-white font-semibold py-3 px-10 rounded-md transition duration-150 uppercase tracking-wider">
                                Search
                            </button>
                            <a href="#" @click.prevent="resetFiltersAndSearch" class="text-sm text-gray-600 hover:text-south-brown hover:underline">Reset Filters</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- Featured Properties Section -->
        <section class="py-12 md:py-20 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center mb-10 md:mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 uppercase">Featured Properties</h2>
                    <p class="text-gray-500 mt-2" v-if="isApplyingFilters">Searching for properties...</p>
                    <p class="text-gray-500 mt-2" v-else-if="localHouses.total > 0">Showing {{ localHouses.data.length }} of {{ localHouses.total }} properties.</p>
                    <p class="text-gray-500 mt-2" v-else>No properties match your current filters.</p>
                </div>

                <div v-if="isApplyingFilters && localHouses.data.length === 0" class="col-span-full text-center text-gray-500 py-10">
                    Loading properties...
                </div>
                <div v-else class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div v-if="localHouses.data.length === 0 && !isApplyingFilters" class="col-span-full text-center text-gray-500 py-10">
                        No properties found matching your criteria. Try adjusting your filters.
                    </div>
                    <!-- Property Card (uses house from localHouses.data) -->
                    <div v-for="house in localHouses.data" :key="house.id" class="bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden group transition-all duration-300 hover:shadow-2xl hover:-translate-y-2">
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
                                    <span class="inline-flex items-center bg-yellow-100 text-yellow-800 px-2.5 py-1 rounded-full font-medium">NEW</span>
                                    <span class="flex items-center" title="Property Type"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 mr-1 text-south-brown"><path d="M10.75 2.75a.75.75 0 00-1.5 0v8.586l-1.22-1.22a.75.75 0 00-1.06 1.06l2.5 2.5a.75.75 0 001.06 0l2.5-2.5a.75.75 0 10-1.06-1.06l-1.22 1.22V2.75z" /><path d="M3.5 9.75a.75.75 0 01.75-.75h11.5a.75.75 0 010 1.5H4.25a.75.75 0 01-.75-.75zM3 15.25a.75.75 0 01.75-.75h12.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z" /></svg> {{ house.category?.name || 'N/A' }}</span>
                                    <span class="flex items-center" title="Bedrooms"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1 text-south-brown"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" /></svg> {{ house.bedroom }} Bed</span>
                                    <span class="flex items-center" title="Bathrooms"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1 text-south-brown"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5V21M10.5 10.5V21M10.5 10.5C10.5 7.90215 8.79995 5.75 6.375 5.75C4.20005 5.75 2.25 7.90215 2.25 10.5V10.5C2.25 12.375 3.375 14.625 6.375 14.625C8.25 14.625 9.375 16.125 9.375 16.125" /><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 11.25l-3.75-5.25M13.5 11.25l3.75-5.25M13.5 11.25v3.75M13.5 15H9.75M13.5 15H15M13.5 15v3.75M13.5 18.75v3.75M13.5 22.5v-3.75" /></svg> {{ house.bathroom }} Bath</span>
                                    <span class="flex items-center" title="Area"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1 text-south-brown"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" /></svg> {{ house.size }} sq ft</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Load More Button -->
                <div v-if="localHouses.next_page_url && !isApplyingFilters" class="text-center mt-10">
                    <button
                        @click="loadMoreHouses"
                        :disabled="isLoadingMore"
                        class="bg-south-brown hover:bg-opacity-80 text-white font-semibold py-3 px-10 rounded-md transition duration-150 uppercase tracking-wider disabled:opacity-50">
                        {{ isLoadingMore ? 'Loading...' : 'Load More' }}
                    </button>
                </div>
            </div>
        </section>
    </AppLayout>
</template>

<script lang="ts" setup>
import AppLayout from '@/front/AppLayout.vue';
import { ref, reactive, watch, onMounted } from 'vue';
import { router } from '@inertiajs/vue3';
import { debounce } from 'lodash-es'; // Ensure you have: npm install lodash-es

// Interfaces
interface House {
    id: number;
    title: string;
    slug: string;
    address: string;
    city: string;
    category?: { id: number; name: string };
    offer_type?: 'sale' | 'rent' | string;
    price: number;
    bedroom: number;
    bathroom: number;
    size: number;
    short_desc?: string;
    first_image_url?: string | null;
}

interface Category {
    id: number;
    name: string;
}

interface PaginatedHouses {
    current_page: number;
    data: House[];
    first_page_url: string;
    from: number;
    last_page: number;
    last_page_url: string;
    links: { url: string | null; label: string; active: boolean }[];
    next_page_url: string | null;
    path: string;
    per_page: number;
    prev_page_url: string | null;
    to: number;
    total: number;
}

const props = defineProps({
    houses: {
        type: Object as () => PaginatedHouses,
        required: true,
    },
    cities: {
        type: Array as () => string[],
        default: () => [],
    },
    categories: {
        type: Array as () => Category[],
        default: () => [],
    },
    filters: {
        type: Object as () => Record<string, any>,
        default: () => ({}),
    },
});

const localHouses = ref<PaginatedHouses>({ ...props.houses });
const isLoadingMore = ref(false);
const isApplyingFilters = ref(false);

const getInitialFormFilters = () => ({
    keyword: props.filters?.keyword || '',
    city: props.filters?.city || '',
    category: props.filters?.category || '',
    offerType: props.filters?.offerType || '',
    minPrice: props.filters?.minPrice || null,
    maxPrice: props.filters?.maxPrice || null,
    bedrooms: props.filters?.bedrooms || '',
    bathrooms: props.filters?.bathrooms || '',
    minArea: props.filters?.minArea || null,
    maxArea: props.filters?.maxArea || null,
});

const formFilters = reactive(getInitialFormFilters());

console.log("Initial props.filters:", JSON.parse(JSON.stringify(props.filters)));
console.log("Initial formFilters state:", JSON.parse(JSON.stringify(formFilters)));
console.log("Initial localHouses state:", JSON.parse(JSON.stringify(localHouses.value)));


const sendFilterRequest = () => {
    console.log('sendFilterRequest: Preparing to send filters.');
    isApplyingFilters.value = true;

    const activeFiltersToSend: Record<string, any> = {};
    for (const key in formFilters) {
        const value = (formFilters as Record<string, any>)[key];
        if (value !== null && value !== '' && !(Array.isArray(value) && value.length === 0)) {
            activeFiltersToSend[key] = value;
        }
    }
    console.log('sendFilterRequest: Filters prepared to send to backend:', JSON.parse(JSON.stringify(activeFiltersToSend)));

    router.get(route('front.property.index'), activeFiltersToSend, { // MAKE SURE 'front.property.index' IS YOUR CORRECT ROUTE NAME
        preserveState: true,
        preserveScroll: true,
        replace: true, // Good for filter changes not to bloat history
        onStart: () => {
            console.log("sendFilterRequest: ROUTER.GET onStart");
        },
        onSuccess: (page) => {
            console.log("sendFilterRequest: ROUTER.GET onSuccess. New props.houses received:", JSON.parse(JSON.stringify(page.props.houses)));
            // props.houses is updated by Inertia. We use localHouses for rendering and load more.
            // The watcher on props.houses will handle updating localHouses.
        },
        onError: (errors) => {
            console.error("sendFilterRequest: ROUTER.GET onError:", errors);
            isApplyingFilters.value = false; // Reset on error
        },
        onFinish: () => {
            console.log("sendFilterRequest: ROUTER.GET onFinish");
            isApplyingFilters.value = false;
        },
    });
};

// Debounced version for live filtering
const debouncedSendFilterRequest = debounce(sendFilterRequest, 700); // 700ms debounce

// Watch formFilters for changes to trigger live filtering
watch(formFilters, (newFilters, oldFilters) => {
    console.clear(); // Clear console for fresh logs each time this watcher runs
    console.log('WATCHER TRIGGERED by change in formFilters');
    console.log('Current formFilters state (newFilters):', JSON.parse(JSON.stringify(newFilters)));
    debouncedSendFilterRequest();
}, { deep: true });

// For manual "Search" button click
const manualTriggerFilter = () => {
    console.log("Manual Search Button Clicked");
    // Cancel any pending debounced requests to avoid double sending
    debouncedSendFilterRequest.cancel();
    sendFilterRequest();
};


const loadMoreHouses = () => {
    if (!localHouses.value.next_page_url || isLoadingMore.value || isApplyingFilters.value) {
        return;
    }
    isLoadingMore.value = true;
    console.log("--- loadMoreHouses: Loading More Houses ---");
    console.log("Requesting URL:", localHouses.value.next_page_url);

    router.get(localHouses.value.next_page_url, {}, {
        preserveState: true,
        preserveScroll: true,
        only: ['houses'],
        onSuccess: (page) => {
            const newPaginator = page.props.houses as PaginatedHouses;
            console.log("loadMoreHouses: onSuccess. New paginator:", newPaginator);
            localHouses.value.data.push(...newPaginator.data);
            localHouses.value.current_page = newPaginator.current_page;
            localHouses.value.next_page_url = newPaginator.next_page_url;
            // props.houses is also updated by Inertia, but we primarily manage localHouses here
        },
        onError: (errors) => {
            console.error("loadMoreHouses: onError:", errors);
            isLoadingMore.value = false; // Reset on error
        },
        onFinish: () => {
            isLoadingMore.value = false;
            console.log("loadMoreHouses: onFinish. Total displayed:", localHouses.value.data.length);
        },
    });
};

const resetFiltersAndSearch = () => {
    console.log("--- resetFiltersAndSearch: Resetting Filters ---");
    Object.assign(formFilters, getInitialFormFilters());
    console.log("Form filters after reset:", JSON.parse(JSON.stringify(formFilters)));
    // Cancel any pending debounced requests
    debouncedSendFilterRequest.cancel();
    sendFilterRequest(); // Trigger search with reset filters immediately
};

onMounted(() => {
    // localHouses is already initialized with props.houses above
    console.log("Component mounted.");
});

// This watcher is crucial for when props.houses is entirely replaced by Inertia
// after a filter operation (triggered by sendFilterRequest).
watch(() => props.houses, (newPropsHousesPaginator) => {
    console.log("WATCHER on props.houses: The main 'houses' prop from Inertia has changed.");
    console.log("New props.houses paginator:", JSON.parse(JSON.stringify(newPropsHousesPaginator)));
    if (!isLoadingMore.value) { // Avoid race condition with loadMore
        localHouses.value = { ...newPropsHousesPaginator };
        console.log("WATCHER on props.houses: Synced localHouses with the new props.houses.");
    } else {
        console.log("WATCHER on props.houses: Skipped syncing localHouses because isLoadingMore is true.");
    }
}, { deep: true });

</script>