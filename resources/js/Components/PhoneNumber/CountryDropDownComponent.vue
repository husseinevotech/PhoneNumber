<template>
    <div class="dropdown col-2">
        <a class="btn btn-sm btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            {{country}}
        </a>

        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li @click="changeCountry(getPhoneNumbersFiltered, `Select Country`)" ><a class="dropdown-item" href="#">All</a></li>
            <li @click="changeCountry(getPhoneNumbersFiltered, country)" v-for="country in countries" :key="country"><a class="dropdown-item" href="#">{{country}}</a></li>
        </ul>
    </div>
</template>


<script>
export default {

}
</script>
