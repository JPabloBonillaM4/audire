<template>
    <Transition name="fade">
        <div v-if="isLoading" class="loader-overlay" :class="theme">
            <div class="loader-content">
                <img src="/img/logos/logo_audire.png" alt="Cargando..." class="loader-logo" />
                <div class="loading-text">
                    <span>Cargando</span>
                    <span class="dots">
                        <span class="dot">.</span>
                        <span class="dot">.</span>
                        <span class="dot">.</span>
                    </span>
                </div>
            </div>
        </div>
    </Transition>
</template>

<script>
import { ref, onMounted } from 'vue';
import { useTheme } from '../../composables/useTheme';

export default {
    setup() {
        const { theme } = useTheme();
        const isLoading = ref(true);

        onMounted(() => {
            // Esperar a que la página esté completamente cargada
            if (document.readyState === 'complete') {
                hideLoader();
            } else {
                window.addEventListener('load', hideLoader);
            }
        });

        const hideLoader = () => {
            // Pequeño delay para una transición suave
            setTimeout(() => {
                isLoading.value = false;
            }, 1500);
        };

        return {
            isLoading,
            theme
        };
    }
}
</script>

<style scoped>
.loader-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
    transition: background-color 0.3s ease;
}

.loader-overlay.light {
    background-color: #ffffff;
}

.loader-overlay.dark {
    background-color: #1a1a2e;
}

.loader-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 1.5rem;
}

.loader-logo {
    width: 120px;
    height: auto;
    max-width: 60vw;
}

.loading-text {
    display: flex;
    align-items: center;
    font-size: 1rem;
    font-weight: 500;
    letter-spacing: 0.1em;
    color: #00B3A4;
}

.dots {
    display: inline-flex;
    margin-left: 2px;
}

.dot {
    animation: bounce 1.4s ease-in-out infinite;
}

.dot:nth-child(1) {
    animation-delay: 0s;
}

.dot:nth-child(2) {
    animation-delay: 0.2s;
}

.dot:nth-child(3) {
    animation-delay: 0.4s;
}

/* Animaciones */
@keyframes bounce {
    0%, 60%, 100% {
        transform: translateY(0);
    }
    30% {
        transform: translateY(-5px);
    }
}

/* Transición de salida */
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>