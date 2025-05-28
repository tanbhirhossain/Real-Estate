<template>
    <AppLayout>
        <!-- Contact Page Content Section - Modernized -->
        <section class="py-16 md:py-24 bg-gray-50">
            <div class="container mx-auto px-4">

                <div class="text-center mb-12 md:mb-20">
                    <span class="text-sm font-semibold text-south-brown uppercase tracking-wider">Get in Touch</span>
                    <h1 class="mt-2 text-4xl md:text-5xl font-extrabold text-gray-900 tracking-tight">
                        Contact Our Team
                    </h1>
                    <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-600">
                        We're here to help and answer any question you might have. We look forward to hearing from you.
                    </p>
                </div>

                <div class="max-w-6xl mx-auto lg:grid lg:grid-cols-12 lg:gap-x-16">
                    <!-- Left Column: Contact Info - Modernized -->
                    <div class="lg:col-span-5 mb-12 lg:mb-0">
                        <div class="bg-white p-8 rounded-xl shadow-lg h-full flex flex-col">
                            <h2 class="text-2xl font-semibold text-gray-800 mb-6">
                                Office Information
                            </h2>

                            <div class="space-y-6 text-gray-700 flex-grow">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <div class="flex items-center justify-center h-10 w-10 rounded-lg bg-south-brown/10 text-south-brown">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-base font-medium text-gray-900">Our Address</p>
                                        <p class="mt-1 text-sm text-gray-600">
                                            Main Str. no 45-46, b3, 56832,<br>
                                            Los Angeles, CA, USA
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <div class="flex items-center justify-center h-10 w-10 rounded-lg bg-south-brown/10 text-south-brown">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.308 1.154a11.06 11.06 0 006.086 6.086l1.154-2.308a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-base font-medium text-gray-900">Call Us</p>
                                        <a href="tel:+456778993000223" class="mt-1 text-sm text-gray-600 hover:text-south-brown transition-colors">+45 677 8993000 223</a>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <div class="flex items-center justify-center h-10 w-10 rounded-lg bg-south-brown/10 text-south-brown">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-base font-medium text-gray-900">Email Us</p>
                                        <a href="mailto:office@mohona.com" class="mt-1 text-sm text-gray-600 hover:text-south-brown transition-colors">office@mohona.com</a>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-10 pt-6 border-t border-gray-200">
                                <h3 class="text-lg font-medium text-gray-900 mb-3">Business Hours</h3>
                                <div class="space-y-2 text-sm text-gray-600">
                                    <div class="flex justify-between">
                                        <span>Monday - Friday:</span>
                                        <span class="font-medium text-gray-700">09:00 AM - 07:00 PM</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span>Saturday:</span>
                                        <span class="font-medium text-gray-700">09:00 AM - 02:00 PM</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span>Sunday:</span>
                                        <span class="font-medium text-gray-500">Closed</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Contact Form - Modernized -->
                    <div class="lg:col-span-7">
                        <div class="bg-white p-8 sm:p-10 rounded-xl shadow-lg">
                            <h2 class="text-2xl font-semibold text-gray-800 mb-1 text-center sm:text-left">
                                Send Us a Message
                            </h2>
                            <p class="text-gray-500 mb-8 text-sm text-center sm:text-left">Fill out the form below and we'll get back to you shortly.</p>

                            <form @submit.prevent="submitContactForm"  class="space-y-6"> <!-- Changed method name -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                    <div>
                                        <label for="contact-name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                                        <input v-model="contactForm.name"  type="text" name="name" id="contact-name" placeholder="e.g. John Doe" required
                                               class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-south-brown focus:border-south-brown text-gray-900 placeholder-gray-400 text-sm shadow-sm transition-colors">
                                    </div>
                                    <div>
                                        <label for="contact-email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                                        <input v-model="contactForm.email"  type="email" name="email" id="contact-email" placeholder="you@example.com" required
                                               class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-south-brown focus:border-south-brown text-gray-900 placeholder-gray-400 text-sm shadow-sm transition-colors">
                                    </div>
                                </div>
                                <div>
                                    <label for="contact-phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number <span class="text-gray-400 text-xs">(Optional)</span></label>
                                    <input v-model="contactForm.phone"  type="tel" name="phone" id="contact-phone" placeholder="(123) 456-7890"
                                           class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-south-brown focus:border-south-brown text-gray-900 placeholder-gray-400 text-sm shadow-sm transition-colors">
                                </div>
                                <div>
                                    <label for="contact-message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                                    <textarea v-model="contactForm.message"  name="message" id="contact-message" rows="5" placeholder="How can we help you today?" required
                                              class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-south-brown focus:border-south-brown text-gray-900 placeholder-gray-400 text-sm shadow-sm transition-colors resize-none"></textarea>
                                </div>
                                <div class="pt-2 text-right">
                                    <button type="submit"
                                            class="inline-flex items-center justify-center bg-south-brown hover:bg-opacity-90 text-white font-semibold py-3 px-8 rounded-lg transition-all duration-150 uppercase tracking-wider text-sm shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-south-brown focus:ring-offset-2 active:scale-95">
                                        Send Message
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                          <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Location Map Section - Added Below -->
        <section class="pb-16 md:pb-24 bg-gray-50 -mt-8 md:-mt-12"> <!-- Continue light gray bg, adjust top margin -->
            <div class="container mx-auto px-4">
                <div class="max-w-6xl mx-auto bg-white p-4 sm:p-6 rounded-xl shadow-lg">
                     <div class="aspect-w-16 aspect-h-9 rounded-lg overflow-hidden border border-gray-200">
                        <iframe
                            :src="officeLocationMapUrl"
                            width="100%"
                            height="500px"
                            style="border:0;"
                            allowfullscreen="true"
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </section>

    </AppLayout>
</template>

<script lang="ts" setup>
    import { ref, computed } from 'vue';
    import AppLayout from '@/front/AppLayout.vue'; // Ensure this path is correct for your project

    const contactForm = ref({
        name: '',
        email: '',
        phone: '',
        message: ''
    });

    const submitContactForm = () =>{
        console.log('Contact Form submitted', contactForm.value);

        alert('Message sent (simulated)');
    };
    
    // For the Office Location Map
    // You can make this dynamic if your office address comes from a prop or API
    const officeAddress = "Main Str. no 45-46, b3, 56832, Los Angeles, CA, USA"; // Example Address
    const officeLocationMapUrl = computed(() => {
      if (officeAddress) {
        const encodedAddress = encodeURIComponent(officeAddress);
        return `https://maps.google.com/maps?q=${encodedAddress}&t=&z=15&ie=UTF8&iwloc=&output=embed`;
      }
      // Fallback if no address (though it's hardcoded here for simplicity)
      return 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322829!2d106.8271527143903!3d-6.194420195512993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f4245c78a629%3A0x751c21c099f08f7a!2sMonas%2C%20Central%20Jakarta%2C%20Jakarta%2C%20Indonesia!5e0!3m2!1sen!2sid!4v1621904921439!5m2!1sen!2sid';
    });

</script>