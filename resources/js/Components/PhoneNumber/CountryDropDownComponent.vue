<template>
    <div class="dropdown col-2">
        <a class="btn btn-sm btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            Select Country
        </a>

        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li @click="filterCountry(getPhoneNumbers, country)" v-for="country in countries" :key="country"><a class="dropdown-item" href="#">{{country}}</a></li>
        </ul>
    </div>
</template>


<script>
import usephoneNumbers from '../../composables/phoneNumbers'
export default {
    setup() {
        const { getPhoneNumbers } = usephoneNumbers()
        return {
            getPhoneNumbers
        }
    },
    methods:{
        filterCountry(getPhoneNumbers, country){
            let query = "&filter[country]="+country;
            console.log(query);
            getPhoneNumbers(1, query);
        }
    },
    computed:{
        countries(){
            return this.$store.getters.countries;
        },
    }
}
</script>
