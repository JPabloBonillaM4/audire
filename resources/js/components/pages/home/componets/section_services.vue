<template>
    <section class="py-16 lg:py-16 mb-8 bg-base-100 overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="max-w-7xl mx-auto">
                <!-- Header Section -->
                <div ref="headerRef" class="text-center mb-12 transition-all duration-700 ease-out" :class="{ 'opacity-0 translate-y-10': !isHeaderVisible, 'opacity-100 translate-y-0': isHeaderVisible }">
                    <!-- Badge -->
                    <div class="inline-flex items-center space-x-2 bg-primary/10 text-primary px-4 py-2 rounded-full mb-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-sm font-semibold">Atención Especializada</span>
                    </div>

                    <!-- Title -->
                    <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-base-content mb-6">
                        Servicios
                    </h2>

                    <!-- Description -->
                    <p class="text-lg text-base-content/70 leading-relaxed max-w-4xl mx-auto">
                        Nuestro objetivo es mejorar su calidad de vida y bienestar, acompañándolos en cada etapa del proceso, contamos con médicos especialistas en audiología y otoneurología certificados, con amplia experiencia profesional que se encargarán de que cada paciente sea cuidado de la mejor manera posible.
                    </p>
                </div>

                <!-- Image and Features Section -->
                <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 xl:gap-16 items-stretch">
                    <!-- Left Side - Image -->
                    <div ref="imageRef" class="flex flex-col justify-between min-h-[300px] lg:min-h-[350px] transition-all duration-700 ease-out" :class="{ 'opacity-0 -translate-x-10': !isImageVisible, 'opacity-100 translate-x-0': isImageVisible }">
                        <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                            <img src="/img/editado/escuchar.png" alt="Servicios de audiología" class="w-full h-auto object-cover" />
                            <!-- Decorative overlay -->
                            <div class="absolute inset-0 bg-gradient-to-tr from-primary/10 to-transparent pointer-events-none"></div>
                        </div>
                        <!-- Trust indicators -->
                        <div class="grid grid-cols-3 gap-2 sm:gap-4 mt-6">
                            <div class="flex flex-col items-center text-center p-2 sm:p-3 lg:p-4 rounded-lg lg:rounded-xl bg-primary/5">
                                <svg class="w-6 h-6 sm:w-7 sm:h-7 lg:w-8 lg:h-8 text-primary mb-1 sm:mb-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-xs sm:text-sm font-semibold text-base-content">Certificados</span>
                            </div>
                            <div class="flex flex-col items-center text-center p-2 sm:p-3 lg:p-4 rounded-lg lg:rounded-xl bg-secondary/5">
                                <svg class="w-6 h-6 sm:w-7 sm:h-7 lg:w-8 lg:h-8 text-secondary mb-1 sm:mb-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                                </svg>
                                <span class="text-xs sm:text-sm font-semibold text-base-content">Equipo Experto</span>
                            </div>
                            <div class="flex flex-col items-center text-center p-2 sm:p-3 lg:p-4 rounded-lg lg:rounded-xl bg-primary/5">
                                <svg class="w-6 h-6 sm:w-7 sm:h-7 lg:w-8 lg:h-8 text-primary mb-1 sm:mb-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-xs sm:text-sm font-semibold text-base-content">Atención Personalizada</span>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side - Features & CTA -->
                    <div ref="contentRef" class="min-h-[300px] lg:min-h-[350px] my-auto transition-all duration-700 ease-out" :class="{ 'opacity-0 translate-x-10': !isContentVisible, 'opacity-100 translate-x-0': isContentVisible }">
                        <!-- Features List -->
                        <div class="space-y-2 sm:space-y-3">
                            <h3 class="text-xl sm:text-2xl font-semibold text-base-content mb-4 sm:mb-6">¿Qué incluyen nuestros servicios?</h3>
                            <div v-for="(feature, index) in features" :key="index" class="flex items-center space-x-2 sm:space-x-3 py-1.5 sm:py-2 transition-all duration-300 ease-out" :style="{ transitionDelay: `${(index + 1) * 100}ms` }" :class="{ 'opacity-0 translate-x-5': !isContentVisible, 'opacity-100 translate-x-0': isContentVisible }">
                                <div class="flex-shrink-0">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5 text-secondary" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <span class="text-sm sm:text-base text-base-content/80">{{ feature }}</span>
                            </div>
                        </div>
                        <!-- CTA Button -->
                        <div class="pt-6 sm:pt-8">
                            <a href="/servicios" class="inline-flex items-center space-x-2 bg-gradient-to-r from-primary to-secondary hover:shadow-xl transform hover:scale-105 transition-all duration-300 text-white px-6 sm:px-8 py-3 sm:py-4 rounded-lg sm:rounded-xl font-semibold text-base sm:text-lg group w-full md:w-auto justify-center">
                                <span>Ver servicios</span>
                                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

const features = ref([
    'Evaluaciones auditivas completas',
    'Tecnología de última generación',
    'Seguimiento personalizado'
]);

// Referencias para elementos animados
const headerRef = ref(null);
const imageRef = ref(null);
const contentRef = ref(null);

// Estados de visibilidad
const isHeaderVisible = ref(false);
const isImageVisible = ref(false);
const isContentVisible = ref(false);

let observer = null;

onMounted(() => {
    // Configurar Intersection Observer
    const options = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };

    observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                if (entry.target === headerRef.value) {
                    isHeaderVisible.value = true;
                } else if (entry.target === imageRef.value) {
                    isImageVisible.value = true;
                } else if (entry.target === contentRef.value) {
                    isContentVisible.value = true;
                }
            }
        });
    }, options);

    // Observar elementos
    if (headerRef.value) observer.observe(headerRef.value);
    if (imageRef.value) observer.observe(imageRef.value);
    if (contentRef.value) observer.observe(contentRef.value);
});

onUnmounted(() => {
    if (observer) {
        observer.disconnect();
    }
});
</script>

<style scoped>
.text-primary {
    color: var(--color-primary);
}

.bg-primary {
    background-color: var(--color-primary);
}

.bg-primary\/10 {
    background-color: rgb(from var(--color-primary) r g b / 0.1);
}

.bg-primary\/20 {
    background-color: rgb(from var(--color-primary) r g b / 0.2);
}

.from-primary\/10 {
    --tw-gradient-from: rgb(from var(--color-primary) r g b / 0.1);
}

.text-secondary {
    color: var(--color-secondary);
}

.bg-secondary {
    background-color: var(--color-secondary);
}

.bg-secondary\/20 {
    background-color: rgb(from var(--color-secondary) r g b / 0.2);
}

.from-primary {
    --tw-gradient-from: var(--color-primary);
}

.to-secondary {
    --tw-gradient-to: var(--color-secondary);
}
</style>