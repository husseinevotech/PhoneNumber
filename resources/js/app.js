require("./bootstrap");

import { createApp } from 'vue'
// import router from './router';
import App from './components/App.vue';
import Toaster from '@meforma/vue-toaster';


const app = createApp(App)
.use(Toaster)
.mount('#app');
