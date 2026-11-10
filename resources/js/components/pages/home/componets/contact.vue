<template>
    <section id="contacto-form" class="py-16 sm:py-20 lg:py-28 bg-base-200 overflow-hidden">
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
                                        <p class="font-semibold">audirerecepcion@gmail.com</p>
                                    </div>
                                </div>
                            </div>

                            <!-- WhatsApp & Social Links -->
                            <div class="relative mt-10 pt-8 border-t border-white/20 flex flex-wrap gap-x-10 gap-y-6">
                                <!-- WhatsApp -->
                                <div>
                                    <p class="text-white/60 text-sm mb-4">WhatsApp</p>
                                    <a
                                        href="https://wa.me/525578980149?text=Hola,%20me%20gustaría%20obtener%20más%20información"
                                        target="_blank"
                                        rel="noopener"
                                        class="h-10 px-3 bg-white/20 rounded-lg inline-flex items-center space-x-2 font-semibold hover:bg-white/30 hover:scale-105 transition-all duration-300"
                                        aria-label="Escríbenos por WhatsApp"
                                    >
                                        <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                        </svg>
                                        <span>+52 55-7898-0149</span>
                                    </a>
                                </div>

                                <!-- Social Links -->
                                <div>
                                    <p class="text-white/60 text-sm mb-4">Síguenos en redes</p>
                                    <div class="flex space-x-3">
                                        <a href="https://www.facebook.com/share/1ZAD63Lteq" target="_blank" class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center hover:bg-white/30 hover:scale-110 transition-all duration-300">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                            </svg>
                                        </a>
                                        <a href="https://www.instagram.com/audire.mx" target="_blank" class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center hover:bg-white/30 hover:scale-110 transition-all duration-300">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                            </svg>
                                        </a>
                                    </div>
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
                                    <p v-if="submitError" class="text-center text-sm text-error mb-3">{{ submitError }}</p>
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
                                    <!-- Al enviar este formulario, aceptas nuestra
                                    <a href="#" class="text-primary hover:underline">política de privacidad</a>. -->
                                    Nos tomamos tu privacidad en serio. No compartiremos tu información con terceros.
                                </p>
                            </form>
                        </div>

                        <!-- Success Modal -->
                        <Teleport to="body">
                            <Transition
                                enter-active-class="transition-opacity duration-300 ease-out"
                                enter-from-class="opacity-0"
                                enter-to-class="opacity-100"
                                leave-active-class="transition-opacity duration-200 ease-in"
                                leave-from-class="opacity-100"
                                leave-to-class="opacity-0"
                            >
                                <div
                                    v-if="showSuccess"
                                    class="fixed inset-0 z-[9999] flex items-center justify-center p-4 sm:p-6 bg-base-content/60 backdrop-blur-sm"
                                    role="dialog"
                                    aria-modal="true"
                                    aria-labelledby="success-modal-title"
                                    @click.self="closeSuccess"
                                    @keydown.esc="closeSuccess"
                                    tabindex="-1"
                                >
                                    <Transition
                                        appear
                                        enter-active-class="transition-all duration-300 ease-out"
                                        enter-from-class="opacity-0 translate-y-4 scale-95"
                                        enter-to-class="opacity-100 translate-y-0 scale-100"
                                        leave-active-class="transition-all duration-200 ease-in"
                                        leave-from-class="opacity-100 translate-y-0 scale-100"
                                        leave-to-class="opacity-0 translate-y-4 scale-95"
                                    >
                                        <div
                                            v-if="showSuccess"
                                            class="relative w-full max-w-md bg-base-100 rounded-3xl shadow-2xl overflow-hidden ring-1 ring-base-300/40"
                                        >
                                            <!-- Close button -->
                                            <button
                                                type="button"
                                                class="absolute top-3 right-3 sm:top-4 sm:right-4 w-9 h-9 rounded-full flex items-center justify-center text-base-content/60 hover:text-base-content hover:bg-base-200 transition-colors duration-200 z-10"
                                                aria-label="Cerrar"
                                                @click="closeSuccess"
                                            >
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                </svg>
                                            </button>

                                            <!-- Decorative top gradient -->
                                            <div class="h-2 bg-gradient-to-r from-primary via-secondary to-primary"></div>

                                            <div class="px-6 sm:px-8 pt-8 pb-6 sm:pb-8 text-center">
                                                <!-- Icon -->
                                                <div class="relative mx-auto w-20 h-20 sm:w-24 sm:h-24 mb-5">
                                                    <div class="absolute inset-0 bg-success/20 rounded-full animate-ping-slow"></div>
                                                    <div class="relative w-full h-full bg-gradient-to-br from-success to-success/80 rounded-full flex items-center justify-center shadow-lg shadow-success/30">
                                                        <svg class="w-10 h-10 sm:w-12 sm:h-12 text-success-content" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                                        </svg>
                                                    </div>
                                                </div>

                                                <!-- Title -->
                                                <h3 id="success-modal-title" class="text-2xl sm:text-3xl font-bold text-base-content mb-3">
                                                    ¡Mensaje enviado!
                                                </h3>

                                                <!-- Message -->
                                                <p class="text-base-content/70 text-sm sm:text-base leading-relaxed mb-6">
                                                    Gracias por contactarnos. Hemos recibido tu mensaje y te responderemos lo antes posible.
                                                </p>

                                                <!-- CTA -->
                                                <button
                                                    type="button"
                                                    class="btn btn-lg w-full bg-gradient-to-r from-primary to-secondary hover:shadow-xl hover:shadow-primary/25 transform hover:scale-[1.02] active:scale-[0.98] transition-all duration-300 text-white border-none"
                                                    @click="closeSuccess"
                                                >
                                                    Entendido
                                                </button>
                                            </div>
                                        </div>
                                    </Transition>
                                </div>
                            </Transition>
                        </Teleport>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, reactive, onMounted, onUnmounted, watch } from 'vue';

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
const submitError = ref('');

