<template>
    <FrontLayout>

    <HeroArea />
    <SearchArea />

    <section class="featured-properties-area section-padding-100-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading wow fadeInUp">
                        <h2>Featured Properties</h2>
                        <p>Suspendisse dictum enim sit amet libero malesuada feugiat.</p>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Single Featured Property -->
                <a :href="`/room/${house.slug}`" v-for="(house, index) in houses" :key="house.id" class="col-12 col-md-6 col-xl-4">

                    <div  class="single-featured-property mb-50 wow fadeInUp" :data-wow-delay="(index + 1) * 100 + 'ms'">
                        <!-- Property Thumbnail -->
                        <div class="property-thumb">
                            <!-- <img src="temp/img/bg-img/feature1.jpg" alt=""> -->
                            <img :src="house.first_image_url" :alt="house.title || 'House image'">


                            <div class="tag">
                                <span>For Rent</span>
                            </div>
                            <div class="list-price">
                                <p>TK {{ house.price.toFixed(2) || 'N/A' }}</p>
                            </div>
                        </div>
                        <!-- Property Content -->
                        <div class="property-content">
                            <h5>{{ house.title }}</h5>
                            <p class="location"><img src="temp/img/icons/location.png" alt="">{{ house.address }}</p>
                            <p>{{ house.short_desc }}</p>
                            <div class="property-meta-data d-flex align-items-end justify-content-between">
                                <div class="new-tag">
                                    <img src="temp/img/icons/new.png" alt="">
                                </div>
                                <div class="bathroom">
                                    <img src="temp/img/icons/bathtub.png" alt="">
                                    <span>{{ house.bathroom }}</span>
                                </div>
                                <div class="garage">
                                    <img src="temp/img/icons/garage.png" alt="">
                                    <span>{{ house.bedroom }}</span>
                                </div>
                                <div class="space">
                                    <img src="temp/img/icons/space.png" alt="">
                                    <span>{{ house.size }} sq ft</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

          
            </div>
        </div>
    </section>

    <section class="call-to-action-area bg-fixed bg-overlay-black" style="background-image: url(img/bg-img/cta.jpg)">
        <div class="container h-100">
            <div class="row align-items-center h-100">
                <div class="col-12">
                    <div class="cta-content text-center">
                        <h2 class="wow fadeInUp" data-wow-delay="300ms">Are you looking for a place to rent?</h2>
                        <h6 class="wow fadeInUp" data-wow-delay="400ms">Suspendisse dictum enim sit amet libero malesuada feugiat.</h6>
                        <a href="#" class="btn south-btn mt-50 wow fadeInUp" data-wow-delay="500ms">Search</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <Testimonial />
 
    <section class="south-editor-area d-flex align-items-center">
        <!-- Editor Content -->
        <div class="editor-content-area">
            <!-- Section Heading -->
            <div class="section-heading wow fadeInUp" data-wow-delay="250ms">
                <img src="temp/img/icons/prize.png" alt="">
                <h2>jeremy Scott</h2>
                <p>Realtor</p>
            </div>
            <p class="wow fadeInUp" data-wow-delay="500ms">Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odiomattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna. Curabitur rhoncus auctor eleifend. Fusce venenatis diam urna, eu pharetra arcu varius ac. Etiam cursus turpis lectus, id iaculis risus tempor id. Phasellus fringilla nisl sed sem scelerisque, eget aliquam magna vehicula.</p>
            <div class="address wow fadeInUp" data-wow-delay="750ms">
                <h6><img src="temp/img/icons/phone-call.png" alt=""> +88 000000 00</h6>
                <h6><img src="temp/img/icons/envelope.png" alt=""> office@mohonabss.com</h6>
            </div>
            <div class="signature mt-50 wow fadeInUp" data-wow-delay="1000ms">
                <img src="temp/img/core-img/signature.png" alt="">
            </div>
        </div>

        <!-- Editor Thumbnail -->
        <div class="editor-thumbnail">
            <img src="temp/img/bg-img/editor.jpg" alt="">
        </div>
    </section>
   
</FrontLayout>
   
</template>

<script setup lang="ts">
    import FrontLayout from '@/front/AppLayout.vue';
    import HeroArea from '@/front/Components/HeroArea.vue';
    import SearchArea from '@/front/Components/SearchArea.vue';
    import Testimonial from '@/front/Components/Testimonial.vue';

    defineProps({
        houses: Array,
    })

</script>