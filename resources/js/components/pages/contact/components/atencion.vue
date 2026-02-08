<template>
    <section id="atencion-section" ref="sectionRef" class="py-16 lg:py-24 bg-base-100 overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">

                    <!-- Left Side - Image -->
                    <div
                        ref="imageRef"
                        class="order-2 lg:order-1 transition-all duration-700 ease-out"
                        :class="{
                            'opacity-0 -translate-x-10 scale-95': !isImageVisible,
                            'opacity-100 translate-x-0 scale-100': isImageVisible
                        }"
                    >
                        <div class="relative">
                            <!-- Decorative background elements -->
                            <div class="absolute -top-4 -left-4 w-24 h-24 bg-primary/10 rounded-full blur-2xl"></div>
                            <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-secondary/10 rounded-full blur-2xl"></div>

                            <!-- Main image container -->
                            <div class="relative bg-gradient-to-br from-primary/5 to-secondary/5 rounded-3xl p-8 lg:p-12">
                                <img
                                    src="/img/logos/logo_audire.png"
                                    alt="Audire - Salud Auditiva"
                                    class="w-full max-w-xs mx-auto h-auto object-contain drop-shadow-lg transform hover:scale-105 transition-transform duration-500"
                                />

                                <!-- Floating badge -->
                                <div class="absolute -bottom-3 left-1/2 -translate-x-1/2 bg-base-100 shadow-lg rounded-full px-4 py-2 flex items-center space-x-2">
                                    <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                                    <span class="text-sm font-medium text-base-content">Disponibles para ti</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side - Content -->
                    <div
                        ref="contentRef"
                        class="order-1 lg:order-2 transition-all duration-700 ease-out"
                        :class="{
                            'opacity-0 translate-x-10': !isContentVisible,
                            'opacity-100 translate-x-0': isContentVisible
                        }"
                    >
                        <!-- Badge -->
                        <div
                            class="inline-flex items-center space-x-2 px-4 py-2 rounded-full mb-6 transition-all duration-300"
                            :class="{
                                'bg-primary/10 text-primary': true
                            }"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                            <span class="text-sm font-semibold">Atención personalizada</span>
                        </div>

                        <!-- Title -->
                        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-base-content mb-4 leading-tight">
                            Es un placer
                            <span class="text-primary">atenderte</span>
                        </h2>

                        <!-- Subtitle -->
                        <h3 class="text-xl md:text-2xl font-medium text-base-content/80 mb-6">
                            ¿En qué podemos ayudarte?
                        </h3>

                        <!-- Description -->
                        <p class="text-base md:text-lg text-base-content/70 leading-relaxed mb-8">
                            Si tienes una emergencia, duda o comentario, llámanos y te contestamos de inmediato.
                        </p>

                        <!-- Contact options -->
                        <div
                            class="space-y-4"
                            :class="{
                                'opacity-0': !isContentVisible,
                                'opacity-100': isContentVisible
                            }"
                        >
                            <component
                                :is="item.link ? 'a' : 'div'"
                                v-for="(item, index) in contactOptions"
                                :key="index"
                                :href="item.link || undefined"
                                class="flex items-center space-x-4 p-4 rounded-xl bg-base-200/50 hover:bg-base-200 transition-all duration-300 group cursor-pointer"
                                :style="{ transitionDelay: `${(index + 1) * 150}ms` }"
                                :class="{
                                    'opacity-0 translate-y-4': !isContentVisible,
                                    'opacity-100 translate-y-0': isContentVisible
                                }"
                            >
                                <div class="flex-shrink-0 w-12 h-12 rounded-full bg-gradient-to-br from-primary to-secondary flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <component :is="item.icon" class="w-6 h-6 text-white" />
                                </div>
                                <div>
                                    <p class="font-semibold text-base-content">{{ item.title }}</p>
                                    <p class="text-sm text-base-content/60">{{ item.description }}</p>
                                </div>
                                <svg class="w-5 h-5 text-primary ml-auto opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </component>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import { ref, onMounted, onUnmounted, h } from 'vue';
import { useTheme } from '../../../../composables/useTheme';

// Icon components
const PhoneIcon = {
    render() {
        return h('svg', { fill: 'none', stroke: 'currentColor', viewBox: '0 0 24 24', class: 'w-6 h-6' }, [
            h('path', { 'stroke-linecap': 'round', 'stroke-linejoin': 'round', 'stroke-width': '2', d: 'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z' })
        ]);
    }
};

const ClockIcon = {
    render() {
        return h('svg', { fill: 'none', stroke: 'currentColor', viewBox: '0 0 24 24', class: 'w-6 h-6' }, [
            h('path', { 'stroke-linecap': 'round', 'stroke-linejoin': 'round', 'stroke-width': '2', d: 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z' })
        ]);
    }
};

const HeartIcon = {
    render() {
        return h('svg', { fill: 'none', stroke: 'currentColor', viewBox: '0 0 24 24', class: 'w-6 h-6' }, [
            h('path', { 'stroke-linecap': 'round', 'stroke-linejoin': 'round', 'stroke-width': '2', d: 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z' })
        ]);
    }
};

export default {
    setup() {
        const { theme } = useTheme();
        
        const sectionRef = ref(null);
        const imageRef = ref(null);
        const contentRef = ref(null);
        const isImageVisible = ref(false);
        const isContentVisible = ref(false);
        
        let imageObserver = null;
        let contentObserver = null;

        const contactOptions = [
            {
                icon: PhoneIcon,
                title: 'Llámanos',
                description: '55 1162 1285',
                link: 'tel:5511621285'
            },
            {
                icon: ClockIcon,
                title: 'Horario extendido',
                description: 'Lunes a Sábado de 9:00 a 19:00'
            },
            {
                icon: HeartIcon,
                title: 'Atención con calidez',
                description: 'Tu bienestar auditivo es nuestra prioridad'
            }
        ];

        onMounted(() => {
            // Observer for image
            imageObserver = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            isImageVisible.value = true;
                        }
                    });
                },
                { threshold: 0.2 }
            );

            // Observer for content
            contentObserver = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            isContentVisible.value = true;
                        }
                    });
                },
                { threshold: 0.2 }
            );

            if (imageRef.value) {
                imageObserver.observe(imageRef.value);
            }
            if (contentRef.value) {
                contentObserver.observe(contentRef.value);
            }
        });

        onUnmounted(() => {
            if (imageObserver) imageObserver.disconnect();
            if (contentObserver) contentObserver.disconnect();
        });

        return {
            theme,
            sectionRef,
            imageRef,
            contentRef,
            isImageVisible,
            isContentVisible,
            contactOptions
        };
    }
}
</script>

<style scoped>
/* Animación de entrada suave */
.transition-all {
    transition-property: all;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}
</style>