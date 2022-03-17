<template>
    <div class="container">
        <h1 class="phone_numbers_title">Phone Numbers</h1>
        <div class="row phone_filters">
            <!-- <CountryDropDownComponent/> -->
            <div class="dropdown col-2">
                <a class="btn btn-sm btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Select Country
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li @click="filterCountry(getPhoneNumbers, country)" v-for="country in countries" :key="country"><a class="dropdown-item" href="#">{{country}}</a></li>
                </ul>
            </div>

            <ValidPhoneNumberDropDownComponent/>
        </div>
        <div class="phone_number_list_div">
            <table class="table table-hover table-sm table-borderless table-striped phone_number_list_table">
                <thead class="thead-dark bg-secondary">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Country</th>
                        <th scope="col">State</th>
                        <th scope="col">Country Code</th>
                        <th scope="col">Phone Number</th>
                    </tr>
                </thead>
                <tbody v-for="phoneNumber in phoneNumbers.data" :key="phoneNumber.id">
                    <tr>
                        <th scope="row">{{ phoneNumber.id }}</th>
                        <th scope="row">{{ phoneNumber.country }}</th>
                        <td>{{ phoneNumber.state }}</td>
                        <td>{{ phoneNumber.country_code }}</td>
                        <td>{{ phoneNumber.phone_number }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- <PhoneNumberPaginationComponent :phoneNumbers="phoneNumbers"/> -->
        <div class="phone_number_pagination_buttons">
            <nav aria-label="...">
                <ul class="pagination">
                    <div >
                        <li @click="previousButton(getPhoneNumbers)" :class="{unClickable :isFirstPage}" class="btn btn-sm page-link previous_item page-item d-flex">
                            <i class='far fa-arrow-alt-circle-left'></i>
                            <a>Prev</a>
                        </li>

                    </div>

                    <div>
                        <li @click="nextButton(getPhoneNumbers)" :class="{unClickable :isLastPage}" class="btn btn-sm page-link next_item page-item d-flex">
                            <a>Next</a>
                            <i class='far fa-arrow-alt-circle-right'></i>
                        </li>
                    </div>

                </ul>
            </nav>
        </div>

    </div>
</template>

<script>
import CountryDropDownComponent from '@/components/PhoneNumber/CountryDropDownComponent.vue';
import ValidPhoneNumberDropDownComponent from '@/components/PhoneNumber/ValidPhoneNumberDropDownComponent.vue';
import PhoneNumberPaginationComponent from '@/components/PhoneNumber/PhoneNumberPaginationComponent.vue';

import usephoneNumbers from '../../composables/phoneNumbers'
import { onMounted } from 'vue';


export default {
    setup() {
        const { phoneNumbers, getPhoneNumbers, isLastPage, isFirstPage } = usephoneNumbers()

        onMounted(getPhoneNumbers)

        return {
            phoneNumbers,
            isLastPage,
            isFirstPage,
            getPhoneNumbers
        }
    },
    methods:{
        nextButton(getPhoneNumbers){
            this.meta = this.phoneNumbers.meta
            if(this.meta.current_page < this.meta.last_page){
                getPhoneNumbers(this.meta.current_page+1);
            }
        },
        previousButton(getPhoneNumbers){
            this.meta = this.phoneNumbers.meta
            if(this.meta.current_page > 1){
                getPhoneNumbers(this.meta.current_page-1);
            }
        },
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
    },
    components:{
        CountryDropDownComponent,
        ValidPhoneNumberDropDownComponent,
        PhoneNumberPaginationComponent
    },
    data(){
        let meta = [];
        return {
            meta
        }
    }
}

</script>
