<template>
    <section class="py-16 lg:py-24 bg-gradient-to-br from-base-200 to-base-100 overflow-x-hidden">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-full overflow-hidden">
            <div class="max-w-6xl mx-auto">
                <!-- Header -->
                <div ref="headerRef" class="text-center mb-12 transition-all duration-700 ease-out" :class="{ 'opacity-0 translate-y-10': !isHeaderVisible, 'opacity-100 translate-y-0': isHeaderVisible }">
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-base-content mb-4">
                        Agenda tu cita con nuestros
                        <span class="text-primary">especialistas</span>
                    </h2>
                    <p class="text-lg text-base-content/70 max-w-2xl mx-auto">
                        Reserva tu consulta de forma rápida y segura a través de Doctoralia
                    </p>
                </div>

                <!-- Main Content -->
                <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center">
                    <!-- Left Side - Info (order-2 en mobile, order-1 en lg) -->
                    <div ref="featuresRef" class="space-y-6 order-2 lg:order-1">
                        <div v-for="(feature, index) in features" :key="index" class="flex items-start space-x-4 transition-all duration-700 ease-out" :class="{ 'opacity-0 -translate-x-10': !isFeaturesVisible, 'opacity-100 translate-x-0': isFeaturesVisible }" :style="{ transitionDelay: `${index * 150}ms` }">
                            <div class="flex-shrink-0 w-12 h-12 rounded-full flex items-center justify-center" :class="feature.bgColor">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" :d="feature.icon"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-base-content mb-2">{{ feature.title }}</h3>
                                <p class="text-base-content/70">{{ feature.description }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side - CTA Card (order-1 en mobile, order-2 en lg) -->
                    <div ref="ctaRef" class="relative transition-all duration-700 ease-out order-1 lg:order-2" :class="{ 'opacity-0 translate-x-10': !isCtaVisible, 'opacity-100 translate-x-0': isCtaVisible }">
                        <div class="bg-base-100 rounded-2xl shadow-2xl p-6 sm:p-8 lg:p-10 border-t-4 border-primary">
                            <!-- Doctoralia Logo Placeholder -->
                            <div class="flex items-center justify-center mb-6">
                                <div class="text-2xl font-bold text-base-content/80">
                                    <span class="text-primary">Doctoralia</span>
                                </div>
                            </div>

                            <div class="space-y-6">
                                <!-- CTA Button -->
                                <a @click.prevent="handleBooking" class="block w-full bg-gradient-to-r from-primary to-secondary cursor-pointer hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300 text-white text-center py-4 px-6 rounded-xl font-semibold text-lg">
                                    Agenda tu cita ahora
                                </a>

                                <!-- Additional Info -->
                                <div class="flex items-center justify-center space-x-2 text-sm text-base-content/60">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                    <span>Reserva 100% segura y confidencial</span>
                                </div>
                            </div>
                        </div>

                        <!-- Decorative Elements -->
                        <div class="absolute -top-4 right-0 sm:-right-4 w-24 h-24 bg-secondary opacity-10 rounded-full blur-2xl"></div>
                        <div class="absolute -bottom-4 left-0 sm:-left-4 w-32 h-32 bg-primary opacity-10 rounded-full blur-2xl"></div>
                    </div>
                </div>

                <!-- Trust Badges -->
                <div ref="badgesRef" class="mt-16 pt-12 border-t border-base-300 transition-all duration-700 ease-out" :class="{ 'opacity-0 translate-y-10': !isBadgesVisible, 'opacity-100 translate-y-0': isBadgesVisible }">
                    <div class="flex flex-wrap justify-center items-center gap-8 text-base-content/50">
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-sm">Profesionales Certificados</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-sm">Atención Inmediata</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"/>
                                <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z"/>
                            </svg>
                            <span class="text-sm">Soporte 24/7</span>
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
    {
        title: 'Evaluación Auditiva Completa',
        description: 'Diagnóstico profesional con tecnología de última generación para evaluar tu salud auditiva.',
        icon: 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
        bgColor: 'bg-primary'
    },
    {
        title: 'Especialistas Certificados',
        description: 'Equipo de audiólogos y otoneurologos con amplia experiencia en salud auditiva.',
        icon: 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z',
        bgColor: 'bg-secondary'
    },
    {
        title: 'Horarios Flexibles',
        description: 'Agenda tu cita en el horario que mejor se adapte a tus necesidades, incluyendo fines de semana.',
        icon: 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
        bgColor: 'bg-primary'
    }
]);

// Referencias para elementos animados
const headerRef = ref(null);
const featuresRef = ref(null);
const ctaRef = ref(null);
const badgesRef = ref(null);

// Estados de visibilidad
const isHeaderVisible = ref(false);
const isFeaturesVisible = ref(false);
const isCtaVisible = ref(false);
const isBadgesVisible = ref(false);

let observer = null;

const handleBooking = () => {
    window.open('https://www.doctoralia.com.mx/clinicas/audire-audiologia-salud-y-bienestar-auditivo?saasonly=true&utm_id=24469&utm_source=widget-facility-24469&utm_medium=facility-big&utm_campaign=&utm_content=#highlight-calendar', '_blank');
};

onMounted(() => {
    // Configurar Intersection Observer
    const options = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1 // El elemento es visible cuando al menos el 10% está en viewport
    };

    observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                // Determinar qué elemento se está observando
                if (entry.target === headerRef.value) {
                    isHeaderVisible.value = true;
                } else if (entry.target === featuresRef.value) {
                    isFeaturesVisible.value = true;
                } else if (entry.target === ctaRef.value) {
                    isCtaVisible.value = true;
                } else if (entry.target === badgesRef.value) {
                    isBadgesVisible.value = true;
                }
            }
        });
    }, options);

    // Observar elementos cuando estén disponibles
    if (headerRef.value) observer.observe(headerRef.value);
    if (featuresRef.value) observer.observe(featuresRef.value);
    if (ctaRef.value) observer.observe(ctaRef.value);
    if (badgesRef.value) observer.observe(badgesRef.value);
});

onUnmounted(() => {
    // Limpiar observer
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

.border-primary {
    border-color: var(--color-primary);
}
</style>