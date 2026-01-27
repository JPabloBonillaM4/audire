import { ref, watch } from 'vue';

const theme = ref(localStorage.getItem('theme') || 'light')

export function useTheme() {
    const setTheme = (newTheme) => {
        theme.value = newTheme;
        document.documentElement.setAttribute('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);
    }

    // Inicializar al cargar
    document.documentElement.setAttribute('data-theme', theme.value)

    return {
        theme,
        setTheme,
    }
}