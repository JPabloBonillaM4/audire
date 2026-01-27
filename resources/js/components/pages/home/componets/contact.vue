<template>
    <section class="py-16 sm:py-20 lg:py-28 bg-base-200 overflow-hidden">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">

                <!-- Header Section -->
                <div
                    ref="headerRef"
                    class="text-center mb-12 lg:mb-16 transition-all duration-700 ease-out"
                    :class="{ 'opacity-0 -translate-y-10': !isHeaderVisible, 'opacity-100 translate-y-0': isHeaderVisible }"
                >
                    <!-- Badge -->
                    <div class="inline-flex items-center space-x-2 bg-primary/10 text-primary px-4 py-2 rounded-full mb-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span class="text-sm font-semibold">Contáctanos</span>
                    </div>

                    <!-- Title -->
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-bold text-base-content mb-6">
                        ¿Tienes alguna <span class="text-primary">pregunta</span>?
                    </h2>

                    <!-- Description -->
                    <p class="text-base sm:text-lg text-base-content/70 leading-relaxed max-w-3xl mx-auto">
                        Estamos aquí para ayudarte. Completa el formulario y nos pondremos en contacto contigo lo antes posible.
                    </p>

                    <!-- Decorative line -->
                    <div
                        class="h-1 bg-gradient-to-r from-primary via-secondary to-primary mx-auto rounded-full mt-6 transition-all duration-1000 ease-out"
                        :class="{ 'w-0 opacity-0': !isHeaderVisible, 'w-32 opacity-100': isHeaderVisible }"
                    ></div>
                </div>

                <!-- Main Content Grid -->
                <div class="grid lg:grid-cols-5 gap-8 lg:gap-12 items-start">

                    <!-- Left Side - Info Card -->
                    <div
                        ref="infoRef"
                        class="lg:col-span-2 transition-all duration-700 ease-out"
                        :class="{ 'opacity-0 -translate-x-10': !isInfoVisible, 'opacity-100 translate-x-0': isInfoVisible }"
                    >
                        <div class="relative bg-gradient-to-br from-primary to-primary/80 rounded-3xl p-8 lg:p-10 text-white shadow-2xl overflow-hidden">
                            <!-- Background Pattern -->
                            <div class="absolute inset-0 opacity-10">
                                <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                                    <defs>
                                        <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
                                            <circle cx="1" cy="1" r="1" fill="white"/>
                                        </pattern>
                                    </defs>
                                    <rect width="100" height="100" fill="url(#grid)"/>
                                </svg>
                            </div>

                            <!-- Logo -->
                            <div class="relative mb-8">
                                <img
                                    src="/img/logos/logo_audire_white.png"
                                    alt="Audire Logo"
                                    class="h-12 sm:h-14 w-auto"
                                />
                            </div>

                            <!-- Title -->
                            <h3 class="relative text-2xl sm:text-3xl font-bold mb-4">
                                Información de contacto
                            </h3>
                            <p class="relative text-white/80 mb-8">
                                ¡Nos encantaría escucharte! Elige cómo prefieres comunicarte con nosotros.
                            </p>

                            <!-- Contact Info -->
                            <div class="relative space-y-6">
                                <!-- Phone -->
                                <div class="flex items-center space-x-4 group">
                                    <div class="flex-shrink-0 w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center group-hover:bg-white/30 transition-colors duration-300">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-white/60 text-sm">Teléfono</p>
                                        <p class="font-semibold">+52 55-1162-1285</p>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="flex items-center space-x-4 group">
                                    <div class="flex-shrink-0 w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center group-hover:bg-white/30 transition-colors duration-300">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-white/60 text-sm">Email</p>
                                        <p class="font-semibold">contacto@audireaudiologia.com</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Social Links -->
                            <div class="relative mt-10 pt-8 border-t border-white/20">
                                <p class="text-white/60 text-sm mb-4">Síguenos en redes</p>
                                <div class="flex space-x-3">
                                    <a href="#" class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center hover:bg-white/30 hover:scale-110 transition-all duration-300">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                        </svg>
                                    </a>
                                    <a href="#" class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center hover:bg-white/30 hover:scale-110 transition-all duration-300">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.162-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.401.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.354-.629-2.758-1.379l-.749 2.848c-.269 1.045-1.004 2.352-1.498 3.146 1.123.345 2.306.535 3.55.535 6.607 0 11.985-5.365 11.985-11.987C23.97 5.39 18.592.026 11.985.026L12.017 0z"/>
                                        </svg>
                                    </a>
                                    <a href="#" class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center hover:bg-white/30 hover:scale-110 transition-all duration-300">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>

                            <!-- Decorative circles -->
                            <div class="absolute -bottom-16 -right-16 w-48 h-48 bg-secondary/30 rounded-full blur-2xl"></div>
                            <div class="absolute -top-8 -left-8 w-32 h-32 bg-white/10 rounded-full blur-xl"></div>
                        </div>
                    </div>

                    <!-- Right Side - Contact Form -->
                    <div
                        ref="formRef"
                        class="lg:col-span-3 transition-all duration-700 ease-out"
                        :class="{ 'opacity-0 translate-x-10': !isFormVisible, 'opacity-100 translate-x-0': isFormVisible }"
                    >
                        <div class="bg-base-100 rounded-3xl p-8 lg:p-10 shadow-xl">
                            <form @submit.prevent="handleSubmit" class="space-y-6">
                                <!-- Name & Email Row -->
                                <div class="grid sm:grid-cols-2 gap-6">
                                    <!-- Name Field -->
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text text-base-content font-medium">Nombre completo</span>
                                        </label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                <svg class="w-5 h-5 text-base-content/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                                </svg>
                                            </div>
                                            <input
                                                v-model="form.name"
                                                type="text"
                                                placeholder="Tu nombre"
                                                class="input input-bordered w-full pl-12 bg-base-200/50 border-base-300 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all duration-300"
                                                :class="{ 'input-error': errors.name }"
                                                required
                                            />
                                        </div>
                                        <label v-if="errors.name" class="label">
                                            <span class="label-text-alt text-error">{{ errors.name }}</span>
                                        </label>
                                    </div>

                                    <!-- Email Field -->
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text text-base-content font-medium">Correo electrónico</span>
                                        </label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                <svg class="w-5 h-5 text-base-content/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                                </svg>
                                            </div>
                                            <input
                                                v-model="form.email"
                                                type="email"
                                                placeholder="tu@email.com"
                                                class="input input-bordered w-full pl-12 bg-base-200/50 border-base-300 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all duration-300"
                                                :class="{ 'input-error': errors.email }"
                                                required
                                            />
                                        </div>
                                        <label v-if="errors.email" class="label">
                                            <span class="label-text-alt text-error">{{ errors.email }}</span>
                                        </label>
                                    </div>
                                </div>

                                <!-- Subject Field -->
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text text-base-content font-medium">Asunto</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg class="w-5 h-5 text-base-content/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                            </svg>
                                        </div>
                                        <input
                                            v-model="form.subject"
                                            type="text"
                                            placeholder="¿En qué podemos ayudarte?"
                                            class="input input-bordered w-full pl-12 bg-base-200/50 border-base-300 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all duration-300"
                                            :class="{ 'input-error': errors.subject }"
                                            required
                                        />
                                    </div>
                                    <label v-if="errors.subject" class="label">
                                        <span class="label-text-alt text-error">{{ errors.subject }}</span>
                                    </label>
                                </div>

                                <!-- Message Field -->
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text text-base-content font-medium">Mensaje</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute top-4 left-0 pl-4 pointer-events-none">
                                            <svg class="w-5 h-5 text-base-content/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                                            </svg>
                                        </div>
                                        <textarea
                                            v-model="form.message"
                                            rows="5"
                                            placeholder="Escribe tu mensaje aquí..."
                                            class="textarea textarea-bordered w-full pl-12 pt-3 bg-base-200/50 border-base-300 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all duration-300 resize-none"
                                            :class="{ 'textarea-error': errors.message }"
                                            required
                                        ></textarea>
                                    </div>
                                    <label class="label">
                                        <span v-if="errors.message" class="label-text-alt text-error">{{ errors.message }}</span>
                                        <span class="label-text-alt text-base-content/50 ml-auto">{{ form.message.length }}/500</span>
                                    </label>
                                </div>

                                <!-- Submit Button -->
                                <div class="pt-4">
                                    <button
                                        type="submit"
                                        class="btn btn-lg w-full bg-gradient-to-r from-primary to-secondary hover:shadow-xl hover:shadow-primary/25 transform hover:scale-[1.02] active:scale-[0.98] transition-all duration-300 text-white border-none group"
                                        :disabled="isSubmitting"
                                    >
                                        <span v-if="!isSubmitting" class="flex items-center justify-center space-x-2">
                                            <span>Enviar mensaje</span>
                                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                            </svg>
                                        </span>
                                        <span v-else class="flex items-center justify-center space-x-2">
                                            <span class="loading loading-spinner loading-sm"></span>
                                            <span>Enviando...</span>
                                        </span>
                                    </button>
                                </div>

                                <!-- Privacy Note -->
                                <p class="text-center text-sm text-base-content/50">
                                    Al enviar este formulario, aceptas nuestra
                                    <a href="#" class="text-primary hover:underline">política de privacidad</a>.
                                </p>
                            </form>
                        </div>

                        <!-- Success Message -->
                        <Transition
                            enter-active-class="transition-all duration-500 ease-out"
                            enter-from-class="opacity-0 translate-y-4 scale-95"
                            enter-to-class="opacity-100 translate-y-0 scale-100"
                            leave-active-class="transition-all duration-300 ease-in"
                            leave-from-class="opacity-100 translate-y-0 scale-100"
                            leave-to-class="opacity-0 -translate-y-4 scale-95"
                        >
                            <div
                                v-if="showSuccess"
                                class="mt-6 bg-success/10 border border-success/30 rounded-2xl p-6 text-center"
                            >
                                <div class="w-16 h-16 bg-success/20 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <h4 class="text-lg font-semibold text-base-content mb-2">¡Mensaje enviado!</h4>
                                <p class="text-base-content/70">Gracias por contactarnos. Te responderemos pronto.</p>
                            </div>
                        </Transition>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, reactive, onMounted, onUnmounted } from 'vue';

