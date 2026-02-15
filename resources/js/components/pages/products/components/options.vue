<template>
    <section class="relative py-16 sm:py-20 lg:py-24 overflow-hidden">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0 z-0">
            <img
                src="/img/editado/abuelo.png"
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
                    Nuestros <span class="text-primary">Productos</span>
                </h2>
                <p
                    class="text-lg sm:text-xl max-w-3xl mx-auto transition-colors duration-300"
                    :class="theme === 'dark' ? 'text-gray-300' : 'text-gray-700'"
                >
                    Descubre nuestra gama completa de soluciones auditivas
                </p>
                <div
                    class="h-1 bg-gradient-to-r from-primary via-secondary to-primary mx-auto rounded-full mt-6 transition-all duration-1000 ease-out"
                    :class="{ 'w-0 opacity-0': !isHeaderVisible, 'w-32 opacity-100': isHeaderVisible }"
                ></div>
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 lg:gap-8 max-w-7xl mx-auto">
                <div
                    v-for="(product, index) in products"
                    :key="index"
                    :ref="el => setProductRef(el, index)"
                    class="product-item group relative rounded-2xl backdrop-blur-sm shadow-lg overflow-hidden transition-all duration-500 hover:shadow-2xl cursor-pointer"
                    :class="[
                        theme === 'dark' ? 'bg-gray-800/80 hover:bg-gray-700/90' : 'bg-white/80 hover:bg-white/95',
                        { 'opacity-0 translate-y-10 scale-95': !productVisibility[index], 'opacity-100 translate-y-0 scale-100': productVisibility[index] }
                    ]"
                    :style="{ transitionDelay: `${index * 0.1}s` }"
                >
                    <!-- Product Container -->
                    <div class="p-6 sm:p-8 flex flex-col items-center text-center">
                        <!-- Icon Circle -->
                        <div
                            class="w-16 h-16 sm:w-20 sm:h-20 rounded-full flex items-center justify-center mb-4 transition-all duration-300 transform group-hover:scale-110 group-hover:rotate-6"
                            :class="product.iconBg"
                        >
                            <component :is="product.icon" class="w-8 h-8 sm:w-10 sm:h-10 text-white" />
                        </div>

                        <!-- Product Name -->
                        <h3
                            class="text-base sm:text-lg font-bold transition-colors duration-300 leading-tight"
                            :class="theme === 'dark' ? 'text-white' : 'text-gray-900'"
                        >
                            {{ product.name }}
                        </h3>

                        <!-- Hover Indicator -->
                        <div
                            class="mt-4 w-0 h-1 bg-gradient-to-r from-primary to-secondary rounded-full transition-all duration-300 group-hover:w-full"
                        ></div>
                    </div>

                    <!-- Animated Border -->
                    <div
                        class="absolute inset-0 rounded-2xl border-2 border-transparent transition-all duration-300 group-hover:border-primary/50 pointer-events-none"
                    ></div>

                    <!-- Corner Accent -->
                    <div
                        class="absolute top-0 right-0 w-0 h-0 border-t-[30px] border-r-[30px] border-t-transparent border-r-transparent transition-all duration-300 group-hover:border-r-primary/20"
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
const productRefs = ref([]);
const productVisibility = ref([]);

// Icons as functional components
const AuditiveIcon = () => h('svg', { xmlns: 'http://www.w3.org/2000/svg', fill: 'none', viewBox: '0 0 24 24', stroke: 'currentColor' }, [
    h('path', { 'stroke-linecap': 'round', 'stroke-linejoin': 'round', 'stroke-width': '2', d: 'M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z' })
]);

const WirelessIcon = () => h('svg', { xmlns: 'http://www.w3.org/2000/svg', fill: 'none', viewBox: '0 0 24 24', stroke: 'currentColor' }, [
    h('path', { 'stroke-linecap': 'round', 'stroke-linejoin': 'round', 'stroke-width': '2', d: 'M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z' })
]);

