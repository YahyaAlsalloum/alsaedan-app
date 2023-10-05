<template>
    <div class="layout">
        <v-layout>            
            <v-main>
                <slot>
                    
                </slot>
            </v-main>
            <AppNav/>
            <AppFooter/>
        </v-layout>
    </div>
</template>

<script>
import AppNav from "@/components/global/AppNav.vue"
import AppFooter from "@/components/global/AppFooter.vue"
export default
    {
        data: () => ({
            drawer: false,
        }),
        components:{
            AppNav,
            AppFooter,
        },
    }
</script>
