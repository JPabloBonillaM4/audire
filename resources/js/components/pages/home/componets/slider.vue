<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

const currentSlide = ref(0);
let autoPlayInterval;

const slides = [
    {
        id: 'd4',
        image: '/img/dispositives/d4.png',
        title: 'SERVICIOS',
        description: 'Somos un centro de atención especializada para problemas de audición y alteraciones del equilibrio de tipo periférico como vértigo, mareo e inestabilidad',
        buttonText: 'Ver servicios',
        buttonLink: '/servicios'
    },
    {
        id: 'd3',
        image: '/img/dispositives/d3.png',
        title: 'PRODUCTOS',
        description: 'Ofrecemos soluciones auditivas de la mejor calidad con tecnología de punta y todos los avances audiologicos del mercado de la mano con el profesionalismo y experiencia que nos diferencia',
        buttonText: 'Ver productos',
        buttonLink: '/productos'
    }
];

const goToSlide = (index) => {
    currentSlide.value = index;
    resetAutoPlay();
};

const nextSlide = () => {
    currentSlide.value = (currentSlide.value + 1) % slides.length;
    resetAutoPlay();
};

const prevSlide = () => {
    currentSlide.value = (currentSlide.value - 1 + slides.length) % slides.length;
    resetAutoPlay();
};

const startAutoPlay = () => {
    autoPlayInterval = setInterval(() => {
        currentSlide.value = (currentSlide.value + 1) % slides.length;
    }, 6000);
};

const resetAutoPlay = () => {
    clearInterval(autoPlayInterval);
    startAutoPlay();
};

onMounted(() => {
    startAutoPlay();
});

onUnmounted(() => {
    clearInterval(autoPlayInterval);
});
</script>

