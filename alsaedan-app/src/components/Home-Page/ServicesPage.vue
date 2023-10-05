<template>
    <div :dir="$i18n.locale == 'Arabic' ? 'rtl' : 'ltr'" class="flex-fill ">
        <Apartments class="mt-10"/>
    </div>
</template>



<script>
import Apartments from "@/components/Home-Page/ApartmentsForRent.vue"
export default {
    components:{
        Apartments
    },

    data: () => ({
        model: null,
    }),
}
</script>