let successTimeoutId = null;

const closeSuccess = () => {
    showSuccess.value = false;
    if (successTimeoutId) {
        clearTimeout(successTimeoutId);
        successTimeoutId = null;
    }
};

// Lock body scroll when modal is open
watch(showSuccess, (isOpen) => {
    if (typeof document === 'undefined') return;
    document.body.style.overflow = isOpen ? 'hidden' : '';
});

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
    submitError.value = '';

    try {
        const baseUrl = window.Laravel?.baseUrl ?? '';
        const csrfToken = window.Laravel?.csrfToken ?? '';

        await window.axios.post(`${baseUrl}/contacto/enviar`, {
            name: form.name,
            email: form.email,
            subject: form.subject,
            message: form.message,
        }, {
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
            },
        });

        showSuccess.value = true;

        // Reset form
        form.name = '';
        form.email = '';
        form.subject = '';
        form.message = '';

        // Auto-hide after 6 seconds
        if (successTimeoutId) clearTimeout(successTimeoutId);
        successTimeoutId = setTimeout(() => {
            showSuccess.value = false;
            successTimeoutId = null;
        }, 6000);
    } catch (error) {
        if (error.response?.status === 422 && error.response.data?.errors) {
            const apiErrors = error.response.data.errors;
            errors.name = apiErrors.name?.[0] ?? '';
            errors.email = apiErrors.email?.[0] ?? '';
            errors.subject = apiErrors.subject?.[0] ?? '';
            errors.message = apiErrors.message?.[0] ?? '';
        } else {
            submitError.value = 'Hubo un problema al enviar el mensaje. Inténtalo nuevamente.';
        }
    } finally {
        isSubmitting.value = false;
    }
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
    if (successTimeoutId) {
        clearTimeout(successTimeoutId);
    }
    if (typeof document !== 'undefined') {
        document.body.style.overflow = '';
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

/* Slow ping animation for success icon halo */
@keyframes ping-slow {
    0% {
        transform: scale(1);
        opacity: 0.6;
    }
    75%, 100% {
        transform: scale(1.6);
        opacity: 0;
    }
}

.animate-ping-slow {
    animation: ping-slow 1.8s cubic-bezier(0, 0, 0.2, 1) infinite;
}
</style>