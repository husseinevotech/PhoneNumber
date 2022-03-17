import axios from 'axios';
import { createStore } from 'vuex';

axios.defaults.baseURL = process.env.MIX_BASE_URL;

export default createStore({
    state: {
        countries: [],
        loading: false,
    },
    getters: {
        countries(state){
            return state.countries;
        }
    },
    mutations: {
        setCountries(state, data){
            state.countries = data;
        },
        setLoading(state){
            state.loading = !state.loading;
        }
    },
    actions: {
        getCountries(context){
            context.commit("setLoading");
            return new Promise(async (resolve, reject) =>{
                await axios({
                    url : 'api/phoneNumbers/countries',
                    type  : "GET"
                })
                .then(response => {
                    let data = response.data.data;
                    context.commit("setCountries", data);
                    context.commit("setLoading");
                    resolve(response);
                }).catch(error => {
                    reject(error);
                });
            });
        }
    },
    modules: {},
})
