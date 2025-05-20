<!-- HeroCarousel.vue -->
<template>
  <Carousel :autoplay="5000" :wrap-around="true" :transition="500" class="hero-carousel-container">
    <Slide v-for="slide in slides" :key="slide.id">
      <div
        class="carousel__item hero-slide-item bg-cover bg-center h-[500px] md:h-[600px] lg:h-[700px] w-full relative flex items-center justify-center"
        :style="{ backgroundImage: `url(${slide.imageUrl})` }"
      >
        <div class="relative z-10 text-center p-6 find-home-text-bg">
          <h1 class="text-white text-4xl sm:text-5xl md:text-6xl font-bold uppercase tracking-wider">
            {{ slide.title }}
          </h1>
        </div>
      </div>
    </Slide>

    <template #addons>
      <Navigation />
      <Pagination />
    </template>
  </Carousel>
</template>

<script setup>
import { ref } from 'vue';
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';
import 'vue3-carousel/dist/carousel.css'; // Import carousel styles

// Define your slides data
const slides = ref([
  {
    id: 1,
    title: 'Find Your Dream Home',
    // Replace with your actual image URLs
    imageUrl: 'https://images.unsplash.com/photo-1580587771525-78b9dba3b914?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1974&q=80',
  },
  {
    id: 2,
    title: 'Luxury Living Awaits',
    imageUrl: 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1973&q=80',
  },
  {
    id: 3,
    title: 'Explore New Neighborhoods',
    imageUrl: 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
  },
  {
    id: 4,
    title: 'Invest In Your Future',
    imageUrl: 'https://images.unsplash.com/photo-1448630360428-65456885c650?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2067&q=80',
  }
]);
</script>

<style scoped>
/* This class was on your original section, but now each slide item needs these properties */
.hero-slide-item {
  /* Ensure Tailwind's bg-cover and bg-center are applied correctly */
}

/* Your original text background style */
.find-home-text-bg {
  background-color: rgba(0, 0, 0, 0.5); /* Example: semi-transparent black */
  border-radius: 8px; /* Optional: for rounded corners */
}

/* Customizing vue3-carousel navigation and pagination (optional) */
.hero-carousel-container :deep(.carousel__prev),
.hero-carousel-container :deep(.carousel__next) {
  background-color: rgba(255, 255, 255, 0.7);
  border-radius: 50%;
  width: 48px; /* Tailwind: w-12 */
  height: 48px; /* Tailwind: h-12 */
  color: #333;
  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.hero-carousel-container :deep(.carousel__prev):hover,
.hero-carousel-container :deep(.carousel__next):hover {
  background-color: white;
  color: #000;
}

.hero-carousel-container :deep(.carousel__prev) {
  left: 20px; /* Adjust as needed */
}

.hero-carousel-container :deep(.carousel__next) {
  right: 20px; /* Adjust as needed */
}

.hero-carousel-container :deep(.carousel__icon) {
  width: 24px; /* Tailwind: w-6 */
  height: 24px; /* Tailwind: h-6 */
}

.hero-carousel-container :deep(.carousel__pagination-button) {
  background-color: rgba(255, 255, 255, 0.5);
  width: 12px; /* Tailwind: w-3 */
  height: 12px; /* Tailwind: h-3 */
  border-radius: 50%;
  margin: 0 5px; /* Tailwind: mx-1-ish */
}

.hero-carousel-container :deep(.carousel__pagination-button--active) {
  background-color: white;
  transform: scale(1.2);
}

.hero-carousel-container :deep(.carousel__pagination) {
  position: absolute;
  bottom: 20px; /* Adjust as needed */
  left: 50%;
  transform: translateX(-50%);
}
</style>