// Form data
const form = reactive({
    name: '',
    email: '',
    subject: '',
    message: ''
});

// Form state
const errors = reactive({
    name: '',
    email: '',
    subject: '',
    message: ''
});

const isSubmitting = ref(false);
const showSuccess = ref(false);

// Animation refs
const headerRef = ref(null);
const infoRef = ref(null);
const formRef = ref(null);

// Visibility states
const isHeaderVisible = ref(false);
const isInfoVisible = ref(false);
const isFormVisible = ref(false);

let observer = null;

// Validation
const validateForm = () => {
    let isValid = true;

    // Reset errors
    errors.name = '';
    errors.email = '';
    errors.subject = '';
    errors.message = '';

    if (!form.name.trim()) {
        errors.name = 'El nombre es requerido';
        isValid = false;
    }

    if (!form.email.trim()) {
        errors.email = 'El email es requerido';
        isValid = false;
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(form.email)) {
        errors.email = 'Ingresa un email válido';
        isValid = false;
    }

    if (!form.subject.trim()) {
        errors.subject = 'El asunto es requerido';
        isValid = false;
    }

    if (!form.message.trim()) {
        errors.message = 'El mensaje es requerido';
        isValid = false;
    } else if (form.message.length > 500) {
        errors.message = 'El mensaje no puede exceder 500 caracteres';
        isValid = false;
    }

    return isValid;
};

