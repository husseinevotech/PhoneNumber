<template>
    <div class="container">
        <h1 class="phone_numbers_title">Phone Numbers</h1>
        <div class="row phone_filters">
            <!-- <CountryDropDownComponent/> -->
            <div class="dropdown col-2">
                <a class="btn btn-sm btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    {{country}}
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li @click="changeCountry(getPhoneNumbersFiltered, `Select Country`)" ><a class="dropdown-item" href="#">All</a></li>
                    <li @click="changeCountry(getPhoneNumbersFiltered, country)" v-for="country in countries" :key="country"><a class="dropdown-item" href="#">{{country}}</a></li>
                </ul>
            </div>

            <!-- <ValidPhoneNumberDropDownComponent/> -->
            <div class="dropdown col-2">
                <a class="btn btn-sm btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    {{stateMsg}}
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a @click="changeState(getPhoneNumbersFiltered, `Valid Phone Numbers`)" class="dropdown-item" href="#">All</a></li>
                    <li><a @click="changeState(getPhoneNumbersFiltered, `ok`)" class="dropdown-item" href="#">Valid</a></li>
                    <li><a @click="changeState(getPhoneNumbersFiltered, `nok`)" class="dropdown-item" href="#">InValid</a></li>
                </ul>
            </div>

        </div>
        <div class="phone_number_list_div">
            <table class="table table-hover table-sm table-borderless table-striped phone_number_list_table">
                <thead class="thead-dark bg-secondary">
                    <tr>
                        <th scope="col">Country</th>
                        <th scope="col">State</th>
                        <th scope="col">Country Code</th>
                        <th scope="col">Phone Number</th>
                    </tr>
                </thead>
                <tbody v-for="phoneNumber in phoneNumbers.data" :key="phoneNumber.id">
                    <tr>
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
                        <li title="previous page" @click="previousButton(getPhoneNumbers)" :class="{unClickable :isFirstPage}" class="btn btn-sm page-link previous_item page-item d-flex">
                            <i class='far fa-arrow-alt-circle-left'></i>
                            <a>Prev</a>
                        </li>

                    </div>

                    <div>
                        <li title="next page" @click="nextButton(getPhoneNumbers)" :class="{unClickable :isLastPage}" class="btn btn-sm page-link next_item page-item d-flex">
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
import usephoneNumbers from '../../composables/phoneNumbers'
import { onMounted } from 'vue';


export default {
    setup() {
        const { phoneNumbers, getPhoneNumbers, getPhoneNumbersFiltered, isLastPage, isFirstPage } = usephoneNumbers()

        onMounted(getPhoneNumbers)

        return {
            phoneNumbers,
            isLastPage,
            isFirstPage,
            getPhoneNumbers,
            getPhoneNumbersFiltered
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
        changeCountry(getPhoneNumbersFiltered, country){
            this.country = country;
            let query = this.prepareFilterQuery();
            getPhoneNumbersFiltered(query);
        },
        changeState(getPhoneNumbersFiltered, state){
            this.state = state;
            this.stateMsg = this.state == "ok" ? "Valid" : this.state == "nok" ? "InValid" : "Valid Phone Numbers"
            let query = this.prepareFilterQuery();
            getPhoneNumbersFiltered(query);
        },
        prepareFilterQuery(){
            let query = "";
            let stateParameter = this.state == "Valid Phone Numbers" ? "" : "filter[state]="+this.state;
            let countryParameter = this.country == "Select Country" ? "" : "filter[country]="+this.country;

            query += stateParameter;
            query += countryParameter;
            if(stateParameter && countryParameter){
                query = `${stateParameter}&${countryParameter}`;
            }
            return query;
        }
    },
    computed:{
        countries(){
            return this.$store.getters.countries;
        },
    },
    data(){
        let meta = [];
        let country = "Select Country";
        let state = "Valid Phone Numbers";
        let stateMsg = "Valid Phone Numbers";
        return {
            meta,
            country,
            state,
            stateMsg,
        }
    }
}

</script>
