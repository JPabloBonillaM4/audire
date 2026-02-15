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
            class="fixed top-0 right-0 bottom-0 w-72 max-w-[80vw] bg-base-100 shadow-2xl z-50 lg:hidden overflow-y-auto pb-16"
        >
            <!-- Drawer Header -->
            <div class="flex items-center justify-between p-4 border-b border-base-200">
                <a href="/" class="flex items-center">
                    <img src="/img/logos/logo_audire.png" alt="AUDIRE" class="h-8 w-auto" />
                </a>
                <button
                    @click="toggleMobileMenu"
                    class="btn btn-ghost btn-sm btn-circle"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Navigation Menu -->
            <nav class="px-4 py-6">
                <ul class="space-y-1">
                    <li v-for="(item, index) in navItems" :key="item.label">
                        <a
                            :href="item.href"
                            @click="toggleMobileMenu"
                            :class="[
                                'flex items-center gap-4 px-4 py-3.5 rounded-xl text-base font-medium transition-all duration-200',
                                currentRoute === item.name
                                    ? 'bg-primary/10 text-primary'
                                    : 'text-base-content hover:bg-base-200'
                            ]"
                        >
                            <span
                                :class="[
                                    'w-1.5 h-1.5 rounded-full transition-all duration-200',
                                    currentRoute === item.name ? 'bg-primary' : 'bg-base-300'
                                ]"
                            ></span>
                            {{ item.label }}
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Drawer Footer -->
            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-base-200 bg-base-100">
                <div class="flex items-center justify-center gap-3">
                    <a href="#" class="btn btn-ghost btn-sm btn-circle text-base-content/60 hover:text-primary">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                    <a href="#" class="btn btn-ghost btn-sm btn-circle text-base-content/60 hover:text-primary">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/>
                        </svg>
                    </a>
                    <a href="#" class="btn btn-ghost btn-sm btn-circle text-base-content/60 hover:text-primary">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                        </svg>
                    </a>
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