const DehumidifierIcon = () => h('svg', { xmlns: 'http://www.w3.org/2000/svg', fill: 'none', viewBox: '0 0 24 24', stroke: 'currentColor' }, [
    h('path', { 'stroke-linecap': 'round', 'stroke-linejoin': 'round', 'stroke-width': '2', d: 'M4 5a1 1 0 011-1h4a1 1 0 011 1v7a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM14 5a1 1 0 011-1h4a1 1 0 011 1v7a1 1 0 01-1 1h-4a1 1 0 01-1-1V5zM4 17a1 1 0 011-1h4a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1v-2zM14 17a1 1 0 011-1h4a1 1 0 011 1v2a1 1 0 01-1 1h-4a1 1 0 01-1-1v-2z' })
]);

const MicrophoneIcon = () => h('svg', { xmlns: 'http://www.w3.org/2000/svg', fill: 'none', viewBox: '0 0 24 24', stroke: 'currentColor' }, [
    h('path', { 'stroke-linecap': 'round', 'stroke-linejoin': 'round', 'stroke-width': '2', d: 'M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z' })
]);

const HeadphonesIcon = () => h('svg', { xmlns: 'http://www.w3.org/2000/svg', fill: 'none', viewBox: '0 0 24 24', stroke: 'currentColor' }, [
    h('path', { 'stroke-linecap': 'round', 'stroke-linejoin': 'round', 'stroke-width': '2', d: 'M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3' })
]);

const DropletIcon = () => h('svg', { xmlns: 'http://www.w3.org/2000/svg', fill: 'none', viewBox: '0 0 24 24', stroke: 'currentColor' }, [
    h('path', { 'stroke-linecap': 'round', 'stroke-linejoin': 'round', 'stroke-width': '2', d: 'M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01' })
]);

const FilterIcon = () => h('svg', { xmlns: 'http://www.w3.org/2000/svg', fill: 'none', viewBox: '0 0 24 24', stroke: 'currentColor' }, [
    h('path', { 'stroke-linecap': 'round', 'stroke-linejoin': 'round', 'stroke-width': '2', d: 'M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z' })
]);

// Products data
const products = ref([
    { name: 'Auxiliares auditivos', icon: AuditiveIcon, iconBg: 'bg-primary' },
    { name: 'Accesorios inalámbricos', icon: WirelessIcon, iconBg: 'bg-secondary' },
    { name: 'Deshumificadores', icon: DehumidifierIcon, iconBg: 'bg-primary' },
    { name: 'Micrófonos', icon: MicrophoneIcon, iconBg: 'bg-secondary' },
    { name: 'Moldes auditivos', icon: HeadphonesIcon, iconBg: 'bg-primary' },
    { name: 'Filtros anticerumen', icon: DropletIcon, iconBg: 'bg-secondary' },
    { name: 'Filtros para músicos', icon: FilterIcon, iconBg: 'bg-primary' }
]);

// Set product ref
const setProductRef = (el, index) => {
    if (el) {
        productRefs.value[index] = el;
    }
};

// Setup Intersection Observer
onMounted(() => {
    // Initialize visibility array
    productVisibility.value = new Array(products.value.length).fill(false);

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

    // Observer for product items
    const productObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const index = productRefs.value.indexOf(entry.target);
                    if (index !== -1) {
                        productVisibility.value[index] = true;
                    }
                }
            });
        },
        {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        }
    );

    // Observe each product item
    productRefs.value.forEach((el) => {
        if (el) productObserver.observe(el);
    });
});
</script>

<style scoped>
/* Background image optimization */
.absolute.inset-0 img {
    filter: brightness(0.95);
}

/* Product item hover effects */
.product-item {
    transform-origin: center;
    transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.product-item:hover {
    transform: translateY(-8px) scale(1.02);
}

/* Icon animation */
.product-item:hover .rounded-full {
    box-shadow: 0 10px 30px rgba(0, 179, 164, 0.3);
}

/* Smooth transitions */
* {
    transition-property: background-color, border-color, color, fill, stroke, opacity, transform;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}

/* Mobile optimizations */
@media (max-width: 640px) {
    .product-item:hover {
        transform: translateY(-4px) scale(1.01);
    }
}

/* Reduced motion */
@media (prefers-reduced-motion: reduce) {
    .product-item,
    .product-item:hover,
    * {
        animation: none !important;
        transition: opacity 0.3s ease-out !important;
        transform: none !important;
    }
}
</style>