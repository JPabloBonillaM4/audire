<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import { useTheme } from '../../../composables/useTheme';
import Slider from './componets/slider.vue';
import Doctoralia from './componets/doctoralia.vue';
import SectionServices from './componets/section_services.vue';
import SectionVideo from './componets/section_video.vue';
import SectionProducts from './componets/section_products.vue';
import SaludAuditiva from './componets/salud_auditiva.vue';
import Tips from './componets/tips.vue';
import GoogleMaps from './componets/google_maps.vue';
import Contact from './componets/contact.vue';

const { theme } = useTheme();
const isMobileOrTablet = ref(window.innerWidth < 1024);

const handleResize = () => {
    isMobileOrTablet.value = window.innerWidth < 1024;
};

onMounted(() => {
    window.addEventListener('resize', handleResize);
});

onUnmounted(() => {
    window.removeEventListener('resize', handleResize);
});
</script>
<template>
    <div :class="['section-content', theme === 'dark' ? 'blue-grad-bg-dark' : 'blue-grad-bg']">
        <!-- Slider -->
        <Slider />
        <!-- Doctoralia -->
        <Doctoralia />
        <!-- Services -->
        <SectionServices />
        <!-- Video Section -->
        <SectionVideo />
        <!-- Products Section -->
        <SectionProducts />
        <!-- Salud auditiva Section -->
        <SaludAuditiva />
        <!-- Tips Section -->
        <Tips />
        <!-- Google Maps Section -->
        <GoogleMaps />
        <!-- Contact Section -->
        <Contact />
    </div>
</template>
<style scoped>
    .section-content {
        min-height: 100vh;
    }

    .blue-grad-bg {
        background: rgba(0, 0, 0, 0) -webkit-linear-gradient(left, #00BFB3 0%, #A4D65E 100%) repeat scroll 0 0;
        background: rgba(0, 0, 0, 0) linear-gradient(to right, #00BFB3 0%, #A4D65E 100%) repeat scroll 0 0;
    }

    .blue-grad-bg-dark {
        background: rgba(0, 0, 0, 0) -webkit-linear-gradient(left, #005F5A 0%, #6B8E3C 100%) repeat scroll 0 0;
        background: rgba(0, 0, 0, 0) linear-gradient(to right, #005F5A 0%, #6B8E3C 100%) repeat scroll 0 0;
    }
</style>