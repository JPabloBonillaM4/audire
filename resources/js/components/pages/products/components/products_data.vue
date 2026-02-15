<template>
    <section class="py-16 sm:py-20 lg:py-24 transition-colors duration-300"
            :class="theme === 'dark' ? 'bg-gray-900' : 'bg-gray-50'">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div 
                ref="headerRef"
                class="text-center mb-12 sm:mb-16 transition-all duration-700 ease-out"
                :class="{ 'opacity-0 translate-y-10': !isHeaderVisible, 'opacity-100 translate-y-0': isHeaderVisible }"
            >
                <h2
                    class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-4 transition-colors duration-300"
                    :class="theme === 'dark' ? 'text-white' : 'text-gray-900'"
                >
                    Catálogo de <span class="text-primary">Productos</span>
                </h2>
                <dividerDecorative />
                <p
                    class="text-lg sm:text-xl max-w-3xl mx-auto mt-6 transition-colors duration-300"
                    :class="theme === 'dark' ? 'text-gray-300' : 'text-gray-700'"
                >
                    Descubre nuestra selección de productos audiológicos de alta calidad
                </p>
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                <div
                    v-for="(product, index) in products"
                    :key="product.id"
                    :ref="el => setProductRef(el, index)"
                    class="product-card group relative rounded-2xl overflow-hidden shadow-lg cursor-pointer transition-all duration-500"
                    :class="[
                        theme === 'dark' ? 'bg-gray-800 hover:bg-gray-750' : 'bg-white hover:bg-gray-50',
                        { 'opacity-0 translate-y-10 scale-95': !productVisibility[index], 'opacity-100 translate-y-0 scale-100': productVisibility[index] }
                    ]"
                    :style="{ transitionDelay: `${index * 0.1}s` }"
                    @click="openModal(product)"
                >
                    <!-- Image Gallery -->
                    <div class="relative h-64 sm:h-72 overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200">
                        <!-- No Image Placeholder -->
                        <div
                            v-if="!product.images || product.images.length === 0"
                            class="absolute inset-0 flex flex-col items-center justify-center p-8"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <p
                                class="text-sm font-semibold transition-colors duration-300"
                                :class="theme === 'dark' ? 'text-gray-500' : 'text-gray-400'"
                            >
                                Imagen no disponible
                            </p>
                        </div>

                        <!-- Primary Image -->
                        <div
                            v-if="product.images && product.images.length > 0"
                            class="absolute inset-0 transition-opacity duration-500"
                            :class="{ 'opacity-0': hoveredProduct === product.id }"
                        >
                            <img
                                :src="product.images[0]"
                                :alt="product.title"
                                class="w-full h-full object-contain p-6 transition-all duration-500 ease-out group-hover:scale-110"
                                @mouseenter="hoveredProduct = null"
                            >
                        </div>

                        <!-- Secondary Image (if exists) -->
                        <div
                            v-if="product.images && product.images.length > 1"
                            class="absolute inset-0 transition-opacity duration-500"
                            :class="{ 'opacity-100': hoveredProduct === product.id, 'opacity-0': hoveredProduct !== product.id }"
                            @mouseenter="hoveredProduct = product.id"
                        >
                            <img
                                :src="product.images[1]"
                                :alt="product.title"
                                class="w-full h-full object-contain p-6 transition-all duration-500 ease-out group-hover:scale-110"
                            >
                        </div>

                        <!-- Overlay con gradiente -->
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"
                        ></div>

                        <!-- Badge si hay múltiples imágenes -->
                        <div
                            v-if="product.images && product.images.length > 1"
                            class="absolute top-4 right-4 bg-primary text-white px-3 py-1 rounded-full text-xs font-semibold flex items-center gap-1 shadow-lg"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            {{ product.images.length }}
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-6 sm:p-8 transition-all duration-300">
                        <!-- Title -->
                        <h3
                            class="text-xl sm:text-2xl font-bold mb-3 transition-all duration-300 group-hover:translate-x-2 group-hover:text-primary"
                            :class="theme === 'dark' ? 'text-white' : 'text-gray-900'"
                        >
                            {{ product.title }}
                        </h3>

                        <!-- Description (optional) -->
                        <p
                            v-if="product.description"
                            class="text-sm sm:text-base leading-relaxed transition-colors duration-300 line-clamp-3"
                            :class="theme === 'dark' ? 'text-gray-400' : 'text-gray-600'"
                        >
                            {{ product.description }}
                        </p>

                        <!-- View Details Button -->
                        <div class="mt-4 flex items-center text-primary font-semibold group-hover:gap-3 transition-all duration-300">
                            <span class="text-sm">Ver detalles</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform group-hover:translate-x-2 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </div>
                    </div>

                    <!-- Hover Indicator -->
                    <div
                        class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-primary via-secondary to-primary transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"
                    ></div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <Teleport to="body">
            <Transition name="modal">
                <div
                    v-if="isModalOpen"
                    class="fixed inset-0 z-50 flex items-center justify-center p-4"
                    @click.self="closeModal"
                >
                    <!-- Overlay -->
                    <div
                        class="absolute inset-0 bg-black/60 backdrop-blur-sm"
                        @click="closeModal"
                    ></div>

                    <!-- Modal Content -->
                    <div
                        class="relative max-w-2xl w-full rounded-3xl shadow-2xl overflow-hidden"
                        :class="theme === 'dark' ? 'bg-gray-800' : 'bg-white'"
                    >
                        <!-- Close Button -->
                        <button
                            @click="closeModal"
                            class="absolute top-4 right-4 z-10 w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300 hover:rotate-90"
                            :class="theme === 'dark' ? 'bg-gray-700 hover:bg-gray-600 text-white' : 'bg-gray-100 hover:bg-gray-200 text-gray-900'"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>

                        <!-- Modal Images -->
                        <div 
                            v-if="selectedProduct?.images && selectedProduct.images.length > 0"
                            class="relative h-64 sm:h-80 bg-gradient-to-br from-gray-100 to-gray-200 overflow-hidden"
                        >
                            <!-- Image Carousel -->
                            <div class="relative h-full">
                                <img
                                    :src="selectedProduct.images[currentImageIndex]"
                                    :alt="selectedProduct.title"
                                    class="w-full h-full object-contain p-8"
                                >
                            </div>

                            <!-- Navigation Arrows (if multiple images) -->
                            <div v-if="selectedProduct.images.length > 1" class="absolute inset-0 flex items-center justify-between p-4 pointer-events-none">
                                <button
                                    @click="previousImage"
                                    class="w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300 pointer-events-auto"
                                    :class="theme === 'dark' ? 'bg-gray-700/80 hover:bg-gray-600 text-white' : 'bg-white/80 hover:bg-white text-gray-900'"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                    </svg>
                                </button>
                                <button
                                    @click="nextImage"
                                    class="w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300 pointer-events-auto"
                                    :class="theme === 'dark' ? 'bg-gray-700/80 hover:bg-gray-600 text-white' : 'bg-white/80 hover:bg-white text-gray-900'"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                            </div>

                            <!-- Image Indicators -->
                            <div v-if="selectedProduct.images.length > 1" class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex gap-2">
                                <button
                                    v-for="(img, idx) in selectedProduct.images"
                                    :key="idx"
                                    @click="currentImageIndex = idx"
                                    class="w-2 h-2 rounded-full transition-all duration-300"
                                    :class="idx === currentImageIndex ? 'bg-primary w-6' : 'bg-gray-400 hover:bg-gray-600'"
                                ></button>
                            </div>
                        </div>

                        <!-- No Image Placeholder for Modal -->
                        <div 
                            v-else
                            class="relative h-64 sm:h-80 bg-gradient-to-br from-gray-100 to-gray-200 flex flex-col items-center justify-center"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <p
                                class="text-base font-semibold transition-colors duration-300"
                                :class="theme === 'dark' ? 'text-gray-500' : 'text-gray-400'"
                            >
                                Imagen no disponible
                            </p>
                        </div>

                        <!-- Modal Body -->
                        <div class="p-8 sm:p-10">
                            <div class="text-center mb-6">
                                <h3
                                    class="text-2xl sm:text-3xl font-bold mb-3 transition-colors duration-300"
                                    :class="theme === 'dark' ? 'text-white' : 'text-gray-900'"
                                >
                                    {{ selectedProduct?.title }}
                                </h3>
                                <p
                                    v-if="selectedProduct?.description"
                                    class="text-base sm:text-lg leading-relaxed transition-colors duration-300"
                                    :class="theme === 'dark' ? 'text-gray-300' : 'text-gray-600'"
                                >
                                    {{ selectedProduct.description }}
                                </p>
                                <p
                                    v-else
                                    class="text-base sm:text-lg transition-colors duration-300"
                                    :class="theme === 'dark' ? 'text-gray-300' : 'text-gray-600'"
                                >
                                    ¿Cómo deseas contactarnos?
                                </p>
                            </div>

                            <!-- Botones de Acción -->
                            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                                <!-- Botón Llamanos -->
                                <a
                                    href="tel:+525555555555"
                                    class="btn-primary px-8 py-4 rounded-xl font-semibold text-lg transition-all duration-300 transform hover:scale-105 hover:shadow-lg flex items-center justify-center gap-3"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                    Llámanos
                                </a>

                                <!-- Botón Contactanos -->
                                <a
                                    href="/contacto#contacto-form"
                                    class="btn-secondary px-8 py-4 rounded-xl font-semibold text-lg transition-all duration-300 transform hover:scale-105 hover:shadow-lg flex items-center justify-center gap-3"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    Contáctanos
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </Transition>
        </Teleport>
    </section>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useTheme } from '@/composables/useTheme';
