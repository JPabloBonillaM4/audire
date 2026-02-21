<template>
    <section class="py-16 sm:py-20 lg:py-28 bg-base-100 overflow-x-hidden">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-full overflow-hidden">
            <!-- Header -->
            <div class="max-w-4xl mx-auto text-center mb-12 lg:mb-16">
                <h2 
                    ref="titleRef"
                    class="text-3xl sm:text-4xl lg:text-5xl font-bold text-base-content mb-4 transition-all duration-700 ease-out"
                    :class="{ 'opacity-0 -translate-y-10': !isTitleVisible, 'opacity-100 translate-y-0': isTitleVisible }"
                >
                    Nuestras <span class="text-primary">Ubicaciones</span>
                </h2>
                <p 
                    ref="subtitleRef"
                    class="text-base sm:text-lg text-base-content/70 leading-relaxed transition-all duration-700 ease-out"
                    :class="{ 'opacity-0 translate-y-5': !isSubtitleVisible, 'opacity-100 translate-y-0': isSubtitleVisible }"
                >
                    Visítanos en cualquiera de nuestras sucursales
                </p>
            </div>

            <!-- Content -->
            <div class="max-w-7xl mx-auto w-full">
                <div class="grid grid-cols-1 lg:grid-cols-5 gap-6 lg:gap-8">
                    <!-- Locations Sidebar -->
                    <div class="lg:col-span-2 space-y-4 my-auto w-full">
                        <LocationCard
                            v-for="(location, index) in locations"
                            :key="index"
                            :location="location"
                            :isActive="activeLocation === index"
                            :delay="index * 150"
                            @click="selectLocation(index)"
                        />
                    </div>

                    <!-- Map Container -->
                    <div
                        ref="mapRef"
                        class="lg:col-span-3 transition-all duration-700 ease-out w-full"
                        :class="{ 'opacity-0 translate-x-10': !isMapVisible, 'opacity-100 translate-x-0': isMapVisible }"
                    >
                        <div class="relative h-[350px] sm:h-[450px] lg:h-[600px] rounded-2xl overflow-hidden shadow-2xl border-4 border-base-300 w-full">
                            <!-- Map iframe -->
                            <iframe
                                :src="currentMapUrl"
                                width="100%"
                                height="100%"
                                style="border:0;"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"
                                class="transition-opacity duration-500"
                            ></iframe>

                            <!-- Overlay Badge -->
                            <div class="absolute top-4 left-4 bg-base-100/95 backdrop-blur-sm rounded-xl px-4 py-2 shadow-lg border border-primary/20">
                                <p class="text-sm font-semibold text-base-content">
                                    {{ locations[activeLocation].name }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, computed, onMounted, defineComponent } from 'vue';

const titleRef = ref(null);
const subtitleRef = ref(null);
const mapRef = ref(null);
const isTitleVisible = ref(false);
const isSubtitleVisible = ref(false);
const isMapVisible = ref(false);

const activeLocation = ref(0);

const locations = ref([
    {
        name: 'Lindavista',
        address: 'Av. Lindavista 251 (2do Piso), Lindavista Norte',
        city: '07300 Ciudad de México, CDMX, México',
        phone: '55-1162-1285',
        email: 'audirerecepcion@gmail.com',
        coordinates: 'Av.+Lindavista+251,+Lindavista+Norte,+07300+Ciudad+de+México,+CDMX',
        mapUrl: 'https://maps.google.com/maps?width=100%25&height=600&hl=es&q=Av.+Lindavista+251,+Lindavista+Nte.,+Gustavo+A.+Madero,+07300+Ciudad+de+M%C3%A9xico,+CDMX&t=&z=17&ie=UTF8&iwloc=B&output=embed'
    },
    {
        name: 'Sucursal Zacatenco',
        address: 'Calz. Ticoman 221, Local 3, Col. Residencial Zacatenco',
        city: '07369 Alcaldía Gustavo A. Madero, Ciudad de México, CDMX',
        phone: '55-1162-1285',
        email: 'audirerecepcion@gmail.com',
        coordinates: 'Calz.+Ticoman+221,+Residencial+Zacatenco,+07369+Ciudad+de+México,+CDMX',
        mapUrl: 'https://maps.google.com/maps?width=100%25&height=600&hl=es&q=Calz.+Ticoman+221,+Residencial+Zacatenco,+Gustavo+A.+Madero,+07369+Ciudad+de+M%C3%A9xico,+CDMX&t=&z=17&ie=UTF8&iwloc=B&output=embed'
    }
]);

const currentMapUrl = computed(() => {
    return locations.value[activeLocation.value].mapUrl;
});

const selectLocation = (index) => {
    activeLocation.value = index;
};

// LocationCard Component
const LocationCard = defineComponent({
    props: {
        location: {
            type: Object,
            required: true
        },
        isActive: {
            type: Boolean,
            default: false
        },
        delay: {
            type: Number,
            default: 0
        }
    },
    emits: ['click'],
    setup(props, { emit }) {
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

        const handleClick = () => {
            emit('click');
        };

        return { cardRef, isVisible, handleClick };
    },
    template: `
        <div
            ref="cardRef"
            class="group bg-base-200 hover:bg-base-300 rounded-2xl p-6 transition-all duration-300 border-2 hover:shadow-xl"
            :class="[
                'transition-all duration-700 ease-out',
                { 'opacity-0 -translate-x-10': !isVisible, 'opacity-100 translate-x-0': isVisible },
                { 'border-primary shadow-lg': isActive, 'border-base-300': !isActive }
            ]"
            :style="{ transitionDelay: delay + 'ms' }"
        >
            <!-- Header -->
            <div class="flex items-start justify-between mb-4">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-primary to-secondary flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-primary-content" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-base-content">{{ location.name }}</h3>
                </div>
                <div v-if="isActive" class="w-3 h-3 rounded-full bg-primary animate-pulse"></div>
            </div>

            <!-- Address -->
            <div class="space-y-2 mb-4">
                <div class="flex items-start space-x-2">
                    <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    <div>
                        <p class="text-sm text-base-content/80">{{ location.address }}</p>
                        <p class="text-sm text-base-content/60">{{ location.city }}</p>
                    </div>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="space-y-2 pt-4 border-t border-base-300">
                <a :href="'tel:' + location.phone" class="flex items-center space-x-2 text-sm text-base-content/70 hover:text-primary transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    <span>{{ location.phone }}</span>
                </a>
                <a :href="'mailto:' + location.email" class="flex items-center space-x-2 text-sm text-base-content/70 hover:text-primary transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span>{{ location.email }}</span>
                </a>
            </div>

            <!-- Action Indicator -->
            <div class="mt-4 flex items-center text-primary text-sm font-semibold group-hover:translate-x-2 transition-transform duration-300 cursor-pointer" @click="handleClick">
                <span>Ver en mapa</span>
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </div>
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
                    setTimeout(() => {
                        isSubtitleVisible.value = true;
                    }, 200);
                }
            });
        },
        observerOptions
    );

    // Observer for map
    const mapObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    isMapVisible.value = true;
                }
            });
        },
        observerOptions
    );

    if (titleRef.value) titleObserver.observe(titleRef.value);
    if (mapRef.value) mapObserver.observe(mapRef.value);
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