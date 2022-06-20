import './bootstrap';

import { createApp } from 'vue'

import router from './router';

import App from './components/App.vue'

import Toaster from "@meforma/vue-toaster";

createApp({
    components: {
        App
    }
}).use(router).use(Toaster).mount('#app')