import dividerDecorative from '@/components/general/divider-decorative.vue';

const { theme } = useTheme();

// Refs
const headerRef = ref(null);
const isHeaderVisible = ref(false);
const productRefs = ref([]);
const productVisibility = ref([]);
const hoveredProduct = ref(null);

// Modal state
const isModalOpen = ref(false);
const selectedProduct = ref(null);
const currentImageIndex = ref(0);

// Products data - Aquí se agregan los productos
const products = ref([
    {
        id: 1,
        title: 'Auxiliares auditivos',
        description: 'Tecnología de última generación para una audición clara y natural. Diseño discreto y cómodo para uso diario.',
        images: [
            'img/productos/auxiliares.jpg',
            'img/productos/auxiliares1.jpg'
        ]
    },
    {
        id: 2,
        title: 'Accesorios inalámbricos',
        description: 'Conectividad avanzada para tus dispositivos. Compatible con smartphones y tablets.',
        images: [
            'img/productos/recorte/11.png',
            'img/productos/recorte/14.png'
        ]
    },
    {
        id: 3,
        title: 'Deshumificadores',
        description: 'Protege tus auxiliares auditivos de la humedad. Prolonga la vida útil de tus dispositivos.',
        images: [
            'img/productos/recorte/7.png',
            'img/productos/recorte/13.png'
        ]
    },
    {
        id: 4,
        title: 'Micrófonos',
        description: 'Micrófonos de alta calidad para mejorar la captación de audio en diferentes ambientes.',
        images: [
            'img/productos/recorte/8_sm.png',
            'img/productos/recorte/4.png'
        ]
    },
    {
        id: 5,
        title: 'Moldes auditivos',
        description: 'Fabricados a medida para tu máxima comodidad y mejor rendimiento acústico.',
        images: []
    },
    {
        id: 6,
        title: 'Filtros anticerumen',
        description: 'Protección eficaz contra cerumen y partículas. Mantenimiento óptimo de tus auxiliares.',
        images: [
            'img/productos/recorte/1.png'
        ]
    },
    {
        id: 7,
        title: 'Filtros para músicos',
        description: 'Próximamente disponibles. Protección auditiva profesional diseñada especialmente para músicos.',
        images: []
    }
]);