<template>
    <div class="relative w-full h-screen overflow-hidden">
        <!-- Slides Container -->
        <div class="relative w-full h-full">
        <div
            v-for="(slide, index) in slides"
            :key="slide.id"
            :class="[
                'absolute inset-0 transition-opacity duration-1000 ease-in-out',
                index === currentSlide ? 'opacity-100 z-10' : 'opacity-0 z-0'
            ]"
        >
            <!-- Content Container -->
            <div class="relative w-full h-full flex items-center py-6 md:py-8 lg:py-0">
                <div class="container mx-auto px-4 md:px-6 lg:px-12 xl:px-16">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-24 md:gap-6 lg:gap-10 xl:gap-12 items-center">
                        <!-- Left Content -->
                        <div class="z-20 order-2 lg:order-1">
                            <!-- Title Animation -->
                            <h1
                                :class="[
                                    'text-3xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl 2xl:text-7xl font-bold mb-3 md:mb-3 lg:mb-4 xl:mb-6 transition-all duration-700 ease-out',
                                    index === currentSlide
                                        ? 'opacity-100 translate-y-0'
                                        : 'opacity-0 translate-y-8'
                                    ]"
                                :style="{ transitionDelay: index === currentSlide ? '100ms' : '0ms' }"
                            >
                                <span class="text-white">
                                    {{ slide.title }}
                                </span>
                            </h1>

                            <!-- Description Animation -->
                            <p
                                :class="[
                                    'text-sm sm:text-sm md:text-base lg:text-lg xl:text-xl text-white mb-4 md:mb-4 lg:mb-6 xl:mb-8 leading-relaxed transition-all duration-700 ease-out',
                                    index === currentSlide
                                    ? 'opacity-100 translate-y-0'
                                    : 'opacity-0 translate-y-8'
                                ]"
                                :style="{ transitionDelay: index === currentSlide ? '300ms' : '0ms' }"
                            >
                                {{ slide.description }}
                            </p>

                            <!-- Button Animation -->
                            <div
                                :class="[
                                    'transition-all duration-700 ease-out',
                                    index === currentSlide
                                    ? 'opacity-100 translate-y-0'
                                    : 'opacity-0 translate-y-8'
                                ]"
                                :style="{ transitionDelay: index === currentSlide ? '500ms' : '0ms' }"
                            >
                            <a
                                :href="slide.buttonLink"
                                class="group relative inline-flex items-center gap-1.5 md:gap-2 px-5 py-2.5 md:px-6 md:py-3 lg:px-8 lg:py-4 rounded-full font-semibold text-sm md:text-sm lg:text-base xl:text-lg transition-all duration-300 overflow-hidden"
                            >
                                <!-- Gradient Background -->
                                <span class="absolute inset-0 bg-gradient-to-r from-[#00B3A4] to-[#A4D65E]"></span>
                                <!-- Hover Effect -->
                                <span class="absolute inset-0 bg-gradient-to-r from-[#A4D65E] to-[#00B3A4] opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                                <!-- Button Text -->
                                <span class="relative text-white z-10 group-hover:translate-x-1 transition-transform duration-300">
                                    {{ slide.buttonText }}
                                </span>
                                <!-- Arrow Icon -->
                                <svg class="relative w-4 h-4 md:w-5 md:h-5 text-white z-10 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                            </div>
                        </div>
                        <!-- Right Image -->
                        <div
                            :class="[
                                'z-10 order-1 lg:order-2 flex justify-center items-center transition-all duration-1000 ease-out',
                                index === currentSlide
                                    ? 'opacity-100 scale-100 rotate-0'
                                    : 'opacity-0 scale-90 -rotate-6'
                            ]"
                            :style="{ transitionDelay: index === currentSlide ? '200ms' : '0ms' }"
                        >
                            <div class="relative w-full max-w-[200px] sm:max-w-[220px] md:max-w-[280px] lg:max-w-md xl:max-w-lg">
                                <!-- Decorative Background -->
                                <div class="absolute inset-0 bg-gradient-to-br from-[#00B3A4]/10 to-[#A4D65E]/10 rounded-full blur-2xl md:blur-3xl scale-110"></div>
                                <!-- Image -->
                                <img
                                    :src="slide.image"
                                    :alt="slide.title"
                                    class="relative w-full h-auto object-contain drop-shadow-xl md:drop-shadow-2xl"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <!-- Navigation Arrows -->
        <button
            @click="prevSlide"
            class="absolute cursor-pointer left-2 md:left-4 lg:left-8 top-1/2 -translate-y-1/2 z-30 w-10 h-10 md:w-12 md:h-12 lg:w-14 lg:h-14 rounded-full bg-white shadow-lg hover:shadow-xl text-[#00B3A4] transition-all duration-300 flex items-center justify-center"
            aria-label="Slide anterior"
        >
            <svg class="w-4 h-4 md:w-5 md:h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>

        <button
            @click="nextSlide"
            class="absolute cursor-pointer right-2 md:right-4 lg:right-8 top-1/2 -translate-y-1/2 z-30 w-10 h-10 md:w-12 md:h-12 lg:w-14 lg:h-14 rounded-full bg-white shadow-lg hover:shadow-xl text-[#00B3A4] transition-all duration-300 flex items-center justify-center"
            aria-label="Siguiente slide"
        >
            <svg class="w-4 h-4 md:w-5 md:h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>

        <!-- Dot Navigation -->
        <div class="absolute bottom-4 md:bottom-6 lg:bottom-8 left-1/2 -translate-x-1/2 z-30 flex gap-2 md:gap-3">
            <button
                v-for="(slide, index) in slides"
                :key="slide.id"
                @click="goToSlide(index)"
                :class="[
                    'transition-all duration-300 rounded-full cursor-pointer',
                    index === currentSlide
                        ? 'bg-white w-8 h-2.5 md:w-12 md:h-3'
                        : 'bg-white/50 hover:bg-white/70 w-2.5 h-2.5 md:w-3 md:h-3'
                ]"
                :aria-label="`Ir al slide ${index + 1}`"
            ></button>
        </div>
    </div>
</template>

<style scoped>
/* Smooth animation timing */
.transition-all {
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}

/* Ensure smooth rendering */
.absolute {
    backface-visibility: hidden;
    -webkit-backface-visibility: hidden;
}

/* Custom shadow for modern look */
.drop-shadow-2xl {
    filter: drop-shadow(0 25px 50px rgba(0, 0, 0, 0.15));
}
</style>