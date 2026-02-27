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
                    Consejos de <span class="text-primary">Salud Auditiva</span>
                </h2>
                <dividerDecorative />
                <p
                    class="text-lg sm:text-xl max-w-3xl mx-auto mt-6 transition-colors duration-300"
                    :class="theme === 'dark' ? 'text-gray-300' : 'text-gray-700'"
                >
                    Aprende cómo cuidar tu audición con estos consejos prácticos
                </p>
            </div>

            <!-- Tips Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                <article
                    v-for="(tip, index) in tips"
                    :key="tip.id"
                    :ref="el => setTipRef(el, index)"
                    class="tip-card group relative rounded-2xl overflow-hidden shadow-lg cursor-pointer transition-all duration-500"
                    :class="[
                        theme === 'dark' ? 'bg-gray-800 hover:bg-gray-750' : 'bg-white hover:bg-gray-50',
                        { 'opacity-0 translate-y-10 scale-95': !tipVisibility[index], 'opacity-100 translate-y-0 scale-100': tipVisibility[index] }
                    ]"
                    :style="{ transitionDelay: `${index * 0.1}s` }"
                    @click="openModal(tip)"
                >
                    <!-- Tip Image -->
                    <div class="relative h-48 sm:h-56 overflow-hidden">
                        <img
                            :src="tip.image"
                            :alt="tip.title"
                            class="w-full h-full object-cover transition-all duration-500 ease-out group-hover:scale-110"
                        >
                        <!-- Overlay con gradiente -->
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"
                        ></div>
                        
                        <!-- Date Badge -->
                        <div
                            class="absolute top-4 right-4 bg-primary text-white px-3 py-1 rounded-full text-xs font-semibold shadow-lg flex items-center gap-1"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            {{ tip.date }}
                        </div>
                    </div>

                    <!-- Tip Content -->
                    <div class="p-6 sm:p-8 transition-all duration-300">
                        <!-- Title -->
                        <h3
                            class="text-xl sm:text-2xl font-bold mb-3 transition-all duration-300 group-hover:text-primary"
                            :class="theme === 'dark' ? 'text-white' : 'text-gray-900'"
                        >
                            {{ tip.title }}
                        </h3>

                        <!-- Description Preview -->
                        <p
                            class="text-sm sm:text-base leading-relaxed transition-colors duration-300 line-clamp-3"
                            :class="theme === 'dark' ? 'text-gray-400' : 'text-gray-600'"
                        >
                            {{ tip.description }}
                        </p>

                        <!-- Read More Button -->
                        <div class="mt-4 flex items-center text-primary font-semibold group-hover:gap-3 transition-all duration-300">
                            <span class="text-sm">Leer más</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform group-hover:translate-x-2 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </div>
                    </div>

                    <!-- Hover Indicator -->
                    <div
                        class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-primary via-secondary to-primary transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"
                    ></div>
                </article>
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
                        class="relative max-w-3xl w-full rounded-3xl shadow-2xl overflow-hidden max-h-[90vh] overflow-y-auto"
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

                        <!-- Modal Image -->
                        <div class="relative h-64 sm:h-80 overflow-hidden">
                            <img
                                :src="selectedTip?.image"
                                :alt="selectedTip?.title"
                                class="w-full h-full object-cover"
                            >
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                            
                            <!-- Date in modal -->
                            <div
                                class="absolute bottom-4 left-4 bg-primary text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg flex items-center gap-2"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                {{ selectedTip?.date }}
                            </div>
                        </div>

                        <!-- Modal Body -->
                        <div class="p-8 sm:p-10">
                            <h3
                                class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-6 transition-colors duration-300"
                                :class="theme === 'dark' ? 'text-white' : 'text-gray-900'"
                            >
                                {{ selectedTip?.title }}
                            </h3>
                            <p
                                class="text-base sm:text-lg leading-relaxed transition-colors duration-300"
                                :class="theme === 'dark' ? 'text-gray-300' : 'text-gray-600'"
                            >
                                {{ selectedTip?.description }}
                            </p>
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
const tipRefs = ref([]);
const tipVisibility = ref([]);

// Modal state
const isModalOpen = ref(false);
const selectedTip = ref(null);

