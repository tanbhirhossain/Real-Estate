<template>
    <FrontLayout>

        <!-- Breadcrumbs (New Section) -->
        <section class="bg-gray-100 py-3 border-b border-gray-200">
            <div class="container mx-auto px-4">
                <nav class="text-sm" aria-label="Breadcrumb">
                    <ol class="list-none p-0 inline-flex space-x-2">
                        <li class="flex items-center">
                            <a href="/" class="text-gray-500 hover:text-south-brown transition-colors">Home</a>
                            <svg class="fill-current w-3 h-3 mx-2 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/></svg>
                        </li>
                        <li class="flex items-center">
                            <a href="/properties" class="text-gray-500 hover:text-south-brown transition-colors">Properties</a>
                            <svg class="fill-current w-3 h-3 mx-2 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/></svg>
                        </li>
                        <li class="flex items-center">
                            <span class="text-gray-700 font-medium">{{ house?.title || 'Property Details' }}</span>
                        </li>
                    </ol>
                </nav>
            </div>
        </section>

        <!-- 2. Hero Section for Property Details - Refined -->
        <section
            :style="{ backgroundImage: `url(${house?.main_image_url || 'https://themewagon.github.io/south/img/bg-img/hero1.jpg'})` }"
            class="bg-cover bg-center h-[300px] md:h-[350px] relative flex items-center justify-center">
            <div class="absolute inset-0 bg-black opacity-50"></div> <!-- Darker overlay for better text contrast -->
            <div class="relative z-10 text-center p-6">
                <h1 class="text-white text-3xl sm:text-4xl md:text-5xl font-bold uppercase tracking-wider">
                    {{ house?.title || 'Property Details' }}
                </h1>
                <p v-if="house?.address" class="text-gray-200 mt-2 text-lg">
                    {{ house.address }}
                </p>
            </div>
        </section>

        <!-- 3. Search Filter Section (Mostly unchanged, but consider context) -->
        <!-- This might be less relevant directly on a specific property page unless it's for "find similar" -->
        <!-- For this refinement, I'll keep it as it matches the screenshot provided. -->
        <section class="bg-gray-50 py-10 md:py-12 relative z-20 -mt-16 md:-mt-20">
            <div class="container mx-auto px-4">
                <div class="bg-white p-6 md:p-8 shadow-xl rounded-lg max-w-4xl mx-auto"> <!-- Slightly increased rounding and padding -->
                    <form class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-6 items-end">
                        <div>
                            <label for="keyword" class="block text-xs font-medium text-gray-600 mb-1">Keyword</label>
                            <input type="text" id="keyword" placeholder="e.g. Pool, Garage" class="w-full p-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-south-brown focus:border-transparent text-gray-700 text-sm">
                        </div>
                        <div>
                            <label for="all-cities" class="block text-xs font-medium text-gray-600 mb-1">All Cities</label>
                            <select id="all-cities" class="w-full p-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-south-brown focus:border-transparent text-gray-700 bg-white text-sm">
                                <option>All Cities</option> <option>New York</option> <option>Los Angeles</option>
                            </select>
                        </div>
                        <div>
                            <label for="all-categories" class="block text-xs font-medium text-gray-600 mb-1">All Categories</label>
                            <select id="all-categories" class="w-full p-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-south-brown focus:border-transparent text-gray-700 bg-white text-sm">
                                <option>All Categories</option> <option>Apartment</option> <option>House</option>
                            </select>
                        </div>
                        <div>
                            <label for="all-offers" class="block text-xs font-medium text-gray-600 mb-1">All Offers</label>
                            <select id="all-offers" class="w-full p-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-south-brown focus:border-transparent text-gray-700 bg-white text-sm">
                                <option>All Offers</option> <option>For Sale</option> <option>For Rent</option>
                            </select>
                        </div>
                        <!-- Simplified for brevity, original structure maintained -->
                        <div class="sm:col-span-2 lg:col-span-1">
                            <label class="block text-xs font-medium text-gray-600 mb-1">Price Range</label>
                            <div class="flex space-x-2">
                                <input type="number" placeholder="Min $" class="w-1/2 p-2.5 border border-gray-300 rounded-md text-sm">
                                <input type="number" placeholder="Max $" class="w-1/2 p-2.5 border border-gray-300 rounded-md text-sm">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-600 mb-1">Bedrooms</label>
                            <select class="w-full p-2.5 border border-gray-300 rounded-md text-sm bg-white">
                                <option>Any</option> <option>1</option> <option>2</option> <option>3+</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-600 mb-1">Bathrooms</label>
                            <select class="w-full p-2.5 border border-gray-300 rounded-md text-sm bg-white">
                                <option>Any</option> <option>1</option> <option>2</option> <option>3+</option>
                            </select>
                        </div>
                        <div class="sm:col-span-2 lg:col-span-1">
                             <label class="block text-xs font-medium text-gray-600 mb-1">Area (sq ft)</label>
                            <div class="flex space-x-2">
                                <input type="number" placeholder="Min" class="w-1/2 p-2.5 border border-gray-300 rounded-md text-sm">
                                <input type="number" placeholder="Max" class="w-1/2 p-2.5 border border-gray-300 rounded-md text-sm">
                            </div>
                        </div>
                        <div class="col-span-1 sm:col-span-2 lg:col-span-4 flex flex-col sm:flex-row justify-between items-center gap-4 pt-3">
                            <a href="#" class="text-xs text-south-brown hover:underline">+ Advanced Filters</a>
                            <button type="submit" class="w-full sm:w-auto bg-south-brown hover:bg-opacity-90 text-white font-semibold py-2.5 px-8 rounded-md transition duration-150 uppercase tracking-wider text-sm">
                                Search
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- 4. Main Property Content Section - Refined -->
        <section class="py-12 md:py-16 bg-white">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 md:gap-12">

                    <!-- Left Column: Property Details -->
                    <div class="lg:col-span-2">
                        <!-- Property Image Gallery (New) -->
                        <div class="mb-8">
                            <div class="mb-4 overflow-hidden rounded-lg shadow-lg">
                                <img :src="selectedImage || house?.main_image_url || 'https://themewagon.github.io/south/img/bg-img/sp1.jpg'"
                                     alt="Main Property Image"
                                     class="w-full h-auto max-h-[500px] object-cover transition-transform duration-300 ease-in-out hover:scale-105">
                            </div>
                            <div v-if="galleryImages && galleryImages.length > 1" class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 gap-3">
                                <div v-for="(image, index) in galleryImages" :key="index"
                                     @click="selectedImage = image.url"
                                     class="cursor-pointer rounded overflow-hidden border-2 hover:border-south-brown transition-all"
                                     :class="selectedImage === image.url ? 'border-south-brown ring-2 ring-south-brown ring-offset-1' : 'border-transparent'">
                                    <img :src="image.url" alt="Property thumbnail" class="w-full h-24 object-cover">
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 pb-6 border-b border-gray-200">
                            <div>
                                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-1">{{ house?.title || 'Beautiful Property Title' }}</h2>
                                <p class="text-gray-500 flex items-center text-sm mb-2 sm:mb-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 mr-1.5 text-gray-400 flex-shrink-0"> <path fill-rule="evenodd" d="M9.69 18.933l.003.001C9.89 19.02 10 19 10 19s.11.02.308-.066l.002-.001.006-.003.018-.008a5.741 5.741 0 00.281-.145l.005-.002.007-.004.011-.007a48.45 48.45 0 002.406-1.916l.003-.002c1.604-1.41 3.096-3.076 3.999-4.817.888-1.707 1.261-3.49 1.261-5.224C18 5.48 14.433 2 10 2S2 5.48 2 9.755c0 1.734.373 3.517 1.261 5.224.903 1.74 2.395 3.406 3.999 4.817l.003.002a48.445 48.445 0 002.406 1.916l.011.007.007.004.005.002a5.74 5.74 0 00.28.145l.019.008.006.003zM10 11.75a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" /> </svg>
                                    {{ house?.address || '123 Main St, Anytown, USA' }}
                                </p>
                            </div>
                            <div class="text-left sm:text-right mt-3 sm:mt-0">
                                <p class="text-3xl font-extrabold text-south-brown">{{ house?.formatted_price || '$945,679' }}</p>
                                <span v-if="house?.status === 'For Sale'" class="text-xs bg-green-100 text-green-700 px-2 py-0.5 rounded-full font-medium">For Sale</span>
                                <span v-if="house?.status === 'For Rent'" class="text-xs bg-blue-100 text-blue-700 px-2 py-0.5 rounded-full font-medium">For Rent</span>
                            </div>
                        </div>

                        <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed mb-8">
                            <h3 class="text-xl font-semibold text-gray-800 !mb-3">Property Description</h3>
                            <p>{{ house?.descriptions || 'Detailed description of the property...' }}</p>
                            <!-- Add more paragraphs if description is long -->
                        </div>

                        <!-- Property Stats Bar - Refined -->
                        <div class="bg-gray-50 p-4 rounded-lg my-8 flex flex-wrap justify-around items-center text-sm text-gray-700 gap-x-6 gap-y-3 shadow">
                            <span v-if="house?.is_new" class="inline-flex items-center bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full font-semibold text-xs">
                                <svg class="w-3.5 h-3.5 mr-1.5 text-yellow-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                NEW
                            </span>
                            <span class="flex items-center" title="Property Type">
                                <svg class="w-5 h-5 mr-1.5 text-south-brown" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                                {{ house?.type || 'House' }}
                            </span>
                            <span class="flex items-center" title="Bedrooms">
                                <svg class="w-5 h-5 mr-1.5 text-south-brown" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9.5A18.03 18.03 0 019 14.052V21M9 3a9 9 0 0110.952 8.574M15.088 9A17.903 17.903 0 0112 14.052V21m-8.952-12A9 9 0 0112 3v2.553m0 0A17.918 17.918 0 0118.952 8.5H12m0-3.048V2.952c2.733.003 5.238.74 7.4 2.05M6.599 5.5A17.927 17.927 0 0112 2.952V5.5m-5.401 0A17.903 17.903 0 0112 14.052V5.5m0 0H6.599M3.048 8.5A9 9 0 0112 18V5.5m8.952 3.0A9 9 0 0112 18V5.5"></path></svg> <!-- Bed icon -->
                                {{ house?.bedrooms || 2 }} Bed
                            </span>
                            <span class="flex items-center" title="Bathrooms">
                                <svg class="w-5 h-5 mr-1.5 text-south-brown" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg> <!-- Bath icon -->
                                {{ house?.bathrooms || 2 }} Bath
                            </span>
                            <span class="flex items-center" title="Area">
                                <svg class="w-5 h-5 mr-1.5 text-south-brown" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path></svg> <!-- Area icon -->
                                {{ house?.size || 120 }} sq ft
                            </span>
                        </div>

                        <div class="mb-10">
                            <h3 class="text-xl font-semibold text-gray-800 mb-5">Additional Amenities</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-6 gap-y-4 text-gray-700 text-sm">
                                <div v-for="feature in (house?.features || defaultFeatures)" :key="feature" class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 mr-2.5 text-green-500 flex-shrink-0">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                                    </svg>
                                    <span>{{ feature.name }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-4 mt-10 border-t border-gray-200 pt-8">
                            <button class="w-full sm:w-auto bg-south-brown hover:bg-opacity-90 text-white font-semibold py-3 px-8 rounded-md transition duration-150 uppercase tracking-wider text-sm shadow hover:shadow-lg">
                                View Floor Plans
                            </button>
                            <button class="w-full sm:w-auto bg-south-dark hover:bg-gray-700 text-white font-semibold py-3 px-8 rounded-md transition duration-150 uppercase tracking-wider text-sm shadow hover:shadow-lg">
                                Mortgage Calculator
                            </button>
                        </div>
                    </div>

                    <!-- Right Column: Sidebar with Agent Contact - Refined -->
                    <div class="lg:col-span-1">
                        <div class="bg-gray-50 p-6 md:p-8 rounded-lg shadow-lg sticky top-28">
                            <div class="text-center mb-6">
                                <img :src="house?.realtor?.image_url || 'https://cdn3.iconfinder.com/data/icons/business-avatar-1/512/3_avatar-512.png'"
                                     :alt="house?.realtor?.name || 'Jeremy Scott'"
                                     class="w-32 h-32 rounded-full mx-auto mb-4 object-cover border-4 border-white shadow-xl">
                                <h4 class="text-xl font-bold text-gray-800">{{ house?.realtor?.name || 'Jeremy Scott' }}</h4>
                                <p class="text-sm text-gray-500 mb-3">{{ house?.agent?.title || 'Lead Realtor' }}</p>
                                <p class="text-sm text-gray-700 flex items-center justify-center mb-1">
                                    <svg class="w-4 h-4 mr-1.5 text-south-brown" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path></svg>
                                    {{ house?.realtor?.phone || '+45 677 8993000 223' }}
                                </p>
                                <p class="text-sm text-gray-700 flex items-center justify-center">
                                    <svg class="w-4 h-4 mr-1.5 text-south-brown" fill="currentColor" viewBox="0 0 20 20"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                                    {{ house?.realtor?.email || 'office@template.com' }}
                                </p>
                            </div>

                            <form @submit.prevent="submitAgentContactForm">
                                <div class="space-y-4">
                                    <h5 class="text-lg font-semibold text-gray-700 text-center border-b pb-2 mb-4">Contact Agent</h5>
                                    <div>
                                        <label for="agent-name" class="sr-only">Your Name</label>
                                        <input v-model="agentContactForm.name" type="text" id="agent-name" placeholder="Your Name" required
                                               class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-south-brown focus:border-transparent text-gray-700 bg-white text-sm shadow-sm">
                                    </div>
                                    <div>
                                        <label for="agent-email" class="sr-only">Your Email</label>
                                        <input v-model="agentContactForm.email" type="email" id="agent-email" placeholder="Your Email" required
                                               class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-south-brown focus:border-transparent text-gray-700 bg-white text-sm shadow-sm">
                                    </div>
                                    <div>
                                        <label for="agent-message" class="sr-only">Your Message</label>
                                        <textarea v-model="agentContactForm.message" id="agent-message" rows="4" placeholder="I'm interested in this property..." required
                                                  class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-south-brown focus:border-transparent text-gray-700 bg-white text-sm shadow-sm"></textarea>
                                    </div>
                                    <div>
                                        <button type="submit" class="w-full bg-south-brown hover:bg-opacity-90 text-white font-semibold py-3 px-6 rounded-md transition duration-150 uppercase tracking-wider text-sm shadow hover:shadow-lg">
                                            Send Message
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5. Map Sample Section - (Unchanged from your latest version, looks good) -->
        <!-- 5. Map Sample Section -->
        <section class="py-12 md:py-16 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center mb-8 md:mb-12">
                    <h3 class="text-2xl md:text-3xl font-bold text-gray-800">Location Map</h3>
                    <p class="text-gray-500 mt-1">Find the property on the map below.</p>
                </div>
                <div class="aspect-w-16 aspect-h-9 rounded-lg overflow-hidden shadow-xl border border-gray-200">
                    <iframe
                        :src="mapEmbedUrl" 
                        width="100%"
                        height="100%"
                        style="border:0; height: 400px;"
                        allowfullscreen="true"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </section>

    </FrontLayout>
</template>
<script lang="ts" setup>
import { ref, computed, onMounted } from 'vue';
import FrontLayout from '@/front/AppLayout.vue'; // Assuming this is correctly pathed

// Define a more specific type for the 'house' prop for better type safety and DX
interface Agent {
  name?: string;
  title?: string;
  image_url?: string;
  phone?: string;
  email?: string;
}

interface House {
  title?: string;
  address?: string;
  main_image_url?: string;
  formatted_price?: string;
  status?: 'For Sale' | 'For Rent' | string; // Allow specific statuses or a generic string
  is_new?: boolean;
  type?: string;
  bedrooms?: number;
  bathrooms?: number;
  area_sqft?: number;
  description?: string;
  features?: string[];
  agent?: Agent;
}

const props = defineProps<{
  house: House | null | undefined; // Allow house to be potentially null or undefined initially
  galleryImages: Array<{ url: string; alt?: string }>;
}>();

// For Image Gallery
const selectedImage = ref<string | null>(null);

// For Agent Contact Form
const agentContactForm = ref({
  name: '',
  email: '',
  message: ''
});

// Fallback for amenities if house.features is not available
const defaultFeatures = ref([
    "Gated Community", "Automatic Sprinklers", "Fireplace",
    "Window Shutters", "Ocean Views", "Heated Floors",
    "Private Patio", "Beach Access", "Rooftop Terrace"
]);

// Computed property for the dynamic map URL
const mapEmbedUrl = computed(() => {
  if (props.house?.address) {
    const encodedAddress = encodeURIComponent(props.house.address);
    return `https://maps.google.com/maps?q=${encodedAddress}&t=&z=15&ie=UTF8&iwloc=&output=embed`;
  }
  // Fallback URL if no address is provided (or show nothing, or an error message)
  // You might want to make this a more generic location or an empty string to hide the map
  return 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322829!2d106.8271527143903!3d-6.194420195512993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f4245c78a629%3A0x751c21c099f08f7a!2sMonas%2C%20Central%20Jakarta%2C%20Jakarta%2C%20Indonesia!5e0!3m2!1sen!2sid!4v1621904921439!5m2!1sen!2sid';
});

onMounted(() => {
  // Initialize selectedImage for the gallery
  if (props.house?.main_image_url) {
    selectedImage.value = props.house.main_image_url;
  } else if (props.galleryImages && props.galleryImages.length > 0) {
    selectedImage.value = props.galleryImages[0].url;
  }

  // Any other onMounted logic specific to this component can go here.
  // Script loading for Google Maps JS API is generally not needed for iframe embeds.
});

const submitAgentContactForm = () => {
  console.log('Agent Contact Form submitted:', agentContactForm.value);
  // TODO: Implement actual form submission logic (e.g., API call to your backend)
  // Example:
  // try {
  //   const response = await fetch('/api/contact-agent', {
  //     method: 'POST',
  //     headers: { 'Content-Type': 'application/json' },
  //     body: JSON.stringify(agentContactForm.value)
  //   });
  //   if (response.ok) {
  //     alert('Message sent successfully!');
  //     agentContactForm.value = { name: '', email: '', message: '' }; // Reset form
  //   } else {
  //     alert('Failed to send message. Please try again.');
  //   }
  // } catch (error) {
  //   console.error('Error submitting agent contact form:', error);
  //   alert('An error occurred. Please try again.');
  // }
  alert('Message sent to agent (simulated)!');
  agentContactForm.value = { name: '', email: '', message: '' }; // Reset form
};

</script>