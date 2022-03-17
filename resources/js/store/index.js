import axios from 'axios';
import { createStore } from 'vuex';

axios.defaults.baseURL = process.env.MIX_BASE_URL;

export default createStore({
    state: {
        phoneNumbers: [],
        loading: false,
    },
    getters: {

    },
    mutations: {

    },
    actions: {

    },
    modules: {},
})
