import { createRouter, createWebHistory } from 'vue-router';
import PhoneNumberList from '@/components/PhoneNumber/PhoneNumberListComponent.vue';


const routes = [
    {
        path : '/',
        component : PhoneNumberList,
        name : 'home'
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
    base: process.env.APP_URL,
    linkActiveClass: "active",
});

// router.beforeEach(VueRouteMiddleware());

export default router;

