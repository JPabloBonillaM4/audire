<template>
    <footer
        class="transition-colors duration-300"
        :class="theme === 'dark' ? 'bg-gray-900' : 'bg-gray-50'"
    >
        <!-- Main Footer Content -->
        <div class="container mx-auto px-4 py-12 lg:py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">

                <!-- Columna 1: Logo y Descripción -->
                <div class="space-y-4 text-center md:text-left">
                    <div class="flex items-center space-x-2 justify-center md:justify-start">
                        <img
                            src="/img/logos/logo_audire.png"
                            alt="Audire Logo"
                            class="h-20 w-auto"
                        >
                    </div>
                </div>

                <!-- Columna 2: Enlaces Rápidos -->
                <div class="text-center md:text-left">
                    <h3
                        class="text-lg font-semibold mb-4 transition-colors duration-300"
                        :class="theme === 'dark' ? 'text-white' : 'text-gray-900'"
                    >
                        Enlaces Rápidos
                    </h3>
                    <ul class="space-y-2 flex flex-col items-center md:items-start">
                        <li>
                            <a
                                href="/"
                                class="text-sm transition-colors duration-300 hover:translate-x-1 inline-block"
                                :class="theme === 'dark'
                                    ? 'text-gray-400 hover:text-blue-400'
                                    : 'text-gray-600 hover:text-blue-600'"
                            >
                                Inicio
                            </a>
                        </li>
                        <li>
                            <a
                                href="/nosotros"
                                class="text-sm transition-colors duration-300 hover:translate-x-1 inline-block"
                                :class="theme === 'dark'
                                    ? 'text-gray-400 hover:text-blue-400'
                                    : 'text-gray-600 hover:text-blue-600'"
                            >
                                Nosotros
                            </a>
                        </li>
                        <li>
                            <a
                                href="/servicios"
                                class="text-sm transition-colors duration-300 hover:translate-x-1 inline-block"
                                :class="theme === 'dark'
                                    ? 'text-gray-400 hover:text-blue-400'
                                    : 'text-gray-600 hover:text-blue-600'"
                            >
                                Servicios
                            </a>
                        </li>
                        <li>
                            <a
                                href="/contacto"
                                class="text-sm transition-colors duration-300 hover:translate-x-1 inline-block"
                                :class="theme === 'dark'
                                    ? 'text-gray-400 hover:text-blue-400'
                                    : 'text-gray-600 hover:text-blue-600'"
                            >
                                Contacto
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Columna 3: Contacto -->
                <div class="text-center md:text-left">
                    <h3
                        class="text-lg font-semibold mb-4 transition-colors duration-300"
                        :class="theme === 'dark' ? 'text-white' : 'text-gray-900'"
                    >
                        Contacto
                    </h3>
                    <ul class="space-y-3 flex flex-col items-center md:items-start">
                        <li class="flex items-start space-x-3">
                            <svg
                                class="w-5 h-5 mt-0.5 flex-shrink-0 transition-colors duration-300 text-primary"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <span
                                class="text-sm transition-colors duration-300"
                                :class="theme === 'dark' ? 'text-gray-400' : 'text-gray-600'"
                            >
                                +52 55 1162 1285
                            </span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg
                                class="w-5 h-5 mt-0.5 flex-shrink-0 transition-colors duration-300 text-primary"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span
                                class="text-sm transition-colors duration-300"
                                :class="theme === 'dark' ? 'text-gray-400' : 'text-gray-600'"
                            >
                                audirerecepcion@gmail.com
                            </span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg
                                class="w-5 h-5 mt-0.5 flex-shrink-0 transition-colors duration-300 text-primary"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span
                                class="text-sm transition-colors duration-300"
                                :class="theme === 'dark' ? 'text-gray-400' : 'text-gray-600'"
                            >
                                CDMX, México
                            </span>
                        </li>
                    </ul>
                </div>

                <!-- Columna 4: Redes Sociales -->
                <div class="text-center md:text-left">
                    <h3
                        class="text-lg font-semibold mb-4 transition-colors duration-300"
                        :class="theme === 'dark' ? 'text-white' : 'text-gray-900'"
                    >
                        Síguenos
                    </h3>
                    <div class="flex space-x-4 justify-center md:justify-start">
                        <a
                            href="https://www.facebook.com/share/1ZAD63Lteq"
                            target="_blank"
                            class="p-2 rounded-lg transition-all duration-300 hover:scale-110"
                            :class="theme === 'dark'
                                ? 'bg-gray-800 hover:bg-blue-500 text-gray-400 hover:text-white'
                                : 'bg-white hover:bg-blue-600 text-gray-600 hover:text-white shadow-sm'"
                            aria-label="Facebook"
                        >
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a
                            href="https://www.instagram.com/audire.mx"
                            target="_blank"
                            class="p-2 rounded-lg transition-all duration-300 hover:scale-110"
                            :class="theme === 'dark'
                                ? 'bg-gray-800 hover:bg-pink-600 text-gray-400 hover:text-white'
                                : 'bg-white hover:bg-pink-600 text-gray-600 hover:text-white shadow-sm'"
                            aria-label="Instagram"
                        >
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div
            class="border-t transition-colors duration-300"
            :class="theme === 'dark' ? 'border-gray-800 bg-gray-950' : 'border-gray-200 bg-white'"
        >
            <div class="container mx-auto px-4 py-6">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <!-- Copyright -->
                    <p
                        class="text-sm text-center md:text-left transition-colors duration-300"
                        :class="theme === 'dark' ? 'text-gray-500' : 'text-gray-600'"
                    >
                        Copyright © 2026 Audire all right reserved.
                    </p>

                    <!-- Powered By -->
                    <p
                        class="text-sm text-center md:text-right transition-colors duration-300"
                        :class="theme === 'dark' ? 'text-gray-500' : 'text-gray-600'"
                    >
                        Audire is proudly powered by
                        <a
                            href="http://www.bluestart.mx/"
                            class="font-semibold transition-colors duration-300"
                            :class="theme === 'dark'
                                ? 'text-blue-400 hover:text-blue-300'
                                : 'text-blue-600 hover:text-blue-700'"
                        >
                            BlueStart
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
</template>

<script setup>
import { useTheme } from '@/composables/useTheme';

const { theme } = useTheme();
</script>

<style scoped>
/* Transiciones suaves */
a, button {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
</style>