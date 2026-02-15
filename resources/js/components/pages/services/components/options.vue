<template>
    <section class="relative py-16 sm:py-20 lg:py-24 overflow-hidden">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0 z-0">
            <img
                src="/img/editado/escuchar.png"
                alt="Background"
                class="w-full h-full object-cover"
            >
            <!-- Overlay dinámico según el tema -->
            <div
                class="absolute inset-0 transition-colors duration-300"
                :class="theme === 'dark' ? 'bg-gray-900/85' : 'bg-white/90'"
            ></div>
        </div>

        <!-- Content -->
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Header -->
            <div
                ref="headerRef"
                class="text-center mb-12 sm:mb-16 transition-all duration-700 ease-out"
                :class="{ 'opacity-0 translate-y-10': !isHeaderVisible, 'opacity-100 translate-y-0': isHeaderVisible }"
            >
                <h2
                    class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-bold mb-4 transition-colors duration-300"
                    :class="theme === 'dark' ? 'text-white' : 'text-gray-900'"
                >
                    Nuestros <span class="text-primary">Servicios</span>
                </h2>
                <p
                    class="text-lg sm:text-xl max-w-3xl mx-auto transition-colors duration-300"
                    :class="theme === 'dark' ? 'text-gray-300' : 'text-gray-700'"
                >
                    Ofrecemos una amplia gama de servicios especializados en audiología
                </p>
                <div
                    class="h-1 bg-gradient-to-r from-primary via-secondary to-primary mx-auto rounded-full mt-6 transition-all duration-1000 ease-out"
                    :class="{ 'w-0 opacity-0': !isHeaderVisible, 'w-32 opacity-100': isHeaderVisible }"
                ></div>
            </div>

            <!-- Services Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 lg:gap-8">
                <div
                    v-for="(service, index) in services"
                    :key="index"
                    :ref="el => setServiceRef(el, index)"
                    class="service-item group relative rounded-2xl backdrop-blur-sm shadow-lg overflow-hidden transition-all duration-500 hover:shadow-2xl cursor-pointer"
                    :class="[
                        theme === 'dark' ? 'bg-gray-800/80 hover:bg-gray-700/90' : 'bg-white/80 hover:bg-white/95',
                        { 'opacity-0 translate-y-10 scale-95': !serviceVisibility[index], 'opacity-100 translate-y-0 scale-100': serviceVisibility[index] }
                    ]"
                    :style="{ transitionDelay: `${index * 0.1}s` }"
                    @mouseenter="service.isHovered = true"
                    @mouseleave="service.isHovered = false"
                >
                    <!-- Icon Container -->
                    <div class="p-6 sm:p-8 flex flex-col items-center text-center">
                        <!-- Icon Circle -->
                        <div 
                            class="w-16 h-16 sm:w-20 sm:h-20 rounded-full flex items-center justify-center mb-4 transition-all duration-300 transform group-hover:scale-110 group-hover:rotate-6"
                            :class="service.iconBg"
                        >
                            <component :is="service.icon" class="w-8 h-8 sm:w-10 sm:h-10 text-white" />
                        </div>

                        <!-- Service Name -->
                        <h3
                            class="text-base sm:text-lg font-bold transition-colors duration-300 leading-tight"
                            :class="theme === 'dark' ? 'text-white' : 'text-gray-900'"
                        >
                            {{ service.name }}
                        </h3>

                        <!-- Hover Indicator -->
                        <div 
                            class="mt-4 w-0 h-1 bg-gradient-to-r from-primary to-secondary rounded-full transition-all duration-300 group-hover:w-full"
                        ></div>
                    </div>

                    <!-- Animated Border -->
                    <div 
                        class="absolute inset-0 rounded-2xl border-2 border-transparent transition-all duration-300 group-hover:border-primary/50"
                    ></div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, onMounted, h } from 'vue';
import { useTheme } from '@/composables/useTheme';

const { theme } = useTheme();

// Refs
const headerRef = ref(null);
const isHeaderVisible = ref(false);
const serviceRefs = ref([]);
const serviceVisibility = ref([]);

// Icons as functional components
const SunIcon = () => h('svg', { xmlns: 'http://www.w3.org/2000/svg', fill: 'none', viewBox: '0 0 24 24', stroke: 'currentColor' }, [
    h('path', { 'stroke-linecap': 'round', 'stroke-linejoin': 'round', 'stroke-width': '2', d: 'M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z' })
]);

