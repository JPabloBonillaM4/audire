<template>
    <section
        class="relative min-h-[60vh] lg:min-h-[70vh] flex items-center justify-center overflow-hidden"
        :style="{
            backgroundImage: `url('/img/editado/caracol.png')`,
            backgroundSize: 'cover',
            backgroundPosition: 'center',
            backgroundAttachment: 'fixed'
        }"
    >
        <!-- Overlay dinámico según tema -->
        <div
            class="absolute inset-0 transition-all duration-500"
            :class="{
                'bg-gradient-to-b from-white/85 via-white/75 to-white/90': theme === 'light',
                'bg-gradient-to-b from-gray-900/90 via-gray-900/80 to-gray-900/95': theme === 'dark'
            }"
        ></div>
        <!-- Accent gradient -->
        <div class="absolute inset-0 bg-gradient-to-r from-primary/10 via-transparent to-secondary/10"></div>

        <!-- Content -->
        <div class="relative z-10 container mx-auto px-4 py-16 lg:py-24">
            <div class="max-w-4xl mx-auto text-center">
                <!-- Badge -->
                <div
                    class="inline-flex items-center space-x-2 px-4 py-2 rounded-full mb-6 transition-all duration-300"
                    :class="{
                        'bg-primary/10 text-primary': theme === 'light',
                        'bg-primary/20 text-primary': theme === 'dark'
                    }"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    <span class="text-sm font-semibold">Estamos para ayudarte</span>
                </div>

                <!-- Title -->
                <h1
                    class="text-5xl md:text-6xl lg:text-7xl font-bold mb-6 tracking-tight transition-colors duration-300"
                    :class="{
                        'text-gray-900': theme === 'light',
                        'text-white': theme === 'dark'
                    }"
                >
                    CONTACTO
                </h1>

                <!-- Divider decorativo -->
                <dividerDecorative />

                <!-- Description -->
                <p
                    class="text-lg md:text-xl lg:text-2xl leading-relaxed mb-4 transition-colors duration-300"
                    :class="{
                        'text-gray-700': theme === 'light',
                        'text-gray-300': theme === 'dark'
                    }"
                >
                    Damos un servicio personalizado, ponte en contacto con nosotros
                </p>

                <!-- Texto adicional sobre salud auditiva -->
                <p
                    class="text-base md:text-lg leading-relaxed max-w-2xl mx-auto transition-colors duration-300"
                    :class="{
                        'text-gray-600': theme === 'light',
                        'text-gray-400': theme === 'dark'
                    }"
                >
                    Tu bienestar auditivo es nuestra prioridad. Agenda tu cita y da el primer paso
                    hacia una mejor calidad de vida escuchando el mundo con claridad.
                </p>

                <!-- CTA icon -->
                <div class="mt-10 flex justify-center">
                    <button
                        @click="scrollToAtencion"
                        class="p-4 rounded-full animate-bounce transition-all duration-300 cursor-pointer hover:scale-110 focus:outline-none"
                        :class="{
                            'bg-primary/10 hover:bg-primary/20': theme === 'light',
                            'bg-primary/20 hover:bg-primary/30': theme === 'dark'
                        }"
                        aria-label="Ir a la sección de contacto"
                    >
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { useTheme } from '../../../../composables/useTheme';
import dividerDecorative from '@/components/general/divider-decorative.vue';

const { theme } = useTheme();

const scrollToAtencion = () => {
    const atencionSection = document.getElementById('atencion-section');
    if (atencionSection) {
        atencionSection.scrollIntoView({ 
            behavior: 'smooth',
            block: 'start'
        });
    }
};
</script>

<style scoped>
/* Soporte para dispositivos móviles donde background-attachment: fixed no funciona bien */
@supports (-webkit-touch-callout: none) {
    section {
        background-attachment: scroll !important;
    }
}

@media (max-width: 768px) {
    section {
        background-attachment: scroll !important;
    }
}
</style>