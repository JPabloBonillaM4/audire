<script setup>
import { useTheme } from '@/composables/useTheme';
import { ref, onMounted, onUnmounted } from 'vue';

const { theme, setTheme } = useTheme();
const isMobileMenuOpen = ref(false);
const isScrolled = ref(false);
const currentRoute = window.Laravel.currentRoute;

const toggleTheme = () => {
    setTheme(theme.value === 'light' ? 'dark' : 'light')
}

const toggleMobileMenu = () => {
    isMobileMenuOpen.value = !isMobileMenuOpen.value
}

const handleScroll = () => {
    isScrolled.value = window.scrollY > 20
}

onMounted(() => {
    window.addEventListener('scroll', handleScroll)
})

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll)
})

const navItems = [
    { label: 'Home', name: 'home', href: '/' },
    { label: 'Nosotros', name: 'about-us', href: '/nosotros' },
    { label: 'Servicios', name: 'services', href: '/servicios' },
    { label: 'Productos', name: 'products', href: '/productos' },
    { label: 'Tips', name: 'tips', href: '/tips' },
    { label: 'Contacto', name: 'contact', href: '/contacto' }
]
</script>

<template>
    <!-- Navbar Fixed -->
    <nav
        class="navbar fixed top-0 left-0 right-0 z-50 px-4 lg:px-8 animate-slide-down transition-all duration-500 ease-in-out"
        :class="{
            'min-h-16 bg-base-100 shadow-md': isScrolled,
            'min-h-24 bg-transparent': !isScrolled
        }"
    >
        <div class="navbar-start">
            <!-- Logo -->
            <a href="/" class="flex items-center gap-2">
                <img
                    :src="isScrolled || currentRoute != 'home' ? '/img/logos/logo_audire.png' : '/img/logos/logo_audire_white.png'"
                    alt="AUDIRE"
                    class="w-auto transition-all duration-500 ease-in-out"
                    :class="isScrolled ? 'h-8' : currentRoute == 'home' ? 'h-12 lg:h-24' : 'h-12'"
                />
            </a>
        </div>
        <!-- Desktop Menu -->
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1 gap-2" :class="{ 'menu-home': currentRoute == 'home' && !isScrolled }">
                <li v-for="item in navItems" :key="item.label">
                    <a :href="item.href" :class="['text-base font-medium', currentRoute === item.name ? 'btn-navbar-active' : '', (isScrolled || currentRoute != 'home') ? (currentRoute === item.name ? 'text-primary' : '') : 'text-white']">
                        {{ item.label }}
                    </a>
                </li>
            </ul>
        </div>

        <div class="navbar-end gap-2">
            <!-- Theme Toggle Button -->
            <button
                @click="toggleTheme"
                class="btn btn-circle btn-ghost swap swap-rotate "
                :class="{ 'swap-active': theme === 'dark', 'text-white' : currentRoute == 'home' && !isScrolled }"
            >
                <!-- Sun icon -->
                <svg class="swap-off fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z"/>
                </svg>
                <!-- Moon icon -->
                <svg class="swap-on fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z"/>
                </svg>
            </button>

            <!-- Mobile Menu Button -->
            <button
                @click="toggleMobileMenu"
                class="btn btn-square btn-ghost lg:hidden"
            >
                <svg
                    v-if="!isMobileMenuOpen"
                    xmlns="http://www.w3.org/2000/svg"
                    :class="['h-6 w-6', currentRoute == 'home' && !isScrolled ? 'text-white' : 'text-base-content']"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg
                    v-else
                    xmlns="http://www.w3.org/2000/svg"
                    :class="['h-6 w-6', currentRoute == 'home' && !isScrolled ? 'text-white' : 'text-base-content']"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </nav>

    <!-- Mobile Menu Drawer -->
    <!-- Backdrop -->
    <Transition
        enter-active-class="transition-opacity duration-300 ease-out"
        enter-from-class="opacity-0"
        enter-to-class="opacity-100"
        leave-active-class="transition-opacity duration-200 ease-in"
        leave-from-class="opacity-100"
        leave-to-class="opacity-0"
    >
        <div
            v-if="isMobileMenuOpen"
            @click="toggleMobileMenu"
            class="fixed inset-0 bg-black/50 backdrop-blur-sm z-40 lg:hidden"
        ></div>
    </Transition>

    <!-- Drawer -->
    <Transition
        enter-active-class="transition-transform duration-300 ease-out"
        enter-from-class="translate-x-full"
        enter-to-class="translate-x-0"
        leave-active-class="transition-transform duration-200 ease-in"
        leave-from-class="translate-x-0"
        leave-to-class="translate-x-full"
    >
        <div
            v-if="isMobileMenuOpen"
            class="fixed top-0 right-0 bottom-0 w-80 max-w-[85vw] bg-base-100 shadow-2xl z-50 lg:hidden overflow-y-auto"
        >
            <!-- Drawer Header -->
            <div class="sticky top-0 bg-gradient-to-r from-primary to-secondary p-6 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img src="/img/logos/logo_audire_white.png" alt="AUDIRE" class="h-10 w-auto" />
                </div>
                <button
                    @click="toggleMobileMenu"
                    class="btn btn-circle btn-ghost btn-sm text-white hover:bg-white/20"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Navigation Menu -->
            <ul class="menu menu-vertical p-0 mt-2">
                <li v-for="(item, index) in navItems" :key="item.label" class="border-b border-gray-100 last:border-b-0">
                    <a
                        :href="item.href"
                        @click="toggleMobileMenu"
                        :class="[
                            'group px-6 py-4 text-base font-medium transition-all duration-300 flex items-center justify-between hover:bg-primary/5 rounded-none',
                            currentRoute === item.name ? 'bg-primary/10 text-primary font-semibold' : 'text-gray-700'
                        ]"
                        :style="{ animationDelay: `${index * 50}ms` }"
                    >
                        <span class="flex items-center gap-3">
                            <!-- Animated dot indicator -->
                            <span 
                                :class="[
                                    'w-2 h-2 rounded-full transition-all duration-300',
                                    currentRoute === item.name 
                                        ? 'bg-primary scale-100' 
                                        : 'bg-gray-300 scale-0 group-hover:scale-100 group-hover:bg-primary'
                                ]"
                            ></span>
                            {{ item.label }}
                        </span>
                        <!-- Arrow icon -->
                        <svg 
                            class="w-5 h-5 text-gray-400 group-hover:text-primary group-hover:translate-x-1 transition-all duration-300" 
                            :class="currentRoute === item.name ? 'text-primary' : ''"
                            fill="none" 
                            stroke="currentColor" 
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </li>
            </ul>

            <!-- Drawer Footer -->
            <div class="p-6 mt-4 border-t border-gray-200">
                <div class="text-center">
                    <p class="text-sm text-gray-500 mb-4">Síguenos en redes sociales</p>
                    <div class="flex justify-center gap-4">
                        <a href="#" class="btn btn-circle btn-ghost hover:bg-primary hover:text-white transition-all">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="#" class="btn btn-circle btn-ghost hover:bg-primary hover:text-white transition-all">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073z"/>
                            </svg>
                        </a>
                        <a href="#" class="btn btn-circle btn-ghost hover:bg-primary hover:text-white transition-all">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </Transition>

    <!-- Spacer para compensar el navbar fixed -->
    <div class="h-24" v-if="currentRoute != 'home'"></div>
