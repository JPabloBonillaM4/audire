<template>
    <section class="overflow-hidden relative hero" style="background-image: url('/img/editado/footer_caracol.png'); background-size: cover; background-position: center; background-attachment: fixed;">
        <!-- Hero Overlay for better readability -->
        <div class="absolute inset-0 bg-gradient-to-br from-base-200/70 via-base-200/60 to-base-200/75"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-primary/8 via-transparent to-secondary/8"></div>
        <div class="py-16 lg:py-24 relative z-10">
            <div class="container mx-auto px-4">
                <div class="max-w-7xl mx-auto">
                    <div class="grid lg:grid-cols-2 gap-8 lg:gap-16 items-center">
                    <!-- Left Side - Text Content -->
                    <div ref="contentRef" class="transition-all duration-700 ease-out" :class="{ 'opacity-0 -translate-x-10': !isContentVisible, 'opacity-100 translate-x-0': isContentVisible }">
                        <!-- Badge -->
                        <div class="inline-flex items-center space-x-2 bg-primary/10 text-primary px-4 py-2 rounded-full mb-6">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="text-sm font-semibold">Nuestro Compromiso</span>
                        </div>

                        <!-- Title -->
                        <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-base-content mb-6 leading-tight">
                            Mejorando tu
                            <span class="text-primary block">calidad de vida</span>
                        </h2>

                        <!-- Description -->
                        <p class="text-lg text-base-content/70 leading-relaxed mb-8">
                            Ofrecemos soluciones auditivas de la mejor calidad con tecnología de punta y todos los avances audiológicos del mercado de la mano con el profesionalismo y experiencia que nos diferencía.
                        </p>

                        <!-- Features List -->
                        <div class="space-y-4">
                            <div v-for="(feature, index) in features" :key="index" class="flex items-center space-x-3 transition-all duration-300 ease-out" :style="{ transitionDelay: `${(index + 1) * 100}ms` }" :class="{ 'opacity-0 translate-x-5': !isContentVisible, 'opacity-100 translate-x-0': isContentVisible }">
                                <div class="flex-shrink-0 w-8 h-8 rounded-full bg-gradient-to-r from-primary to-secondary flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <span class="text-base text-base-content/80 font-medium">{{ feature }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side - Video Preview -->
                    <div ref="videoRef" class="transition-all duration-700 ease-out" :class="{ 'opacity-0 translate-x-10': !isVideoVisible, 'opacity-100 translate-x-0': isVideoVisible }">
                        <div class="relative rounded-3xl overflow-hidden shadow-2xl group cursor-pointer" @click="openVideoModal">
                            <!-- Video Preview Image -->
                            <img src="/img/slides/prueba_video.png" alt="Video Preview" class="w-full h-auto object-cover transform group-hover:scale-105 transition-transform duration-500" />

                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent group-hover:from-black/70 transition-all duration-300"></div>

                            <!-- Play Button -->
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-20 h-20 lg:w-24 lg:h-24 rounded-full bg-white/90 backdrop-blur-sm flex items-center justify-center transform group-hover:scale-110 group-hover:bg-white transition-all duration-300 shadow-2xl">
                                    <svg class="w-10 h-10 lg:w-12 lg:h-12 text-primary ml-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
                                    </svg>
                                </div>
                            </div>

                            <!-- Video Label -->
                            <div class="absolute bottom-6 left-6 right-6 text-white">
                                <div class="flex items-center space-x-2 mb-2">
                                    <div class="w-3 h-3 rounded-full bg-red-500 animate-pulse"></div>
                                    <span class="text-sm font-semibold uppercase tracking-wider">Ver Video</span>
                                </div>
                                <p class="text-sm opacity-90">Descubre nuestra historia y compromiso</p>
                            </div>

                            <!-- Decorative Elements -->
                            <div class="absolute -top-4 -right-4 w-24 h-24 bg-secondary opacity-20 rounded-full blur-2xl"></div>
                            <div class="absolute -bottom-4 -left-4 w-32 h-32 bg-primary opacity-20 rounded-full blur-2xl"></div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Video Modal -->
    <Transition
        enter-active-class="transition-opacity duration-300 ease-out"
        enter-from-class="opacity-0"
        enter-to-class="opacity-100"
        leave-active-class="transition-opacity duration-200 ease-in"
        leave-from-class="opacity-100"
        leave-to-class="opacity-0"
    >
        <div v-if="isModalOpen" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/90 backdrop-blur-sm" @click="closeVideoModal">
            <!-- Modal Content -->
            <Transition
                enter-active-class="transition-all duration-300 ease-out"
                enter-from-class="opacity-0 scale-95"
                enter-to-class="opacity-100 scale-100"
                leave-active-class="transition-all duration-200 ease-in"
                leave-from-class="opacity-100 scale-100"
                leave-to-class="opacity-0 scale-95"
            >
                <div v-if="isModalOpen" class="relative w-full max-w-5xl aspect-video bg-black rounded-2xl overflow-hidden shadow-2xl" @click.stop>
                    <!-- Close Button -->
                    <button @click="closeVideoModal" class="cursor-pointer absolute top-4 right-4 z-10 w-10 h-10 rounded-full bg-white/10 backdrop-blur-sm hover:bg-white/20 text-white flex items-center justify-center transition-all duration-200 group">
                        <svg class="w-6 h-6 group-hover:rotate-90 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>

                    <!-- YouTube iframe -->
                    <iframe v-if="isModalOpen" :src="videoUrl" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </Transition>
        </div>
    </Transition>
