<template>
    <div>
        <router-view/>
    </div>

</template>


<script>
import { onBeforeMount } from '@vue/runtime-core';
import store from '@/store';

export default {
    setup(){
        onBeforeMount( async () =>{
            await store.dispatch("getCountries");
        });
    }
}
</script>
