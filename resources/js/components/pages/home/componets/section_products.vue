<template>
    <section ref="sectionRef" class="relative min-h-screen flex items-center overflow-hidden">
        <!-- Background Image with Overlay -->
        <div ref="bgRef" class="absolute inset-0 z-0 animate-bg-zoom" :class="{ 'visible': isBgVisible }">
            <img
                src="/img/editado/abuelo.png"
                alt="Productos auditivos"
                class="w-full h-full object-cover"
            >
            <!-- Dynamic Overlay for better text readability -->
            <div class="absolute inset-0 bg-gradient-to-br from-base-200/70 via-base-200/60 to-base-200/75"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-primary/8 via-transparent to-secondary/8"></div>
        </div>

        <!-- Content Container -->
        <div class="relative z-10 w-full py-16 sm:py-20 lg:py-24">
            <div class="max-w-2xl ml-8 sm:ml-12 lg:ml-20 text-left">
                <!-- Title -->
                <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-base-content mb-6 sm:mb-8 animate-fade-in">
                    PRODUCTOS
                </h2>

                <!-- Description -->
                <p class="text-lg sm:text-xl lg:text-2xl text-base-content/80 mb-8 sm:mb-10 lg:mb-12 leading-relaxed animate-fade-in-delay">
                    Ofrecemos soluciones auditivas de la mejor calidad con tecnología de punta
                    y todos los avances audiológicos del mercado de la mano con el profesionalismo
                    y experiencia que nos diferencía
                </p>

                <!-- Button -->
                <a
                    href="/productos"
                    class="inline-flex items-center justify-center px-8 sm:px-10 lg:px-12 py-3 sm:py-4 text-base sm:text-lg font-semibold text-primary-content bg-primary hover:bg-primary-focus rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 ease-in-out animate-fade-in-delay-2"
                >
                    Ver productos
                    <svg
                        class="ml-2 w-5 h-5 sm:w-6 sm:h-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3"
                        />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Decorative Elements -->
        <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-base-100 to-transparent z-5"></div>
    </section>
</template>

<script setup>
import { onMounted, ref } from 'vue';

const sectionRef = ref(null);
const bgRef = ref(null);
const isBgVisible = ref(false);

onMounted(() => {
    // Add intersection observer for scroll animations
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        },
        {
            threshold: 0.1
        }
    );

    if (sectionRef.value) {
        const elements = sectionRef.value.querySelectorAll('.animate-fade-in, .animate-fade-in-delay, .animate-fade-in-delay-2');
        elements.forEach(el => observer.observe(el));
    }

    // Observer for background
    const bgObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    isBgVisible.value = true;
                }
            });
        },
        {
            threshold: 0.1
        }
    );

    if (bgRef.value) {
        bgObserver.observe(bgRef.value);
    }
});
</script>

<style scoped>
/* DaisyUI Theme Variables */
.from-base-200 {
    --tw-gradient-from: oklch(var(--b2));
}

.via-base-200 {
    --tw-gradient-via: oklch(var(--b2));
}

.to-base-200 {
    --tw-gradient-to: oklch(var(--b2));
}

.from-base-100 {
    --tw-gradient-from: oklch(var(--b1));
}

.from-primary {
    --tw-gradient-from: oklch(var(--p));
}

.to-secondary {
    --tw-gradient-to: oklch(var(--s));
}

/* Background animation */
.animate-bg-zoom {
    opacity: 0;
    transform: scale(1.1);
    transition: opacity 1.2s ease-out, transform 1.2s ease-out;
}

.animate-bg-zoom.visible {
    opacity: 1;
    transform: scale(1);
}

/* Fade-in animations */
.animate-fade-in,
.animate-fade-in-delay,
.animate-fade-in-delay-2 {
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.8s ease-out, transform 0.8s ease-out;
}

.animate-fade-in.visible {
    opacity: 1;
    transform: translateY(0);
}

.animate-fade-in-delay {
    transition-delay: 0.2s;
}

.animate-fade-in-delay.visible {
    opacity: 1;
    transform: translateY(0);
}

.animate-fade-in-delay-2 {
    transition-delay: 0.4s;
}

.animate-fade-in-delay-2.visible {
    opacity: 1;
    transform: translateY(0);
}

/* Responsive adjustments */
@media (max-width: 640px) {
    section {
        min-height: 100vh;
    }
}

@media (min-width: 641px) and (max-width: 1024px) {
    section {
        min-height: 90vh;
    }
}
</style>