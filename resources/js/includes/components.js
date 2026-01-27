import { createApp } from 'vue';
import navbarComponent from '../components/general/navbar.vue';
import whatsappContact from '../components/general/whatssapp_contact.vue';
import homeSection from '../components/pages/home/index.vue';

const app = createApp({
    components: {
        'navbar-component': navbarComponent,
        'whatsapp-contact': whatsappContact,
        'home-section': homeSection,
    }
});

export default app;