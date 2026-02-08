import { createApp } from 'vue';
import navbarComponent from '../components/general/navbar.vue';
import whatsappContact from '../components/general/whatssapp_contact.vue';
import loaderComponent from '../components/general/loader.vue';
import homeSection from '../components/pages/home/index.vue';
import contactSection from '../components/pages/contact/index.vue';

const app = createApp({
    components: {
        'navbar-component': navbarComponent,
        'whatsapp-contact': whatsappContact,
        'loader-component': loaderComponent,
        'home-section': homeSection,
        'contact-section': contactSection,
    }
});

export default app;