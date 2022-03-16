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
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
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

export default {
    components:{
        CountryDropDownComponent,
        ValidPhoneNumberDropDownComponent,
        PhoneNumberPaginationComponent
    }
}

</script>
