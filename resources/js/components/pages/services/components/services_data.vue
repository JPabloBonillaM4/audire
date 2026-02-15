<template>
    <section class="py-16 sm:py-20 lg:py-24 transition-colors duration-300"
                :class="theme === 'dark' ? 'bg-gray-900' : 'bg-gray-50'">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Galería de Servicios -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                <!-- Servicio Card -->
                <div
                    v-for="(service, index) in services"
                    :key="service.id"
                    :ref="el => setServiceRef(el, index)"
                    class="service-card group relative rounded-2xl overflow-hidden shadow-lg cursor-pointer"
                    :class="theme === 'dark' ? 'bg-gray-800' : 'bg-white'"
                    :style="{ transitionDelay: `${(index + 1) * 0.15}s` }"
                    @click="openModal(service)"
                >
                    <!-- Imagen con overlay -->
                    <div class="relative h-72 overflow-hidden">
                        <img
                            :src="service.image"
                            :alt="service.title"
                            class="w-full h-full object-contain p-8 transition-all duration-500 ease-out group-hover:scale-110"
                            :class="theme === 'dark' ? 'bg-gray-700' : 'bg-gray-50'"
                        >
                        <!-- Overlay con gradiente -->
                        <div
                            class="absolute inset-0 bg-gradient-overlay opacity-0 group-hover:opacity-100 transition-opacity duration-500 ease-out"
                        ></div>
                    </div>

                    <!-- Contenido -->
                    <div class="p-6 sm:p-8 transition-all duration-300">
                        <h4
                            class="text-xl sm:text-2xl font-bold mb-3 text-primary transition-all duration-300 group-hover:translate-x-2"
                            :class="{ 'mb-4': !service.subtitle }"
                        >
                            {{ service.title }}
                        </h4>

                        <!-- Subtítulo opcional -->
                        <p
                            v-if="service.subtitle"
                            class="text-sm sm:text-base font-semibold mb-4 transition-colors duration-300"
                            :class="theme === 'dark' ? 'text-gray-300' : 'text-gray-700'"
                        >
                            {{ service.subtitle }}
                        </p>

                        <!-- Descripción (string o array) -->
                        <div
                            v-if="typeof service.description === 'string'"
                            class="text-xs sm:text-sm leading-relaxed transition-colors duration-300 text-justify"
                            :class="theme === 'dark' ? 'text-gray-400' : 'text-gray-600'"
                        >
                            {{ service.description }}
                        </div>

                        <!-- Descripción detallada (array) -->
                        <div
                            v-else
                            class="text-xs sm:text-sm leading-relaxed transition-colors duration-300 text-justify"
                            :class="theme === 'dark' ? 'text-gray-400' : 'text-gray-600'"
                        >
                            <p
                                v-for="(item, idx) in service.description"
                                :key="idx"
                                :class="{ 'mb-3': idx < service.description.length - 1 }"
                            >
                                <span v-if="typeof item === 'string'">{{ item }}</span>
                                <strong v-else :class="`text-${item.type}`">{{ item.label }}</strong> {{ item.text }}
                            </p>
                        </div>
                    </div>

                    <!-- Indicador de hover -->
                    <div
                        class="absolute top-4 right-4 w-10 h-10 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300 transform scale-0 group-hover:scale-100"
                        :class="`bg-${service.iconColor}`"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </div>
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
                        class="relative max-w-lg w-full rounded-3xl shadow-2xl overflow-hidden"
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

                        <!-- Modal Header -->
                        <div class="p-8 sm:p-10">
                            <div class="text-center mb-6">
                                <h3
                                    class="text-2xl sm:text-3xl font-bold mb-3 transition-colors duration-300"
                                    :class="theme === 'dark' ? 'text-white' : 'text-gray-900'"
                                >
                                    {{ selectedService?.title }}
                                </h3>
                                <p
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

// Estado del modal
const isModalOpen = ref(false);
const selectedService = ref(null);

// Funciones del modal
const openModal = (service) => {
    selectedService.value = service;
    isModalOpen.value = true;
    document.body.style.overflow = 'hidden';
};

const closeModal = () => {
    isModalOpen.value = false;
    selectedService.value = null;
    document.body.style.overflow = '';
};