</template>

<script setup>
import { ref, onMounted, onUnmounted, computed } from 'vue';

const features = ref([
    'Tecnología de punta',
    'Profesionales certificados',
    'Atención personalizada'
]);

// Referencias para animación
const contentRef = ref(null);
const videoRef = ref(null);

// Estados de visibilidad
const isContentVisible = ref(false);
const isVideoVisible = ref(false);

// Modal del video
const isModalOpen = ref(false);
const videoUrl = computed(() => {
    return isModalOpen.value ? 'https://www.youtube.com/embed/qQX2Ja7MWfE?autoplay=1&rel=0' : '';
});

let observer = null;

const openVideoModal = () => {
    isModalOpen.value = true;
    document.body.style.overflow = 'hidden';
};

const closeVideoModal = () => {
    isModalOpen.value = false;
    document.body.style.overflow = '';
};

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
                if (entry.target === contentRef.value) {
                    isContentVisible.value = true;
                } else if (entry.target === videoRef.value) {
                    isVideoVisible.value = true;
                }
            }
        });
    }, options);

    // Observar elementos
    if (contentRef.value) observer.observe(contentRef.value);
    if (videoRef.value) observer.observe(videoRef.value);

    // Cerrar modal con ESC
    const handleEscape = (e) => {
        if (e.key === 'Escape' && isModalOpen.value) {
            closeVideoModal();
        }
    };
    window.addEventListener('keydown', handleEscape);

    // Cleanup
    onUnmounted(() => {
        if (observer) {
            observer.disconnect();
        }
        window.removeEventListener('keydown', handleEscape);
        document.body.style.overflow = '';
    });
});
</script>

<style scoped>
.text-primary {
    color: var(--color-primary);
}

.bg-primary {
    background-color: var(--color-primary);
}

.text-secondary {
    color: var(--color-secondary);
}

.bg-secondary {
    background-color: var(--color-secondary);
}

.from-primary {
    --tw-gradient-from: var(--color-primary);
}

.to-secondary {
    --tw-gradient-to: var(--color-secondary);
}

.bg-primary\/10 {
    background-color: rgb(from var(--color-primary) r g b / 0.1);
}

.bg-primary\/20 {
    background-color: rgb(from var(--color-primary) r g b / 0.2);
}

.bg-secondary\/20 {
    background-color: rgb(from var(--color-secondary) r g b / 0.2);
}
</style>