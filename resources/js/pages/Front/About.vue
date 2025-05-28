<template>
    <AppLayout>
        <!-- About Us Page Content Section -->

        <!-- 1. Hero Section -->
        <section class="relative bg-gray-800 py-20 md:py-32 text-white overflow-hidden">
            <div class="absolute inset-0">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80"
                     alt="Our Team Working"
                     class="w-full h-full object-cover opacity-30">
            </div>
            <div class="container mx-auto px-4 relative z-10 text-center">
                <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight leading-tight">
                    About <span class="text-Mohona-brown">Mohona</span> Real Estate
                </h1>
                <p class="mt-6 max-w-3xl mx-auto text-lg md:text-xl text-gray-300">
                    Discover our journey, our values, and the dedicated team committed to finding your perfect property and providing exceptional real estate services.
                </p>
            </div>
        </section>

        <!-- 2. Our Story / Mission Section -->
        <section class="py-16 md:py-24 bg-white">
            <div class="container mx-auto px-4">
                <div class="lg:grid lg:grid-cols-2 lg:gap-x-16 lg:items-center">
                    <div class="mb-10 lg:mb-0">
                        <span class="text-sm font-semibold text-Mohona-brown uppercase tracking-wider">Our Journey</span>
                        <h2 class="mt-2 text-3xl md:text-4xl font-bold text-gray-900 tracking-tight">
                            Crafting Exceptional Real Estate Experiences Since 2010
                        </h2>
                        <p class="mt-6 text-gray-600 leading-relaxed">
                            Founded with a passion for connecting people with their dream properties, Mohona Real Estate has grown from a small local agency into a trusted name in the market. Our mission is to provide unparalleled service, expert advice, and a seamless transaction process for every client. We believe that finding a home is more than just a transaction; it's about finding a place where life unfolds.
                        </p>
                        <p class="mt-4 text-gray-600 leading-relaxed">
                            We've weathered market changes, embraced new technologies, and consistently put our clients' needs first. Our commitment to integrity, transparency, and community has been the cornerstone of our success.
                        </p>
                        <div class="mt-8">
                            <a href="/contact"
                               class="inline-flex items-center justify-center bg-Mohona-brown hover:bg-opacity-90 text-white font-semibold py-3 px-8 rounded-lg transition-all duration-150 text-sm shadow hover:shadow-lg active:scale-95">
                                Learn More About Our Services
                            </a>
                        </div>
                    </div>
                    <div class="aspect-w-5 aspect-h-4 md:aspect-w-4 md:aspect-h-3 lg:aspect-w-16 lg:aspect-h-12 rounded-xl overflow-hidden shadow-2xl">
                        <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1932&q=80"
                             alt="Modern Office Interior"
                             class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </section>

        <!-- 3. Our Core Values Section -->
        <section class="py-16 md:py-24 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12 md:mb-16">
                    <span class="text-sm font-semibold text-Mohona-brown uppercase tracking-wider">What We Stand For</span>
                    <h2 class="mt-2 text-3xl md:text-4xl font-bold text-gray-900 tracking-tight">
                        Our Core Values
                    </h2>
                    <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-600">
                        These principles guide every decision we make and every interaction we have.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Value Card 1 -->
                    <div class="bg-white p-8 rounded-xl shadow-lg transform hover:scale-105 transition-transform duration-300">
                        <div class="flex items-center justify-center h-12 w-12 rounded-full bg-Mohona-brown/10 text-Mohona-brown mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Integrity First</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            We conduct our business with the highest ethical standards, ensuring transparency and honesty in all our dealings.
                        </p>
                    </div>
                    <!-- Value Card 2 -->
                    <div class="bg-white p-8 rounded-xl shadow-lg transform hover:scale-105 transition-transform duration-300">
                        <div class="flex items-center justify-center h-12 w-12 rounded-full bg-Mohona-brown/10 text-Mohona-brown mb-6">
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Client-Centric</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Our clients are at the heart of everything we do. We strive to exceed expectations and build lasting relationships.
                        </p>
                    </div>
                    <!-- Value Card 3 -->
                    <div class="bg-white p-8 rounded-xl shadow-lg transform hover:scale-105 transition-transform duration-300">
                        <div class="flex items-center justify-center h-12 w-12 rounded-full bg-Mohona-brown/10 text-Mohona-brown mb-6">
                           <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Expertise & Innovation</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            We continuously enhance our knowledge and leverage cutting-edge technology to provide the best possible outcomes.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. Meet Our Team Section (Optional, but good for personalization) -->
        <section class="py-16 md:py-24 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12 md:mb-16">
                    <span class="text-sm font-semibold text-Mohona-brown uppercase tracking-wider">Our Professionals</span>
                    <h2 class="mt-2 text-3xl md:text-4xl font-bold text-gray-900 tracking-tight">
                        Meet The Dedicated Team
                    </h2>
                    <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-600">
                        The passionate individuals driving our success and your satisfaction.
                    </p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    <!-- Team Member Card (Repeat as needed) -->
                    <div v-for="member in teamMembers" :key="member.name" class="text-center bg-gray-50 p-6 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300">
                        <img :src="member.imageUrl" :alt="member.name" class="w-32 h-32 rounded-full mx-auto mb-5 object-cover border-4 border-white ring-2 ring-Mohona-brown/50">
                        <h3 class="text-lg font-semibold text-gray-900">{{ member.name }}</h3>
                        <p class="text-sm text-Mohona-brown font-medium">{{ member.title }}</p>
                        <p class="mt-2 text-xs text-gray-500 leading-relaxed px-2">{{ member.bio }}</p>
                        <div v-if="member.socials" class="mt-4 flex justify-center space-x-3">
                            <a v-for="social in member.socials" :key="social.platform" :href="social.link" target="_blank"
                               class="text-gray-400 hover:text-Mohona-brown transition-colors">
                                <!-- Add SVG icons for LinkedIn, Twitter, etc. here -->
                                <span class="sr-only">{{ social.platform }}</span>
                                <svg v-if="social.platform === 'LinkedIn'" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                <svg v-if="social.platform === 'Twitter'" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-.422.724-.665 1.56-.665 2.452 0 1.914.973 3.608 2.459 4.599-.812-.026-1.574-.249-2.233-.616v.054c0 2.676 1.904 4.903 4.428 5.409-.462.124-.949.19-1.449.19-.356 0-.701-.034-1.038-.096.717 2.205 2.797 3.812 5.265 3.855-1.892 1.483-4.275 2.366-6.873 2.366-.446 0-.887-.026-1.321-.077 2.449 1.575 5.359 2.495 8.484 2.495 9.894 0 15.441-8.191 15.208-15.543a10.889 10.889 0 002.647-2.744z"/></svg>
                            </a>
                        </div>
                    </div>
                    <!-- ... more team members -->
                </div>
            </div>
        </section>

        <!-- 5. Call to Action Section -->
        <section class="py-16 md:py-24 bg-Mohona-brown">
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-white tracking-tight">
                    Ready to Start Your Real Estate Journey?
                </h2>
                <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-200">
                    Whether you're buying, selling, or just exploring, our team is ready to provide expert guidance.
                </p>
                <div class="mt-10">
                    <a href="/contact"
                       class="inline-block bg-white hover:bg-gray-100 text-Mohona-brown font-semibold py-3 px-10 rounded-lg transition-all duration-150 text-base shadow-lg hover:shadow-xl transform hover:scale-105">
                        Contact Us Today
                    </a>
                </div>
            </div>
        </section>

    </AppLayout>
