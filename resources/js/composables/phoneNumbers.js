import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

export default function useCompanies() {
    const phoneNumbers = ref(["abc"])

    const errors = ref('')
    // const router = useRouter()

    const getPhoneNumbers = async () => {
        let response = await axios.get('/api/phoneNumbers')
        phoneNumbers.value = response.data.data
    }

    return {
        errors,
        phoneNumbers,
        getPhoneNumbers,
    }
}
