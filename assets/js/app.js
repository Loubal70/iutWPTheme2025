// import Alpine from '../../node_modules/alpinejs/dist/module.esm.js';
import { Alpine } from 'https://cdn.jsdelivr.net/npm/alpinejs@3.14.7/+esm';
import Testimonials from "./components/testimonials.js";

window.addEventListener('DOMContentLoaded', () => {
    window.Alpine = Alpine;

    Alpine.data('Testimonials', Testimonials);

    Alpine.start();
});
