<template>
    <div class="container">
        <div class="row">
            <CountryDropDownComponent/>
            <ValidPhoneNumberDropDownComponent/>
        </div>
        <table class="table table-striped table-bordered table-hover table-sm">
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
            </tbody>
        </table>
    </div>
</template>

<script>
import CountryDropDownComponent from '@/components/PhoneNumber/CountryDropDownComponent.vue';
import ValidPhoneNumberDropDownComponent from '@/components/PhoneNumber/ValidPhoneNumberDropDownComponent.vue';

export default {
    components:{
        CountryDropDownComponent,
        ValidPhoneNumberDropDownComponent
    }
}

</script>
