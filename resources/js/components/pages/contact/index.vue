<template>
    <div>
        <!-- Hero section -->
        <hero-section></hero-section>
        <!-- Atencion -->
        <atencion-section></atencion-section>
        <!-- Doctoralia -->
        <doctoralia-section></doctoralia-section>
        <!-- Maps -->
        <maps-section></maps-section>
        <!-- Contact -->
        <contact-section></contact-section>
    </div>
</template>
<script>
import heroSection from './components/hero_section.vue';
import atencionSection from './components/atencion.vue';
import doctoraliaSection from '../home/componets/doctoralia.vue';
import mapsSection from '../home/componets/google_maps.vue';
import contactSection from '../home/componets/contact.vue';

export default {
    components: {
        'hero-section': heroSection,
        'atencion-section': atencionSection,
        'doctoralia-section': doctoraliaSection,
        'maps-section': mapsSection,
        'contact-section': contactSection
    }
}
</script>
<style>
    
</style>