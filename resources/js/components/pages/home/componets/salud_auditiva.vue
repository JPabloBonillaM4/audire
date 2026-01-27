<template>
    <section class="py-16 sm:py-20 lg:py-28 bg-base-100">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Title -->
            <div class="text-center mb-12 lg:mb-16">
                <h2
                    ref="titleRef"
                    class="text-3xl sm:text-4xl lg:text-5xl font-bold text-base-content mb-4 transition-all duration-700 ease-out"
                    :class="{ 'opacity-0 -translate-y-10': !isTitleVisible, 'opacity-100 translate-y-0': isTitleVisible }"
                >
                    Nos preocupamos por tu
                    <span class="text-primary bg-clip-text">salud auditiva</span>
                </h2>
                <div
                    ref="lineRef"
                    class="h-1 bg-gradient-to-r from-primary via-secondary to-primary mx-auto rounded-full transition-all duration-1000 ease-out"
                    :class="{ 'w-0 opacity-0': !isLineVisible, 'w-24 opacity-100': isLineVisible }"
                ></div>
            </div>

            <!-- Content Grid -->
            <div class="max-w-7xl mx-auto">
                <!-- Desktop Layout: Image Left + Cards Grid Right -->
                <div class="hidden lg:grid lg:grid-cols-5 gap-12 items-start">
                    <!-- Left Image (2 columns) -->
                    <div class="col-span-2 my-auto">
                        <div ref="imageRef" class="sticky top-24 transition-all duration-1000 ease-out" :class="{ 'opacity-0 -translate-x-10 scale-95': !isImageVisible, 'opacity-100 translate-x-0 scale-100': isImageVisible }">
                            <div class="relative h-full max-h-[550px]">
                                <!-- Decorative background circles -->
                                <div class="absolute -top-8 -left-8 w-32 h-32 bg-primary/10 rounded-full blur-3xl"></div>
                                <div class="absolute -bottom-8 -right-8 w-40 h-40 bg-secondary/10 rounded-full blur-3xl"></div>
                                <div
                                    class="absolute -inset-4 bg-gradient-to-br from-primary/20 to-secondary/20 rounded-3xl blur-2xl transition-opacity duration-1000"
                                    :class="{ 'opacity-0': !isImageVisible, 'opacity-100': isImageVisible }"
                                ></div>
                                <img
                                    src="/img/about/21.jpg"
                                    alt="Doctora especialista"
                                    class="relative w-full h-full max-h-[550px] object-cover object-top rounded-3xl shadow-2xl transform transition-all duration-500 hover:shadow-3xl"
                                >
                                <!-- Info badge -->
                                <div class="absolute bottom-6 left-6 right-6 bg-base-100/95 backdrop-blur-sm rounded-2xl p-4 shadow-xl border border-primary/20">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-primary to-secondary flex items-center justify-center">
                                            <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-bold text-primary">Profesionales Certificados</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Cards Grid (3 columns, 2x2 layout) -->
                    <div class="col-span-3 grid grid-cols-2 gap-6 max-h-[550px] content-start">
                        <FeatureCard
                            v-for="(feature, index) in allFeatures"
                            :key="index"
                            :icon="feature.icon"
                            :title="feature.title"
                            :description="feature.description"
                            :delay="100"
                            align="left"
                        />
                    </div>
                </div>

                <!-- Tablet Layout -->
                <div class="hidden md:grid md:grid-cols-2 lg:hidden gap-8 items-start">
                    <!-- Left Image -->
                    <div class="flex justify-center">
                        <div class="relative w-full max-w-md">
                            <div class="absolute -inset-4 bg-gradient-to-br from-primary/20 to-secondary/20 rounded-3xl blur-2xl"></div>
                            <img
                                src="/img/about/doctora.png"
                                alt="Doctora especialista"
                                class="relative w-full rounded-3xl shadow-2xl"
                            >
                        </div>
                    </div>

                    <!-- Right Cards -->
                    <div class="space-y-6">
                        <FeatureCard
                            v-for="(feature, index) in allFeatures"
                            :key="index"
                            :icon="feature.icon"
                            :title="feature.title"
                            :description="feature.description"
                            :delay="index * 100"
                            align="left"
                        />
                    </div>
                </div>

                <!-- Mobile Layout -->
                <div class="md:hidden">
                    <!-- Image First -->
                    <div class="flex justify-center mb-10">
                        <div class="relative w-full max-w-sm">
                            <div class="absolute -inset-4 bg-gradient-to-br from-primary/20 to-secondary/20 rounded-3xl blur-2xl"></div>
                            <img 
                                src="/img/about/doctora.png" 
                                alt="Doctora especialista" 
                                class="relative w-full rounded-3xl shadow-2xl"
                            >
                        </div>
                    </div>

                    <!-- Cards Stack -->
                    <div class="space-y-6">
                        <FeatureCard
                            v-for="(feature, index) in allFeatures"
                            :key="index"
                            :icon="feature.icon"
                            :title="feature.title"
                            :description="feature.description"
                            :delay="index * 100"
                            align="left"
                        />
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, onMounted, defineComponent, h } from 'vue';

