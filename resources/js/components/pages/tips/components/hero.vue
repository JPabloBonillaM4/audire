<template>
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <!-- Background Image Fixed -->
        <div
            class="absolute inset-0 bg-fixed bg-cover bg-center bg-no-repeat"
            style="background-image: url('/img/editado/escuchar_inv.png')"
        ></div>

        <!-- Overlay con reactividad al tema -->
        <div
            class="absolute inset-0 transition-colors duration-300"
            :class="theme === 'dark' ? 'bg-gray-900/85' : 'bg-white/80'"
        ></div>

        <!-- Content -->
        <div class="relative z-10 container mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div 
                ref="contentRef"
                class="max-w-5xl mx-auto text-center space-y-8 transition-all duration-1000 ease-out"
                :class="{ 'opacity-0 translate-y-10': !isVisible, 'opacity-100 translate-y-0': isVisible }"
            >

                <!-- Título Principal -->
                <h1
                    class="text-5xl sm:text-6xl lg:text-7xl xl:text-8xl font-bold transition-all duration-700 delay-300"
                    :class="[
                        theme === 'dark' ? 'text-white' : 'text-gray-900',
                        { 'opacity-0 translate-y-10': !isVisible, 'opacity-100 translate-y-0': isVisible }
                    ]"
                >
                    Tips de <span class="text-primary">Salud Auditiva</span>
                </h1>

                <!-- Divider decorativo -->
                <div 
                    class="transition-all duration-700 delay-400"
                    :class="{ 'opacity-0 scale-x-0': !isVisible, 'opacity-100 scale-x-100': isVisible }"
                >
                    <dividerDecorative />
                </div>

                <!-- Descripción Principal -->
                <p
                    class="text-lg sm:text-xl lg:text-2xl leading-relaxed max-w-4xl mx-auto transition-all duration-700 delay-500"
                    :class="[
                        theme === 'dark' ? 'text-gray-200' : 'text-gray-700',
                        { 'opacity-0 translate-y-10': !isVisible, 'opacity-100 translate-y-0': isVisible }
                    ]"
                >
                    360 millones de personas sufren pérdida auditiva discapacitante en todo el mundo y la mitad 
                    de los casos se podrían evitar con prevención, según datos de la OMS
                </p>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 lg:gap-6 mt-12 lg:mt-16">
                    <!-- Card 1 -->
                    <div
                        class="p-6 rounded-2xl backdrop-blur-sm transition-all duration-700 delay-600 transform hover:scale-105"
                        :class="[
                            theme === 'dark' ? 'bg-gray-800/60 hover:bg-gray-800/80' : 'bg-white/90 hover:bg-white/95',
                            { 'opacity-0 translate-y-10': !isVisible, 'opacity-100 translate-y-0': isVisible }
                        ]"
                    >
                        <div class="text-4xl mb-3">👂</div>
                        <h3
                            class="text-2xl font-bold mb-2 text-primary transition-colors duration-300"
                        >
                            360M
                        </h3>
                        <p
                            class="text-sm transition-colors duration-300"
                            :class="theme === 'dark' ? 'text-gray-300' : 'text-gray-600'"
                        >
                            Personas con pérdida auditiva
                        </p>
                    </div>

                    <!-- Card 2 -->
                    <div
                        class="p-6 rounded-2xl backdrop-blur-sm transition-all duration-700 delay-700 transform hover:scale-105"
                        :class="[
                            theme === 'dark' ? 'bg-gray-800/60 hover:bg-gray-800/80' : 'bg-white/90 hover:bg-white/95',
                            { 'opacity-0 translate-y-10': !isVisible, 'opacity-100 translate-y-0': isVisible }
                        ]"
                    >
                        <div class="text-4xl mb-3">🛡️</div>
                        <h3
                            class="text-2xl font-bold mb-2 text-primary transition-colors duration-300"
                        >
                            50%
                        </h3>
                        <p
                            class="text-sm transition-colors duration-300"
                            :class="theme === 'dark' ? 'text-gray-300' : 'text-gray-600'"
                        >
                            Casos prevenibles
                        </p>
                    </div>

                    <!-- Card 3 -->
                    <div
                        class="p-6 rounded-2xl backdrop-blur-sm transition-all duration-700 delay-[800ms] transform hover:scale-105"
                        :class="[
                            theme === 'dark' ? 'bg-gray-800/60 hover:bg-gray-800/80' : 'bg-white/90 hover:bg-white/95',
                            { 'opacity-0 translate-y-10': !isVisible, 'opacity-100 translate-y-0': isVisible }
                        ]"
                    >
                        <div class="text-4xl mb-3">💡</div>
                        <h3
                            class="text-2xl font-bold mb-2 text-primary transition-colors duration-300"
                        >
                            Prevención
                        </h3>
                        <p
                            class="text-sm transition-colors duration-300"
                            :class="theme === 'dark' ? 'text-gray-300' : 'text-gray-600'"
                        >
                            La clave es la prevención
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator (Mouse Icon) -->
        <div 
            class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce transition-all duration-1000 delay-1000"
            :class="{ 'opacity-0': !isVisible, 'opacity-100': isVisible }"
        >
            <div
                class="w-6 h-10 border-2 rounded-full flex items-start justify-center p-2 transition-colors duration-300"
                :class="theme === 'dark' ? 'border-white' : 'border-gray-900'"
            >
                <div
                    class="w-1.5 h-1.5 rounded-full transition-colors duration-300 animate-scroll-dot"
                    :class="theme === 'dark' ? 'bg-white' : 'bg-gray-900'"
                ></div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useTheme } from '@/composables/useTheme';
import dividerDecorative from '@/components/general/divider-decorative.vue';

const { theme } = useTheme();

// Refs para animaciones
const contentRef = ref(null);
const isVisible = ref(false);

// Setup Intersection Observer para animaciones de entrada
onMounted(() => {
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    isVisible.value = true;
                }
            });
        },
        {
            threshold: 0.1,
            rootMargin: '0px'
        }
    );

    if (contentRef.value) {
        observer.observe(contentRef.value);
    }

    // Mostrar inmediatamente
    setTimeout(() => {
        isVisible.value = true;
    }, 100);
});
</script>

<style scoped>
/* Asegurar que el background sea verdaderamente fixed */
.bg-fixed {
    background-attachment: fixed;
}

/* Animación suave para las transiciones de tema */
* {
    transition-property: background-color, border-color, color, fill, stroke, opacity, transform;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}

/* Animación personalizada para el punto del mouse */
@keyframes scroll-dot {
    0%, 100% {
        transform: translateY(0);
        opacity: 1;
    }
    50% {
        transform: translateY(8px);
        opacity: 0.5;
    }
}

.animate-scroll-dot {
    animation: scroll-dot 2s ease-in-out infinite;
}

/* Optimización para dispositivos móviles */
@media (max-width: 768px) {
    .bg-fixed {
        background-attachment: scroll;
        background-position: center;
    }
}

/* Reducir movimiento para usuarios con preferencias de accesibilidad */
@media (prefers-reduced-motion: reduce) {
    * {
        animation: none !important;
        transition: opacity 0.3s ease-out !important;
        transform: none !important;
    }
    
    .animate-bounce,
    .animate-scroll-dot {
        animation: none !important;
    }
}
</style>