</template>

<style scoped>
@keyframes slide-down {
    from {
        transform: translateY(-100%);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

.animate-slide-down {
    animation: slide-down 0.75s ease-out;
}

/* Estilo para link activo del navbar */
.btn-navbar-active {
    position: relative;
    font-weight: 600;
}

.btn-navbar-active::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, #00B3A4 0%, #A4D65E 100%);
    border-radius: 2px;
    animation: expand-underline 0.3s ease-out;
}

/* Efecto hover para los links del navbar */
.menu a {
    position: relative;
}

.menu a::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 50%;
    transform: translateX(-50%) scaleX(0);
    width: 100%;
    height: 3px;
    background: linear-gradient(90deg, #00B3A4 0%, #A4D65E 100%);
    border-radius: 2px;
    transition: transform 0.3s ease-out;
}

/* Hover blanco cuando estamos en home */
.menu-home a::after {
    background: white;
}

.menu a:hover::after {
    transform: translateX(-50%) scaleX(1);
}

/* El link activo mantiene la línea siempre visible */
.btn-navbar-active::after {
    transform: translateX(-50%) scaleX(1) !important;
}

@keyframes expand-underline {
    from {
        transform: translateX(-50%) scaleX(0);
        opacity: 0;
    }
    to {
        transform: translateX(-50%) scaleX(1);
        opacity: 1;
    }
}

/* Efecto de pulso suave para el link activo */
.btn-navbar-active {
    animation: subtle-pulse 2s ease-in-out infinite;
}

@keyframes subtle-pulse {
    0%, 100% {
        text-shadow: 0 0 0 rgba(0, 179, 164, 0);
    }
    50% {
        text-shadow: 0 0 8px rgba(0, 179, 164, 0.3);
    }
}
</style>