// Datos de los servicios
const services = ref([
    {
        id: 0,
        title: 'Consulta especializada en audiología',
        subtitle: null,
        description: 'Realizando la valoración a pacientes de todas las edades con discapacidad auditiva (cualquier grado de pérdida auditiva o sordera), acufeno (zumbido o ruido en los oídos) y cualquier otro síntoma audiológico para establecer el diagnóstico, tratamiento médico o rehabilitatorio.',
        image: '/img/logos/logo_audire.png',
        iconColor: 'secondary'
    },
    {
        id: 1,
        title: 'Acúfenometria',
        subtitle: 'Medición de los acúfenos en tono (frecuencia), intensidad y tipo.',
        description: [
            {
                label: 'Nivel mínimo de enmascaramiento (NME):',
                text: 'Es la intensidad mínima de sonido necesaria para que el paciente deje de oír su acúfeno. Puede hacerse de forma uni o bilateral.',
                type: 'primary'
            },
            {
                label: 'Inhibición Residual:',
                text: 'Sometemos al paciente durante 1 minuto a un ruido blanco, que es la suma de todas las frecuencias, 10 dB por encima de su NME, con el fin de comprobar si se produce una supresión temporal o desaparición consciente del acúfeno después de este periodo de enmascaramiento.',
                type: 'secondary'
            }
        ],
        image: '/img/logos/logo_audire.png',
        iconColor: 'primary'
    },
    {
        id: 2,
        title: 'Terapia de re-entrenamiento del tinnitus (acúfeno)',
        subtitle: null,
        description: 'La Terapia de Reentrenamiento de Tinnitus o Acúfenos (TRT) consiste en aprender a sobrellevar el tinnitus tanto consciente como subconscientemente. Esta técnica ha ayudado a muchas personas. La TRT requiere una estrecha cooperación entre los profesionales en audición. La terapia se aplica en el lugar donde se percibe el tinnitus, y se intenta reeducar al cerebro para que lo ignore.',
        image: '/img/logos/logo_audire.png',
        iconColor: 'secondary'
    },
    {
        id: 3,
        title: 'Audiometría tonal liminar',
        subtitle: null,
        description: 'El objetivo de esta prueba es localizar el umbral auditivo de un oído para cada una de las frecuencias estudiadas, es decir, la intensidad más baja a la que el oído percibe el sonido en dichas frecuencias.',
        image: '/img/logos/logo_audire.png',
        iconColor: 'primary'
    },
    {
        id: 4,
        title: 'Audiometría tonal liminar',
        subtitle: null,
        description: 'El objetivo de esta prueba es localizar el umbral auditivo de un oído para cada una de las frecuencias estudiadas, es decir, la intensidad más baja a la que el oído percibe el sonido en dichas frecuencias.',
        image: '/img/logos/logo_audire.png',
        iconColor: 'primary'
    },
    {
        id: 5,
        title: 'Audiometría verbal o logoaudiometría',
        subtitle: null,
        description: [
            'La audiometría verbal o logoaudiometría es todo estudio de la audición en el que los estímulos a los que se ha de responder son señales verbales. Su objetivo es determinar la capacidad de una persona para percibir el lenguaje hablado.',
            'En la adaptación protésica es imprescindible tanto para la selección de las características del auxiliar auditivo como para la comprobación de la calidad de la adaptación.'
        ],
        image: '/img/logos/logo_audire.png',
        iconColor: 'primary'
    },
    {
        id: 6,
        title: 'Impedanciometría',
        subtitle: null,
        description: 'Es una de las pruebas auditivas que complementan a la audiometría. A través de esta prueba conocemos cómo se encuentra el oído medio y cómo se comporta ante los sonidos y las presiones. Se divide en dos partes: en primer lugar, una timpanometría donde se evalúa la movilidad del tímpano y el reflejo estapedial como segundo paso, para comprobar la contracción del músculo del estribo ante un sonido muy fuerte.',
        image: '/img/logos/logo_audire.png',
        iconColor: 'primary'
    },
    {
        id: 7,
        title: 'Tamiz auditivo neonatal',
        subtitle: null,
        description: [
            'De acuerdo con la Organización Mundial de la Salud, la hipoacusia es la discapacidad sensorial de mayor prevalencia por lo que ésta prueba debe realizarse a todos los recién nacidos, cuyo objetivo es favorecer el diagnóstico e intervención antes de los seis meses de edad. El diagnóstico temprano, el seguimiento médico y el tratamiento oportuno son trascendentales pues impactan en la adquisición y desarrollo del lenguaje y del habla así como en el desarrollo cognitivo y psicosocial.',
            'Es una prueba rápida y no dolorosa a través de una sonda que se coloca en el oído del bebé.'
        ],
        image: '/img/logos/logo_audire.png',
        iconColor: 'primary'
    },
    {
        id: 8,
        title: 'Tamiz auditivo neonatal',
        subtitle: null,
        description: [
            'De acuerdo con la Organización Mundial de la Salud, la hipoacusia es la discapacidad sensorial de mayor prevalencia por lo que ésta prueba debe realizarse a todos los recién nacidos, cuyo objetivo es favorecer el diagnóstico e intervención antes de los seis meses de edad. El diagnóstico temprano, el seguimiento médico y el tratamiento oportuno son trascendentales pues impactan en la adquisición y desarrollo del lenguaje y del habla así como en el desarrollo cognitivo y psicosocial.',
            'Es una prueba rápida y no dolorosa a través de una sonda que se coloca en el oído del bebé.'
        ],
        image: '/img/logos/logo_audire.png',
        iconColor: 'primary'
    },
    {
        id: 9,
        title: 'Adaptación y programación de auxiliares auditivos',
        subtitle: null,
        description: [
            'La elección del tipo de tecnología auditiva es crítica para cada paciente en cualquier etapa de la vida desde 1 mes de edad o hasta adultos mayores. Tomando en cuenta el grado de pérdida auditiva, su causa, tiempo de evolución así como características anatómicas, entre otros. Las actividades cotidianas, el entorno que se desarrollan serán consideradas también para poder cubrir la demanda que cada paciente necesita, esto es de suma importancia para elegir el aparato o tecnología auditiva ideal para cada paciente.',
            'Disponemos de diferentes gamas de tecnología con diferentes prestaciones. Así, cuanto mejor sea la tecnología del audífono mejor será la calidad de la audición y mayor la comprensión del habla.'
        ],
        image: '/img/logos/logo_audire.png',
        iconColor: 'primary'
    },
    {
        id: 10,
        title: 'Consulta especializada en otoneurología',
        subtitle: null,
        description: [
            'Valoración y estudio clínico de las enfermedades del oído interno referente al sistema vestibular del equilibrio y la audición. El sistema vestibular se encarga de coordinar el equilibrio y postura.',
            'El vértigo es una sensación subjetiva de movimiento, generalmente de tipo rotatorio o de desplazamiento del cuerpo o de los objetos situados a su alrededor. Debe diferenciarse del mareo, que consiste en una sensación de desequilibrio e inestabilidad, algo parecido a la ebriedad, mientras que el vértigo provoca en el paciente una impresión de movimiento o giro, que puede ser pasajera, durar horas o incluso días. Es de esta manera como la Otoneurología se encarga, entre otros, de los problemas derivados de la alteración de estos sistemas de informaron e integradores para proporcionar al individuo una postura y equilibrio adecuados.'
        ],
        image: '/img/logos/logo_audire.png',
        iconColor: 'primary'
    },
    {
        id: 11,
        title: 'Consulta especializada en otoneurología',
        subtitle: null,
        description: [
            'Valoración y estudio clínico de las enfermedades del oído interno referente al sistema vestibular del equilibrio y la audición. El sistema vestibular se encarga de coordinar el equilibrio y postura.',
            'El vértigo es una sensación subjetiva de movimiento, generalmente de tipo rotatorio o de desplazamiento del cuerpo o de los objetos situados a su alrededor. Debe diferenciarse del mareo, que consiste en una sensación de desequilibrio e inestabilidad, algo parecido a la ebriedad, mientras que el vértigo provoca en el paciente una impresión de movimiento o giro, que puede ser pasajera, durar horas o incluso días. Es de esta manera como la Otoneurología se encarga, entre otros, de los problemas derivados de la alteración de estos sistemas de informaron e integradores para proporcionar al individuo una postura y equilibrio adecuados.'
        ],
        image: '/img/logos/logo_audire.png',
        iconColor: 'primary'
    },
    {
        id: 12,
        title: 'Rehabilitación vestibular',
        subtitle: null,
        description: [
            'Consiste en ejercicios que aceleran la compensación laberíntica, aumentando y/o mejorando la actividad de los otros dos sistemas que intervienen en el sistema del equilibrio. Es un programa de ejercicios de aplicación no invasiva, de fácil realización en el hogar, que ha demostrado ser efectiva en la disminución de la inestabilidad, con lo cual se recobran gran parte de las actividades del diario vivir.',
            'Cada programa de rehabilitación vestibular es personalizado para cada uno de nuestros pacientes y se lleva estrecho seguimiento en la consulta.'
        ],
        image: '/img/logos/logo_audire.png',
        iconColor: 'primary'
    },
    {
        id: 13,
        title: 'Rehabilitación vestibular',
        subtitle: 'La mayor parte del tiempo, nuestros canales auditivos se limpian a sí mismos.',
        description: [
            'El cerumen usualmente no causa problemas, pero si se produce en exceso puede causar un bloqueo que puede causar dolor o causar la pérdida de la audición mientras no se retire el taponamiento.',
            'Si tienes un problema persistente con el cerumen, a través de una técnica segura y efectiva podremos eliminar bloqueos persistentes.'
        ],
        image: '/img/logos/logo_audire.png',
        iconColor: 'primary'
    },
    {
        id: 14,
        title: 'Clinica de acúfeno',
        subtitle: 'Contamos con una clínica de acúfeno y otras percepciones auditivas anómalas.',
        description: null,
        image: '/img/clinica/acufeno.png',
        iconColor: 'primary'
    }
]);

