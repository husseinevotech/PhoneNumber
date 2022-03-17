require("./bootstrap");

import { createApp } from 'vue'
import router from './router';
import App from './components/App.vue';
import Toaster from '@meforma/vue-toaster';
import store from '@/store';


const app = createApp(App)
.use(store)
.use(router)
.use(Toaster)
.mount('#app');
