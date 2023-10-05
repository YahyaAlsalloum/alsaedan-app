<template>
    <div class="container" :dir="$i18n.locale == 'Arabic' ? 'rtl' : 'ltr'" style="height: 400px;">
        <v-container class=" mb-6" style="height: 300px;">
            <v-row align="start" no-gutters style="height: 300px;">

                <v-row v-if="$i18n.locale == 'Arabic'">
                    <v-col cols="6" >

            <div style="max-width: 100%; max-height: 100%; overflow: hidden;">
                <img src="@/assets/images/aboutus-new.png" style="width: 100%; height: auto;">
            </div>
                    </v-col>
                <v-col cols="6">
    <v-container>
        <h1 style="text-align: end;">{{$t('Al Saidan Real Estate Company')}}</h1>
        <p style="text-align: end; margin-right: 0;">{{ $t('Al Saedan Real Estate Company is one of the most prestigious real estate companies in the Kingdom of Saudi Arabia and the Arab world alike. Its launch was based on the belief in the serious desire') }}</p>
        <h1 style="text-align: end;">{{$t('Our vision')}}</h1>
        <p style="text-align: end; margin-right: 0;">{{ $t('To be the preferred strategic partner for providing creative and distinguished real estate products and services that meet the needs of the business') }}</p>
        <h1 style="text-align: end;">{{ $t('Our message') }}</h1>
        <p style="text-align: end; margin-right: 0;">{{ $t('Based on our long experience, we provide our customers with distinguished real estate products and services with high quality and competitive prices') }}</p>
    </v-container></v-col>
</v-row>
                <v-row v-else>
                    <v-col cols="6">
    <v-container>
        <h1 style="text-align: start;">{{$t('Al Saidan Real Estate Company')}}</h1>
        <p style="text-align: start;">{{$t('Al Saedan Real Estate Company is one of the most prestigious real estate companies in the Kingdom of Saudi Arabia and the Arab world alike. Its launch was based on the belief in the serious desire')}}</p>
        <h1 style="text-align: start;">{{$t('Our vision')}}</h1>
        <p style="text-align: start;">{{ $t('To be the preferred strategic partner for providing creative and distinguished real estate products and services that meet the needs of the business') }}</p>
        <h1 style="text-align: start;">{{ $t('Our message') }}</h1>
        <p style="text-align: start;">{{ $t('Based on our long experience, we provide our customers with distinguished real estate products and services with high quality and competitive prices') }}</p>
    </v-container></v-col>
    <v-col cols="6" >
                        <div style="max-width: 100%; max-height: 100%; overflow: hidden;">
                <img src="@/assets/images/aboutus-new.png" style="width: 100%; height: auto;">
            </div>
                    </v-col>

                </v-row>

            </v-row>
        </v-container>
    </div>
</template>