// Modal functions
const openModal = (product) => {
    selectedProduct.value = product;
    currentImageIndex.value = 0;
    isModalOpen.value = true;
    document.body.style.overflow = 'hidden';
};

const closeModal = () => {
    isModalOpen.value = false;
    selectedProduct.value = null;
    currentImageIndex.value = 0;
    document.body.style.overflow = '';
};

const nextImage = () => {
    if (selectedProduct.value && selectedProduct.value.images) {
        currentImageIndex.value = (currentImageIndex.value + 1) % selectedProduct.value.images.length;
    }
};

const previousImage = () => {
    if (selectedProduct.value && selectedProduct.value.images) {
        currentImageIndex.value = currentImageIndex.value === 0 
            ? selectedProduct.value.images.length - 1 
            : currentImageIndex.value - 1;
    }
};

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
/* Colores personalizados */
.text-primary {
    color: var(--color-primary);
}

.bg-primary {
    background-color: var(--color-primary);
}

.bg-secondary {
    background-color: var(--color-secondary);
}

/* Botones con colores personalizados */
.btn-primary {
    background-color: var(--color-primary);
    color: white;
    border: none;
}

.btn-primary:hover {
    background-color: rgb(from var(--color-primary) r g b / 0.85);
    box-shadow: 0 10px 25px rgb(from var(--color-primary) r g b / 0.3);
}

.btn-secondary {
    background-color: transparent;
    color: var(--color-primary);
    border: 2px solid var(--color-primary);
}

.btn-secondary:hover {
    background-color: rgb(from var(--color-primary) r g b / 0.1);
    border-color: var(--color-secondary);
    color: var(--color-secondary);
}

/* Product card hover effects */
.product-card {
    transform-origin: center;
    transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.product-card:hover {
    transform: translateY(-8px) scale(1.02);
}

/* Line clamp utility */
.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Animaciones del Modal */
.modal-enter-active,
.modal-leave-active {
    transition: opacity 0.3s ease;
}

.modal-enter-active .relative,
.modal-leave-active .relative {
    transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1), opacity 0.3s ease;
}

.modal-enter-from,
.modal-leave-to {
    opacity: 0;
}

.modal-enter-from .relative {
    transform: scale(0.9) translateY(20px);
    opacity: 0;
}

.modal-leave-to .relative {
    transform: scale(0.9) translateY(-20px);
    opacity: 0;
}

.modal-enter-to .relative,
.modal-leave-from .relative {
    transform: scale(1) translateY(0);
    opacity: 1;
}

/* Mobile optimizations */
@media (max-width: 640px) {
    .product-card:hover {
        transform: translateY(-4px) scale(1.01);
    }
}

/* Reduced motion */
@media (prefers-reduced-motion: reduce) {
    .product-card,
    .product-card:hover,
    * {
        animation: none !important;
        transition: opacity 0.3s ease-out !important;
        transform: none !important;
    }
}
</style>