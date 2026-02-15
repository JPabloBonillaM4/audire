<template>
    <section class="relative min-h-screen flex justify-center overflow-hidden">
        <!-- Background Image Fixed -->
        <div
            class="absolute inset-0 bg-fixed bg-cover bg-center bg-no-repeat"
            style="background-image: url('/img/editado/mar_inv.png')"
        ></div>

        <!-- Overlay con reactividad al tema -->
        <div
            class="absolute inset-0 transition-colors duration-300"
            :class="theme === 'dark' ? 'bg-gray-900/80' : 'bg-white/75'"
        ></div>

        <!-- Content -->
        <div class="relative z-10 container mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="max-w-4xl mx-auto text-center space-y-8">
                <!-- Título Principal -->
                <h1
                    class="text-5xl sm:text-6xl lg:text-7xl font-bold transition-colors duration-300"
                    :class="theme === 'dark' ? 'text-white' : 'text-gray-900'"
                >
                    Servicios
                </h1>

                <!-- Divider decorativo -->
                <dividerDecorative />

                <!-- Descripción Principal -->
                <p
                    class="text-lg sm:text-xl lg:text-2xl leading-relaxed transition-colors duration-300"
                    :class="theme === 'dark' ? 'text-gray-200' : 'text-gray-700'"
                >
                    Somos un centro de atención especializada para problemas de audición y alteraciones 
                    del equilibrio de tipo periférico como vértigo, mareo e inestabilidad.
                </p>

                <!-- Textos adicionales sobre servicios de salud auditiva -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 mt-12">
                    <!-- Card 1 -->
                    <div
                        class="p-6 rounded-2xl backdrop-blur-sm transition-all duration-300 transform hover:scale-105"
                        :class="theme === 'dark' ? 'bg-gray-800/50 hover:bg-gray-800/70' : 'bg-white/80 hover:bg-white/90'"
                    >
                        <div
                            class="text-4xl mb-4 transition-colors duration-300"
                            :class="theme === 'dark' ? 'text-blue-400' : 'text-blue-600'"
                        >
                            🔬
                        </div>
                        <h3
                            class="text-xl font-semibold mb-3 transition-colors duration-300"
                            :class="theme === 'dark' ? 'text-white' : 'text-gray-900'"
                        >
                            Diagnóstico Especializado
                        </h3>
                        <p
                            class="text-sm sm:text-base transition-colors duration-300"
                            :class="theme === 'dark' ? 'text-gray-300' : 'text-gray-600'"
                        >
                            Evaluaciones audiológicas completas con equipos de última generación para un diagnóstico preciso
                        </p>
                    </div>

                    <!-- Card 2 -->
                    <div
                        class="p-6 rounded-2xl backdrop-blur-sm transition-all duration-300 transform hover:scale-105"
                        :class="theme === 'dark' ? 'bg-gray-800/50 hover:bg-gray-800/70' : 'bg-white/80 hover:bg-white/90'"
                    >
                        <div
                            class="text-4xl mb-4 transition-colors duration-300"
                            :class="theme === 'dark' ? 'text-blue-400' : 'text-blue-600'"
                        >
                            🎯
                        </div>
                        <h3
                            class="text-xl font-semibold mb-3 transition-colors duration-300"
                            :class="theme === 'dark' ? 'text-white' : 'text-gray-900'"
                        >
                            Tratamiento Personalizado
                        </h3>
                        <p
                            class="text-sm sm:text-base transition-colors duration-300"
                            :class="theme === 'dark' ? 'text-gray-300' : 'text-gray-600'"
                        >
                            Soluciones auditivas adaptadas a tus necesidades específicas para mejorar tu calidad de vida
                        </p>
                    </div>

                    <!-- Card 3 -->
                    <div
                        class="p-6 rounded-2xl backdrop-blur-sm transition-all duration-300 transform hover:scale-105"
                        :class="theme === 'dark' ? 'bg-gray-800/50 hover:bg-gray-800/70' : 'bg-white/80 hover:bg-white/90'"
                    >
                        <div
                            class="text-4xl mb-4 transition-colors duration-300"
                            :class="theme === 'dark' ? 'text-blue-400' : 'text-blue-600'"
                        >
                            ⚖️
                        </div>
                        <h3
                            class="text-xl font-semibold mb-3 transition-colors duration-300"
                            :class="theme === 'dark' ? 'text-white' : 'text-gray-900'"
                        >
                            Equilibrio y Vértigo
                        </h3>
                        <p
                            class="text-sm sm:text-base transition-colors duration-300"
                            :class="theme === 'dark' ? 'text-gray-300' : 'text-gray-600'"
                        >
                            Atención especializada para alteraciones del equilibrio, vértigo, mareo e inestabilidad
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <div
                class="w-6 h-10 border-2 rounded-full flex items-start justify-center p-2 transition-colors duration-300"
                :class="theme === 'dark' ? 'border-white' : 'border-gray-900'"
            >
                <div
                    class="w-1.5 h-1.5 rounded-full transition-colors duration-300"
                    :class="theme === 'dark' ? 'bg-white' : 'bg-gray-900'"
                ></div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { useTheme } from '@/composables/useTheme';
import dividerDecorative from '@/components/general/divider-decorative.vue';

const { theme } = useTheme();
</script>

<style scoped>
/* Asegurar que el background sea verdaderamente fixed */
.bg-fixed {
    background-attachment: fixed;
}

/* Animación suave para las transiciones de tema */
* {
    transition-property: background-color, border-color, color, fill, stroke;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}

/* Optimización para dispositivos móviles donde fixed puede no funcionar bien */
@media (max-width: 768px) {
    .bg-fixed {
        background-attachment: scroll;
    }
}
</style>