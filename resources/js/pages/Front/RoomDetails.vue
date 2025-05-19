<template>
    <FrontLayout>


    <section class="listings-content-wrapper section-padding-100">
        <div class="container">
            <div class="row mt-5">
                <div class="col-12 mt-5">
                    <!-- Single Listings Slides -->
                <div class="single-listings-sliders owl-carousel">
                    <div v-for="(image, index) in galleryImages" :key="index">
                    <img :src="image.url" :alt="image.name">
                    </div>
                </div>

                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="listings-content">
                        <!-- Price -->
                        <div class="list-price">
                            <p>{{ house.price.toFixed(2) }}</p>
                        </div>
                        <h5>{{ house.title }}</h5>
                        <p class="location"><img :src="'/temp/img/icons/location.png'"  alt="">{{ house.address }}</p>
                        <p>{{ house.description }}</p>
                        <!-- Meta -->
                        <div class="property-meta-data d-flex align-items-end">
                            <div class="new-tag">
                                <img src="/temp/img/icons/new.png" alt="">
                            </div>
                            <div class="bathroom">
                                <img src="/temp/img/icons/bathtub.png" alt="">
                                <span>{{ house.bathroom }}</span>
                            </div>
                            <div class="garage">
                                <img src="/temp/img/icons/garage.png" alt="">
                                <span>{{ house.bedroom }}</span>
                            </div>
                            <div class="space">
                                <img src="/temp/img/icons/space.png" alt="">
                                <span>{{ house.size }} sq ft</span>
                            </div>
                        </div>
                        <!-- Core Features -->
                        <ul class="listings-core-features d-flex align-items-center">
                            <li><i class="fa fa-check" aria-hidden="true"></i> Gated Community</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Automatic Sprinklers</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Fireplace</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Window Shutters</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Ocean Views</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Heated Floors</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Heated Floors</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Private Patio</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Window Shutters</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Fireplace</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Beach Access</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Rooftop Terrace</li>
                        </ul>
                        <!-- Listings Btn Groups -->
                        <div class="listings-btn-groups">
                            <a href="#" class="btn south-btn">See Floor plans</a>
                            <a href="#" class="btn south-btn active">calculate mortgage</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="contact-realtor-wrapper">
                        <div class="realtor-info">
                            <img src="/temp/img/bg-img/listing.jpg" alt="">
                            <div class="realtor---info">
                                <h2>{{ house.realtor.name }}</h2>
                                <p>Realtor</p>
                                <h6><img src="/temp/img/icons/phone-call.png" alt=""> {{ house.realtor.phone }}</h6>
                                <h6><img src="/temp/img/icons/envelope.png" alt=""> {{ house.realtor.email }}</h6>
                            </div>
                           <div class="realtor--contact-form max-w-lg mx-auto p-4 shadow rounded-lg bg-white">
                            <div v-if="step === 1" class="mb-6">
                                <h2 class="text-xl font-semibold mb-4">Step 1: Select a Date</h2>

                                <!-- ✅ Inline Calendar -->
                                <Datepicker
                                v-model="form.date"
                                :inline="true"
                                />

                                <button @click="nextStep" class="btn south-btn mt-4">Next</button>
                            </div>


                            <div v-else-if="step === 2">
                            <h2 class="text-xl font-semibold mb-4">Step 2: Fill in Your Info</h2>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" v-model="form.name" placeholder="Your Name" />
                            </div>
                            <div class="form-group mb-3">
                                <input type="number" class="form-control" v-model="form.number" placeholder="Your Number" />
                            </div>
                            <div class="form-group mb-3">
                                <input type="email" class="form-control" v-model="form.email" placeholder="Your Email" />
                            </div>
                            <div class="form-group mb-3">
                                <textarea class="form-control" v-model="form.message" rows="4" placeholder="Your Message"></textarea>
                            </div>
                            <div class="flex justify-between">
                                <button @click="prevStep" class="btn south-btn">Back</button>
                                <button @click="nextStep" :disabled="!isFormValid" class="btn south-btn">Next</button>
                            </div>
                            </div>

                            <div v-else-if="step === 3">
                            <h2 class="text-xl font-semibold mb-4">Step 3: Review & Confirm</h2>
                            <ul class="mb-4 space-y-2">
                                <li><strong>Date:</strong> {{ form.date }}</li>
                                <li><strong>Name:</strong> {{ form.name }}</li>
                                <li><strong>Number:</strong> {{ form.number }}</li>
                                <li><strong>Email:</strong> {{ form.email }}</li>
                                <li><strong>Message:</strong> {{ form.message }}</li>
                            </ul>
                            <div class="flex justify-between">
                                <button @click="prevStep" class="btn south-btn">Back</button>
                                <button @click="submitForm" class="btn south-btn">Confirm</button>
                            </div>
                            </div>

                            <div v-else-if="step === 4">
                            <h2 class="text-xl font-semibold mb-4 text-green-600">Success!</h2>
                            <p>Your message has been sent.</p>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Listing Maps -->
            <div class="row">
                <div class="col-12">
                    <div class="listings-maps mt-100">
                        <div id="googleMap"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    </FrontLayout>
</template>
<script lang="ts" setup>
import { ref, computed, onMounted } from 'vue';
import Datepicker from 'vue3-datepicker'; // ✅ using the correct component
import FrontLayout from '@/front/AppLayout.vue';

defineProps<{
  house: any;
  galleryImages: Array<any>;
}>();

const step = ref(1);
const form = ref({
  date: new Date(),
  name: '',
  number: '',
  email: '',
  message: ''
});

const isFormValid = computed(() => {
  return (
    form.value.name.trim() !== '' &&
    form.value.number.toString().trim() !== '' &&
    form.value.email.trim() !== '' &&
    form.value.message.trim() !== ''
  );
});

const nextStep = () => {
  if (step.value < 4) step.value++;
};

const prevStep = () => {
  if (step.value > 1) step.value--;
};

const submitForm = () => {
  console.log('Form submitted:', form.value);
  step.value = 4;
};

const loadScript = (src: string): Promise<void> => {
  return new Promise((resolve, reject) => {
    if (document.querySelector(`script[src="${src}"]`)) {
      resolve();
      return;
    }

    const script = document.createElement('script');
    script.src = src;
    script.async = true;
    script.onload = () => resolve();
    script.onerror = () => reject(new Error(`Failed to load ${src}`));
    document.body.appendChild(script);
  });
};

onMounted(async () => {
  try {
    await loadScript('https://maps.googleapis.com/maps/api/js?key=AIzaSyAwuyLRa1uKNtbgx6xAJVmWy-zADgegA2s');
    await loadScript('/js/map-active.js');
  } catch (error) {
    console.error('Error loading scripts:', error);
  }
});
</script>


