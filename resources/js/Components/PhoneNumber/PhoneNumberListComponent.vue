<template>
    <div class="container">
        <h1 class="phone_numbers_title">Phone Numbers</h1>
        <div class="row phone_filters">
            <CountryDropDownComponent/>
            <ValidPhoneNumberDropDownComponent/>
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

        <PhoneNumberPaginationComponent/>

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
        const { phoneNumbers, getPhoneNumbers } = usephoneNumbers()

        onMounted(getPhoneNumbers)

        return {
            phoneNumbers,
        }
    },
    components:{
        CountryDropDownComponent,
        ValidPhoneNumberDropDownComponent,
        PhoneNumberPaginationComponent
    }
}

</script>
