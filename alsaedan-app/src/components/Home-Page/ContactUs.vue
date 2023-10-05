<template>
  <div class="container" style="height: 400px;" :dir="$i18n.locale == 'Arabic' ? 'rtl' : 'ltr'">
    <h4 style="color: #bf9410;">{{$t('Contact Us')}}</h4>
    <h1>{{$t('Do you want more information?')}}</h1>
    <div style="width:50%; margin-left: 25%;margin-right: 25%;" class="d-flex align-center flex-column mb-6 ">
      <v-icon class="ma-2 pa-2 mb-auto">
        mdi-chart-line-variant
      </v-icon>
      <p class="ma-2 pa-2 mb-auto">
        {{ $t('Feel free to ask us any questions. We value your curiosity and are here to provide answers and assistance whenever you need it. Whether you have inquiries about our products, services, or just want to chat,dont hesitate to get in touch') }}
      </p>

      <v-btn color="#bf9410" class="button ma-2 pa-2 mb-auto mt-8" @click="goTo()">
        {{$t('Contact Us')}}
        <v-icon class="ma-1 pa-1 mb-auto ">
          mdi-phone-outline
        </v-icon>
      </v-btn>

    </div>

  </div>
</template>
<script>
export default{
  methods:{
    goTo(){
      this.$router.push(`/Connectus`);
    }
  },
}
</script>
<style>
.button {
  --c: #fff;
  /* text color */
  background: linear-gradient(90deg, #0000 33%, #fff5, #0000 67%) var(--_p, 100%)/300% no-repeat,
    #bf9410;
  /* background color */
  color: #0000;
  border: none;
  transform: perspective(500px) rotateY(calc(20deg*var(--_i, -1)));
  text-shadow: calc(var(--_i, -1)* 0.08em) -.01em 0 var(--c),
    calc(var(--_i, -1)*-0.08em) .01em 2px #0004;
  outline-offset: .1em;
  transition: 0.3s;
}

button:hover,
button:focus-visible {
  --_p: 0%;
  --_i: 1;
}

button:active {
  text-shadow: none;
  color: var(--c);
  box-shadow: inset 0 0 9e9q #0005;
  transition: 0s;
}

button {
  font-family: system-ui, sans-serif;
  font-weight: bold;
  font-size: 2rem;
  margin: 0;
  cursor: pointer;
  padding: .1em .3em;
}
</style>