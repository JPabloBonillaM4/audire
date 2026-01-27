<template>
    <section class="py-16 sm:py-20 lg:py-28 bg-base-200">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="max-w-4xl mx-auto text-center mb-12 lg:mb-16">
                <!-- Title -->
                <h2 
                    ref="titleRef"
                    class="text-3xl sm:text-4xl lg:text-5xl font-bold text-base-content mb-6 transition-all duration-700 ease-out"
                    :class="{ 'opacity-0 -translate-y-10': !isTitleVisible, 'opacity-100 translate-y-0': isTitleVisible }"
                >
                    <span class="text-primary">TIPS</span> para la salud auditiva
                </h2>
                
                <!-- Subtitle -->
                <p 
                    ref="subtitleRef"
                    class="text-base sm:text-lg text-base-content/70 leading-relaxed max-w-3xl mx-auto transition-all duration-700 ease-out"
                    :class="{ 'opacity-0 translate-y-5': !isSubtitleVisible, 'opacity-100 translate-y-0': isSubtitleVisible }"
                >
                    360 millones de personas sufren pérdida auditiva discapacitante en todo el mundo y la mitad de los casos se podrían evitar con prevención, según datos de la OMS.
                </p>

                <!-- Decorative line -->
                <div
                    ref="lineRef"
                    class="h-1 bg-gradient-to-r from-primary via-secondary to-primary mx-auto rounded-full mt-6 transition-all duration-1000 ease-out"
                    :class="{ 'w-0 opacity-0': !isLineVisible, 'w-32 opacity-100': isLineVisible }"
                ></div>
            </div>

            <!-- Tips Grid -->
            <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                <TipCard
                    v-for="(tip, index) in tips"
                    :key="index"
                    :title="tip.title"
                    :description="tip.description"
                    :image="tip.image"
                    :url="tip.url"
                    :delay="200 + (index * 150)"
                />
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, onMounted, defineComponent } from 'vue';

const titleRef = ref(null);
const subtitleRef = ref(null);
const lineRef = ref(null);
const isTitleVisible = ref(false);
const isSubtitleVisible = ref(false);
const isLineVisible = ref(false);

const tips = ref([
    {
        title: 'Usar protectores auditivos en caso de exposición continua al ruido',
        description: 'Existen ciertos entornos laborales que exponen a los trabajadores a intensidades muy altas de ruido durante un tiempo prolongado por lo que es fundamental incidir en el uso de protectores.',
        image: '/img/tips/protection.jpeg',
        url : '/tips'
    },
    {
        title: 'Recomendaciones para limpieza de oído',
        description: 'Los expertos aconsejan limpiar solo la parte más externa del oído con una toalla o gasa. Nunca introducir objetos extraños ni los dedos para su limpieza ni rascado. Si se necesita una limpieza frecuente se aconseja que sea realizada por un especialista.',
        image: '/img/tips/ear.jpg',
        url : '/tips'
    },
    {
        title: 'Evitar los golpes',
        description: 'Hay que prestar especial cuidado a los deportes de contacto que pueden provocar traumatismos en la zona del oído y ocasionar problemas. En caso de golpe o traumatismo directo en la zona del oído se recomienda consultar al especialista.',
        image: '/img/tips/playing.jpeg',
        url : '/tips'
    }
]);

// TipCard Component
const TipCard = defineComponent({
    props: {
        title: {
            type: String,
            required: true
        },
        description: {
            type: String,
            required: true
        },
        image: {
            type: String,
            required: true
        },
        url: {
            type: String,
            required: true
        },
        delay: {
            type: Number,
            default: 0
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
                    threshold: 0.1,
                    rootMargin: '0px 0px -50px 0px'
                }
            );

            if (cardRef.value) {
                observer.observe(cardRef.value);
            }
        });

        return { cardRef, isVisible };
    },
    template: `
        <article
            ref="cardRef"
            class="group bg-base-100 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 border border-base-300 hover:border-primary/30 flex flex-col max-h-[450px]"
            :class="{ 'opacity-0 translate-y-10 scale-95': !isVisible, 'opacity-100 translate-y-0 scale-100': isVisible }"
            :style="{ transitionDelay: delay + 'ms', transitionDuration: '700ms' }"
        >
            <!-- Image Container -->
            <div class="relative h-48 sm:h-52 overflow-hidden bg-base-300">
                <img
                    :src="image"
                    :alt="title"
                    class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500"
                >
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <!-- Icon Badge -->
                <div class="absolute top-4 right-4 w-12 h-12 rounded-full bg-primary/90 backdrop-blur-sm flex items-center justify-center shadow-lg transform group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6 text-primary-content" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                    </svg>
                </div>
            </div>

            <!-- Content -->
            <div class="p-6 flex flex-col h-full">
                <!-- Title -->
                <h3 class="text-xl font-bold text-base-content mb-3 line-clamp-2 group-hover:text-primary transition-colors duration-300">
                    {{ title }}
                </h3>

                <!-- Description -->
                <p class="text-base-content/70 text-sm leading-relaxed line-clamp-4 mb-4 flex-grow">
                    {{ description }}
                </p>

                <!-- Read More Link -->
                <div class="mt-auto">
                    <a class="cursor-pointer flex items-center text-primary font-semibold text-sm group-hover:translate-x-2 transition-transform duration-300" :href="url">
                        <span>Leer más</span>
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
        </article>
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
                    setTimeout(() => {
                        isSubtitleVisible.value = true;
                    }, 200);
                    setTimeout(() => {
                        isLineVisible.value = true;
                    }, 400);
                }
            });
        },
        observerOptions
    );

    if (titleRef.value) titleObserver.observe(titleRef.value);
});
</script>

<style scoped>
.from-primary {
    --tw-gradient-from: oklch(var(--p));
}

.via-secondary {
    --tw-gradient-via: oklch(var(--s));
}

.to-primary {
    --tw-gradient-to: oklch(var(--p));
}

/* Line clamp utilities */
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-4 {
    display: -webkit-box;
    -webkit-line-clamp: 4;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>