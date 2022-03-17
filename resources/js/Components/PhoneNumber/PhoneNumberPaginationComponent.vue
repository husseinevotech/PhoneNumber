<template>
    <div class="phone_number_pagination_buttons">
        <nav aria-label="...">
            <ul class="pagination">
                <div>
                    <li class="previous_item page-item">
                        <a class="page-link btn btn-sm">Prev</a>
                    </li>
                    <i class='far fa-arrow-alt-circle-left'></i>
                </div>

                <div @click="nextButton(getPhoneNumbers)">
                    <li class="next_item page-item">
                        <a class="page-link btn btn-sm">Next</a>
                    </li>
                    <i class='far fa-arrow-alt-circle-right'></i>
                </div>

            </ul>
        </nav>
    </div>
</template>


<script>
import { onMounted } from '@vue/runtime-core'
import usephoneNumbers from '../../composables/phoneNumbers'
export default {
    setup() {
        const { phoneNumbers, getPhoneNumbers } = usephoneNumbers()

        onMounted(getPhoneNumbers)

        return {
            getPhoneNumbers,
            phoneNumbers,
        }
    },
    props:[
        "phoneNumbers"
    ],
    methods:{
        nextButton(getPhoneNumbers){
            console.log(this.phoneNumbers);
            getPhoneNumbers(2)
        }
    }
}
</script>
