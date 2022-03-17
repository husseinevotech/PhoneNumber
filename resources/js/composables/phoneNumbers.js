import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

export default function useCompanies() {
    const phoneNumbers = ref(["abc"])
    const isLastPage = ref(false)
    const isFirstPage = ref(true)

    const errors = ref('')
    // const router = useRouter()

    const getPhoneNumbers = async (page = 1) => {
        let response = await axios.get('/api/phoneNumbers?page='+page)
        phoneNumbers.value = response.data.data
        checkPages(response);
    }

    const getPhoneNumbersFilterByCountry = async (country) => {
        let response = await axios.get('/api/phoneNumbers?filter[country]='+country)
        phoneNumbers.value = response.data.data
        checkPages(response);
    }

    function checkPages(response){
        if(response.data.data.meta.current_page == response.data.data.meta.last_page){
            isLastPage.value = true;
        }else{
            isLastPage.value = false;
        }
        if(response.data.data.meta.current_page == 1){
            isFirstPage.value = true;
        }else{
            isFirstPage.value = false;
        }
    }

    return {
        errors,
        phoneNumbers,
        getPhoneNumbers,
        getPhoneNumbersFilterByCountry,
        isLastPage,
        isFirstPage,
    }
}
