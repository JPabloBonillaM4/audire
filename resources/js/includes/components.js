import { createApp } from 'vue';
import navbarComponent from '../components/general/navbar.vue';
import footerComponent from '../components/general/footer.vue';
import whatsappContact from '../components/general/whatssapp_contact.vue';
import loaderComponent from '../components/general/loader.vue';
import homeSection from '../components/pages/home/index.vue';
import contactSection from '../components/pages/contact/index.vue';
import aboutUsSection from '../components/pages/about-us/index.vue';
import servicesSection from '../components/pages/services/index.vue';
import productsSection from '../components/pages/products/index.vue';
import tipsSection from '../components/pages/tips/index.vue';

const app = createApp({
    components: {
        'navbar-component': navbarComponent,
        'whatsapp-contact': whatsappContact,
        'loader-component': loaderComponent,
        'home-section': homeSection,
        'contact-section': contactSection,
        'about-us-section': aboutUsSection,
        'footer-component': footerComponent,
        'services-section': servicesSection,
        'products-section': productsSection,
        'tips-section': tipsSection,
    }
});

export default app;