// Tips data
const tips = ref([
    {
        id: 1,
        title: 'Usar protectores auditivos en caso de exposición continua al ruido',
        date: 'Ene. 15 2025',
        description: 'Existen ciertos entornos laborales que exponen a los trabajadores a intensidades muy altas de ruido durante un tiempo prolongado por lo que es fundamental incidir en el uso de protectores.',
        image: 'img/tips/protection.jpeg'
    },
    {
        id: 2,
        title: 'Cuidados ante el ruido',
        date: 'Mar. 22 2025',
        description: 'Se recomienda evitar los ruidos impulsivos (petardos, disparo…), alejarse de las fuentes de ruido, disminuir el ruido que generamos y reducir el tiempo de exposición a sonidos de alta intensidad. Oír música a más de 110 decibelios puede provocar pérdida auditiva precoz. Si se tienen en cuenta los criterios establecidos por la directiva europea, lo permitido en función del tiempo y volumen sería: escuchar un reproductor musical a 95 dB durante 15 minutos al día y los sonidos de una discoteca a 104 dB durante dos minutos por noche. Se deberá limitar el tiempo de exposición a reproductores de música personales (incluidos los teléfonos móviles) a 40 horas semanales si el nivel de presión es de 80 db y a 5 horas semanales en caso de 89 db.',
        image: 'img/tips/sound.jpeg'
    },
    {
        id: 3,
        title: 'Acudir al especialista',
        date: 'Jun. 08 2025',
        description: 'recomiendan consultar en caso de inflamación, dolor, taponamiento, zumbidos, secreción de oído, ya que pueden derivar en problemas de la audición. Por otra parte, es recomendable consultar en cuanto se note pérdida auditiva, aunque mínima. Algunos signos pueden ser la dificultad de seguir una conversación o la necesidad de subir el volumen de la televisión. Éstos pueden ser tratados y, en algunos casos, se puede prevenir su progresión.',
        image: 'img/tips/doctor.jpeg'
    },
    {
        id: 4,
        title: 'Revisiones periódicas',
        date: 'Sep. 17 2025',
        description: 'Es recomendable acudir a revisión de manera periódica, al menos una vez al año, si existen factores de riesgo (antecentes familiares, exposición a ambiente ruidoso…) y a partir de los 50 años, para realizar una prueba de audición.',
        image: 'img/tips/calendar.jpeg'
    },
    {
        id: 5,
        title: 'No introducir objetos o sustancias extrañas',
        date: 'Feb. 11 2025',
        description: 'se deben utilizar sólo productos indicados para el oído y siempre bajo consejo médico por lo que hay que evitar el uso de aceites, soluciones salinas, gotas, agua oxigenada, bastoncillos u otros objetos, ya que éstos últimos, pueden empujar la cera hacia adentro y dañar el tímpano.',
        image: 'img/tips/object.jpeg'
    },
    {
        id: 6,
        title: 'Recomendaciones para limpieza de oído',
        date: 'Ago. 30 2025',
        description: 'los expertos aconsejan limpiar solo la parte más externa del oído con una toalla o gasa. Nunca introducir objetos extraños ni los dedos para su limpieza ni rascado. Si se necesita una limpieza frecuente se aconseja que sea realizada por un especialista.',
        image: 'img/tips/ear.jpg'
    },
    {
        id: 7,
        title: 'No automedicarse',
        date: 'Abr. 25 2025',
        description: 'Es importante saber que el uso indiscriminado de medicamentos tanto de uso tópico como por vía oral puede ser perjudicial para los oídos, como es el caso de los antibióticos, ya que pueden generar resistencias.',
        image: 'img/tips/medicine.jpeg'
    },
    {
        id: 8,
        title: 'Recomendaciones durante el baño',
        date: 'Jul. 19 2025',
        description: 'El agua de baños públicos, ya sea de mar, pantanos o piscinas, puede estar contaminada, es por ello que es importante para prevenir infecciones cumplir unas normas de higiene y limpieza básicas antes y durante el baño (ducha y el uso de aseos). Será el especialista, valorando cada caso de forma individual, el que recomiende el uso o el no uso de tapones durante el baño.',
        image: 'img/tips/shower.jpeg'
    },
    {
        id: 9,
        title: 'Evitar los golpes',
        date: 'Oct. 05 2025',
        description: 'Hay que prestar especial cuidado a los deportes de contacto que pueden provocar traumatismos en la zona del oído y ocasionar problemas. En caso de golpe o traumatismo directo en la zona del oído se recomienda consultar al especialista.',
        image: 'img/tips/playing.jpeg'
    },
    {
        id: 10,
        title: 'Tratar de manera adecuada las otitis en los niños',
        date: 'Dic. 14 2025',
        description: 'En caso de sospecha de pérdida auditiva en un niño por parte de padres y profesores se recomienda acudir al especialista, ya que aun en ausencia de dolor, fiebre o secreción, puede existir una otitis recurrente, que de no ser bien tratada puede hacerse crónico y derivar en hipoacusia.',
        image: 'img/tips/ear2.jpeg'
    }
]);

// Modal functions
const openModal = (tip) => {
    selectedTip.value = tip;
    isModalOpen.value = true;
    document.body.style.overflow = 'hidden';
};

const closeModal = () => {
    isModalOpen.value = false;
    selectedTip.value = null;
    document.body.style.overflow = '';
};

// Set tip ref
const setTipRef = (el, index) => {
    if (el) {
        tipRefs.value[index] = el;
    }
};

// Setup Intersection Observer
onMounted(() => {
    // Initialize visibility array
    tipVisibility.value = new Array(tips.value.length).fill(false);

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

    // Observer for tip items
    const tipObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const index = tipRefs.value.indexOf(entry.target);
                    if (index !== -1) {
                        tipVisibility.value[index] = true;
                    }
                }
            });
        },
        {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        }
    );

    // Observe each tip item
    tipRefs.value.forEach((el) => {
        if (el) tipObserver.observe(el);
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

/* Tip card hover effects */
.tip-card {
    transform-origin: center;
    transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.tip-card:hover {
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
    .tip-card:hover {
        transform: translateY(-4px) scale(1.01);
    }
}

/* Reduced motion */
@media (prefers-reduced-motion: reduce) {
    .tip-card,
    .tip-card:hover,
    * {
        animation: none !important;
        transition: opacity 0.3s ease-out !important;
        transform: none !important;
    }
}
</style>