// Submit handler
const handleSubmit = async () => {
    if (!validateForm()) return;

    isSubmitting.value = true;

    // Simulate API call
    await new Promise(resolve => setTimeout(resolve, 2000));

    isSubmitting.value = false;
    showSuccess.value = true;

    // Reset form
    form.name = '';
    form.email = '';
    form.subject = '';
    form.message = '';

    // Hide success message after 5 seconds
    setTimeout(() => {
        showSuccess.value = false;
    }, 5000);
};

// Intersection Observer setup
onMounted(() => {
    const options = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };

    observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                if (entry.target === headerRef.value) {
                    isHeaderVisible.value = true;
                } else if (entry.target === infoRef.value) {
                    setTimeout(() => {
                        isInfoVisible.value = true;
                    }, 200);
                } else if (entry.target === formRef.value) {
                    setTimeout(() => {
                        isFormVisible.value = true;
                    }, 400);
                }
            }
        });
    }, options);

    if (headerRef.value) observer.observe(headerRef.value);
    if (infoRef.value) observer.observe(infoRef.value);
    if (formRef.value) observer.observe(formRef.value);
});

onUnmounted(() => {
    if (observer) {
        observer.disconnect();
    }
});
</script>

<style scoped>
/* Custom animations */
@keyframes float {
    0%, 100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-10px);
    }
}

.animate-float {
    animation: float 6s ease-in-out infinite;
}

/* Form input focus effects */
.input:focus,
.textarea:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(0, 179, 164, 0.1);
}

/* Gradient text */
.gradient-text {
    background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}
</style>