// Referencias para las animaciones
const serviceRefs = ref([]);

const setServiceRef = (el, index) => {
    if (el) {
        serviceRefs.value[index] = el;
    }
};

// Configurar Intersection Observer para animaciones de entrada
onMounted(() => {
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                }
            });
        },
        {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        }
    );

    // Observar cada tarjeta de servicio
    serviceRefs.value.forEach((el) => {
        if (el) observer.observe(el);
    });
});
</script>

<style scoped>
/* Colores personalizados */
.text-primary {
    color: var(--color-primary);
}

.text-secondary {
    color: var(--color-secondary);
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

/* Gradiente overlay para imágenes */
.bg-gradient-overlay {
    background: linear-gradient(
        135deg,
        rgb(from var(--color-primary) r g b / 0.7) 0%,
        rgb(from var(--color-secondary) r g b / 0.6) 100%
    );
}

/* Transiciones suaves globales */
* {
    transition-property: all;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}

/* Animaciones de entrada para las tarjetas de servicio */
.service-card {
    opacity: 0;
    transform: translateY(30px) scale(0.95);
    transition: opacity 0.6s cubic-bezier(0.34, 1.56, 0.64, 1),
                transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1),
                box-shadow 0.4s ease-out;
}

.service-card.animate-in {
    opacity: 1;
    transform: translateY(0) scale(1);
}