const DocumentIcon = () => h('svg', { xmlns: 'http://www.w3.org/2000/svg', fill: 'none', viewBox: '0 0 24 24', stroke: 'currentColor' }, [
    h('path', { 'stroke-linecap': 'round', 'stroke-linejoin': 'round', 'stroke-width': '2', d: 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z' })
]);

const ChartIcon = () => h('svg', { xmlns: 'http://www.w3.org/2000/svg', fill: 'none', viewBox: '0 0 24 24', stroke: 'currentColor' }, [
    h('path', { 'stroke-linecap': 'round', 'stroke-linejoin': 'round', 'stroke-width': '2', d: 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z' })
]);

const HeadphonesIcon = () => h('svg', { xmlns: 'http://www.w3.org/2000/svg', fill: 'none', viewBox: '0 0 24 24', stroke: 'currentColor' }, [
    h('path', { 'stroke-linecap': 'round', 'stroke-linejoin': 'round', 'stroke-width': '2', d: 'M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3' })
]);

const VolumeIcon = () => h('svg', { xmlns: 'http://www.w3.org/2000/svg', fill: 'none', viewBox: '0 0 24 24', stroke: 'currentColor' }, [
    h('path', { 'stroke-linecap': 'round', 'stroke-linejoin': 'round', 'stroke-width': '2', d: 'M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z' })
]);

const MicrophoneIcon = () => h('svg', { xmlns: 'http://www.w3.org/2000/svg', fill: 'none', viewBox: '0 0 24 24', stroke: 'currentColor' }, [
    h('path', { 'stroke-linecap': 'round', 'stroke-linejoin': 'round', 'stroke-width': '2', d: 'M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z' })
]);

const CalendarIcon = () => h('svg', { xmlns: 'http://www.w3.org/2000/svg', fill: 'none', viewBox: '0 0 24 24', stroke: 'currentColor' }, [
    h('path', { 'stroke-linecap': 'round', 'stroke-linejoin': 'round', 'stroke-width': '2', d: 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z' })
]);

const MegaphoneIcon = () => h('svg', { xmlns: 'http://www.w3.org/2000/svg', fill: 'none', viewBox: '0 0 24 24', stroke: 'currentColor' }, [
    h('path', { 'stroke-linecap': 'round', 'stroke-linejoin': 'round', 'stroke-width': '2', d: 'M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z' })
]);

const UserIcon = () => h('svg', { xmlns: 'http://www.w3.org/2000/svg', fill: 'none', viewBox: '0 0 24 24', stroke: 'currentColor' }, [
    h('path', { 'stroke-linecap': 'round', 'stroke-linejoin': 'round', 'stroke-width': '2', d: 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z' })
]);

const RefreshIcon = () => h('svg', { xmlns: 'http://www.w3.org/2000/svg', fill: 'none', viewBox: '0 0 24 24', stroke: 'currentColor' }, [
    h('path', { 'stroke-linecap': 'round', 'stroke-linejoin': 'round', 'stroke-width': '2', d: 'M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15' })
]);

const CheckIcon = () => h('svg', { xmlns: 'http://www.w3.org/2000/svg', fill: 'none', viewBox: '0 0 24 24', stroke: 'currentColor' }, [
    h('path', { 'stroke-linecap': 'round', 'stroke-linejoin': 'round', 'stroke-width': '2', d: 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z' })
]);

const ClipboardIcon = () => h('svg', { xmlns: 'http://www.w3.org/2000/svg', fill: 'none', viewBox: '0 0 24 24', stroke: 'currentColor' }, [
    h('path', { 'stroke-linecap': 'round', 'stroke-linejoin': 'round', 'stroke-width': '2', d: 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2' })
]);

// Services data
const services = ref([
    { name: 'Consulta especializada en audiología', icon: SunIcon, iconBg: 'bg-primary', isHovered: false },
    { name: 'Acúfenometria', icon: DocumentIcon, iconBg: 'bg-secondary', isHovered: false },
    { name: 'Terapia de re-entrenamiento del tinnitus (acúfeno)', icon: ChartIcon, iconBg: 'bg-primary', isHovered: false },
    { name: 'Audiometría tonal liminar', icon: HeadphonesIcon, iconBg: 'bg-secondary', isHovered: false },
    { name: 'Audiometría verbal o logoaudiometría', icon: VolumeIcon, iconBg: 'bg-primary', isHovered: false },
    { name: 'Impedanciometría', icon: MicrophoneIcon, iconBg: 'bg-secondary', isHovered: false },
    { name: 'Tamiz auditivo neonatal', icon: CalendarIcon, iconBg: 'bg-primary', isHovered: false },
    { name: 'Adaptación y programación de auxiliares auditivos', icon: MegaphoneIcon, iconBg: 'bg-secondary', isHovered: false },
    { name: 'Consulta especializada en otoneurología', icon: UserIcon, iconBg: 'bg-primary', isHovered: false },
    { name: 'Rehabilitación vestibular', icon: RefreshIcon, iconBg: 'bg-secondary', isHovered: false },
    { name: 'Limpieza de oídos', icon: CheckIcon, iconBg: 'bg-primary', isHovered: false },
    { name: 'Clínica de acúfeno', icon: ClipboardIcon, iconBg: 'bg-secondary', isHovered: false },
]);

// Set service ref
const setServiceRef = (el, index) => {
    if (el) {
        serviceRefs.value[index] = el;
    }
};

// Setup Intersection Observer
onMounted(() => {
    // Initialize visibility array
    serviceVisibility.value = new Array(services.value.length).fill(false);

    // Observer for header
    const headerObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    isHeaderVisible.value = true;
                }
            });
        },
        {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        }
    );

    if (headerRef.value) {
        headerObserver.observe(headerRef.value);
    }

    // Observer for service items
    const serviceObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const index = serviceRefs.value.indexOf(entry.target);
                    if (index !== -1) {
                        serviceVisibility.value[index] = true;
                    }
                }
            });
        },
        {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        }
    );

    // Observe each service item
    serviceRefs.value.forEach((el) => {
        if (el) serviceObserver.observe(el);
    });
});
</script>

<style scoped>
/* Background image optimization */
.absolute.inset-0 img {
    filter: brightness(0.95);
}

/* Service item hover effects */
.service-item {
    transform-origin: center;
    transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.service-item:hover {
    transform: translateY(-8px) scale(1.02);
}

/* Icon animation */
.service-item:hover .rounded-full {
    box-shadow: 0 10px 30px rgba(0, 179, 164, 0.3);
}

/* Smooth transitions */
* {
    transition-property: background-color, border-color, color, fill, stroke, opacity, transform;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}

/* Mobile optimizations */
@media (max-width: 640px) {
    .service-item:hover {
        transform: translateY(-4px) scale(1.01);
    }
}

/* Reduced motion */
@media (prefers-reduced-motion: reduce) {
    .service-item,
    .service-item:hover,
    * {
        animation: none !important;
        transition: opacity 0.3s ease-out !important;
        transform: none !important;
    }
}
</style>