</template>

<script lang="ts" setup>
    import { ref } from 'vue';
    import AppLayout from '@/front/AppLayout.vue'; // Ensure this path is correct for your project

    // Example team member data (in a real app, this would come from an API or props)
    const teamMembers = ref([
        {
            name: 'Alice Johnson',
            title: 'Lead Agent & Founder',
            bio: 'With over 15 years of experience, Alice leads our team with a passion for client success and market expertise.',
            imageUrl: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
            socials: [ { platform: 'LinkedIn', link: '#' }, { platform: 'Twitter', link: '#' } ]
        },
        {
            name: 'Robert Smith',
            title: 'Senior Property Consultant',
            bio: 'Robert specializes in luxury properties and investment opportunities, known for his negotiation skills.',
            imageUrl: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
            socials: [ { platform: 'LinkedIn', link: '#' } ]
        },
        {
            name: 'Maria Garcia',
            title: 'Marketing & Client Relations',
            bio: 'Maria ensures our properties are showcased beautifully and our clients receive exceptional communication.',
            imageUrl: 'https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
            socials: [ { platform: 'Twitter', link: '#' } ]
        },
        {
            name: 'David Chen',
            title: 'Commercial Real Estate Expert',
            bio: 'David brings extensive knowledge of the commercial market, helping businesses find their ideal spaces.',
            imageUrl: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
            socials: [ { platform: 'LinkedIn', link: '#' } ]
        }
    ]);
</script>