const titleRef = ref(null);
const lineRef = ref(null);
const imageRef = ref(null);
const isTitleVisible = ref(false);
const isLineVisible = ref(false);
const isImageVisible = ref(false);

const leftFeatures = ref([
    {
        icon: 'graduation',
        title: 'ESPECIALIZACIÓN',
        description: 'Somos un centro de atención especializada para problemas de audición y alteraciones del equilibrio de tipo periférico.'
    },
    {
        icon: 'sound',
        title: 'SOLUCIONES AUDITIVAS',
        description: 'Ofrecemos soluciones auditivas de la mejor calidad con tecnología de punta y todos los avances audiológicos del mercado.'
    }
]);

const rightFeatures = ref([
    {
        icon: 'user',
        title: 'ATENCIÓN PERSONALIZADA',
        description: 'Nuestro objetivo es atender las necesidades de las personas a través de una valoración y protocolo de atención 100% personalizado.'
    },
    {
        icon: 'heart',
        title: 'LAZOS DE CONFIANZA',
        description: 'Nuestra mayor satisfacción es brindar la mejor atención a nuestros pacientes, logrando establecer una relación de confianza que perdure en el tiempo.'
    }
]);

const allFeatures = ref([...leftFeatures.value, ...rightFeatures.value]);

// FeatureCard Component using Composition API
const FeatureCard = defineComponent({
    props: {
        icon: {
            type: String,
            required: true
        },
        title: {
            type: String,
            required: true
        },
        description: {
            type: String,
            required: true
        },
        delay: {
            type: Number,
            default: 0
        },
        align: {
            type: String,
            default: 'left'
        }
    },
    setup(props) {
        const cardRef = ref(null);
        const isVisible = ref(false);

        onMounted(() => {
            const observer = new IntersectionObserver(
                (entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            isVisible.value = true;
                        }
                    });
                },
                {
                    threshold: 0.1
                }
            );

            if (cardRef.value) {
                observer.observe(cardRef.value);
            }
        });

        return { cardRef, isVisible };
    },
    template: `
        <div
            ref="cardRef"
            class="group p-6 rounded-2xl bg-base-200 hover:bg-base-300 transition-all duration-200 hover:shadow-xl border border-base-300 hover:border-primary/30"
            :class="[
                'transition-all duration-700 ease-out',
                { 'opacity-0 -translate-y-5': !isVisible, 'opacity-100 translate-y-0': isVisible },
                { 'text-right': align === 'right', 'text-left': align === 'left', 'text-center': align === 'center' }
            ]"
            :style="{ transitionDelay: delay + 'ms' }"
        >
            <!-- Icon -->
            <div class="flex mb-4" :class="{ 'justify-end': align === 'right', 'justify-start': align === 'left', 'justify-center': align === 'center' }">
                <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-primary to-secondary flex items-center justify-center transform group-hover:scale-110 transition-transform duration-200 shadow-lg">
                    <!-- Graduation Icon -->
                    <svg v-if="icon === 'graduation'" class="w-8 h-8 text-primary-content" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/>
                    </svg>

                    <!-- User Icon -->
                    <svg v-if="icon === 'user'" class="w-8 h-8 text-primary-content" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>

                    <!-- Sound Icon -->
                    <svg v-if="icon === 'sound'" class="w-8 h-8 text-primary-content" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                    </svg>

                    <!-- Heart Icon -->
                    <svg v-if="icon === 'heart'" class="w-8 h-8 text-primary-content" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </div>
            </div>

            <!-- Title -->
            <h3 class="text-lg font-bold text-base-content mb-3 uppercase tracking-wide">
                {{ title }}
            </h3>

            <!-- Description -->
            <p class="text-base-content/70 leading-relaxed">
                {{ description }}
            </p>
        </div>
    `
});

onMounted(() => {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    // Observer for title
    const titleObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    isTitleVisible.value = true;
                    // Trigger line animation after title
                    setTimeout(() => {
                        isLineVisible.value = true;
                    }, 300);
                }
            });
        },
        observerOptions
    );

    // Observer for image animation
    const imageObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    isImageVisible.value = true;
                }
            });
        },
        observerOptions
    );

    if (titleRef.value) titleObserver.observe(titleRef.value);
    if (imageRef.value) imageObserver.observe(imageRef.value);
});
</script>

<style scoped>
.from-primary {
    --tw-gradient-from: oklch(var(--p));
}

.to-secondary {
    --tw-gradient-to: oklch(var(--s));
}
</style>