/* Efectos hover fluidos para cards tipo galería */
.service-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15),
                0 0 0 1px rgb(from var(--color-primary) r g b / 0.1);
}

/* Animación suave para el contenido al hacer hover */
.service-card:hover .p-6,
.service-card:hover .p-8 {
    transform: translateY(-2px);
}

/* Animación keyframes para entrada inicial */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px) scale(0.95);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

.service-card.animate-in {
    animation: fadeInUp 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
}

/* Estilos para imágenes en modo galería */
.service-card img {
    filter: grayscale(0%) brightness(1);
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
}

.service-card:hover img {
    filter: grayscale(0%) brightness(1.05);
    transform: scale(1.1) rotate(2deg);
}

/* Indicador de hover */
.service-card .absolute.top-4 {
    transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

/* Optimización de animaciones para dispositivos móviles */
@media (max-width: 768px) {
    .service-card {
        transform: translateY(20px) scale(0.98);
    }
    
    .service-card:hover {
        transform: translateY(-4px) scale(1.01);
    }
    
    .service-card:hover img {
        transform: scale(1.08);
    }
}

/* Reducir movimiento para usuarios con preferencias de accesibilidad */
@media (prefers-reduced-motion: reduce) {
    .service-card,
    .service-card.animate-in,
    .service-card:hover,
    .service-card img,
    * {
        animation: none !important;
        transition: opacity 0.3s ease-out !important;
        transform: none !important;
    }
}

/* Mejora visual para modo oscuro */
@media (prefers-color-scheme: dark) {
    .service-card:hover {
        box-shadow: 0 20px 40px rgba(0, 179, 164, 0.2),
                    0 0 0 1px rgb(from var(--color-primary) r g b / 0.3);
    }
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
</style>