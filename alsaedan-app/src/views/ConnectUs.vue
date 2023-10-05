<template>
  <div class="contact-us-container">
    <h1 class="text-h2 mt-4 mb-2" style="color: #bf9410; ">{{ $t('Contact Us') }}</h1>
    <v-icon class="ma-2 pa-2 mt-1 mb-8">mdi-chart-line-variant</v-icon><v-icon
      class="ma-2 pa-2 mt-1 mb-8">mdi-chart-line-variant</v-icon>
    <v-row>
      <v-col cols="6">
        <div class="container">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115960.46350587062!2d46.76037237243453!3d24.73496455293805!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2ee2eaa420cfa7%3A0x2c7b867e9624b27f!2z2LTYsdmD2Kkg2KLZhCDYs9i52YrYr9in2YYg2YTZhNi52YLYp9ix2KfYqg!5e0!3m2!1sar!2sjo!4v1694237245623!5m2!1sar!2sjo"
            style="border: 1px solid color ;border-radius: 50%;; width: 100%; height: 100vh;" allowfullscreen=""
            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </v-col>
      <v-col cols="6">
        <div class="container" style="height: 400px; margin-top: 30px;" :dir="$i18n.locale == 'Arabic' ? 'rtl' : 'ltr'">
          <h1>{{ $t('Do you want more information ?') }}</h1>
          <div class="description">
            <p class="ma-2 pa-2 mb-auto text-xl" style="font-size: x-large;">
              {{ $t('Feel free to ask us any questions. We value your curiosity and are here to provide answers and assistance whenever you need it.Whether you have inquiries about services, or just want to chat, dont hesitate to get in touch') }}
            </p>
          </div>
          <!-- ================================form=================================== -->
          <v-form v-model="valid">
            <v-container class="form-container">
              <v-row>
                <v-col cols="12" md="6">
                  <v-text-field v-model="data.name" :counter="10" label="First name" :rules="nameRules" required
                    hide-details prepend-icon="person"></v-text-field>
                </v-col>
                <v-col cols="12" md="6">
                  <v-text-field v-model="data.phone" :counter="7" :rules="numRules" required
                    label="Phone Number"></v-text-field>
                </v-col>
                <v-col cols="12" md="6">
                  <v-text-field v-model="data.email" :rules="emailRules" label="E-mail" hide-details
                    required></v-text-field>
                </v-col>
                <v-col cols="12">
                  <v-textarea v-model="data.text" label="Message" :rules="textRules" hide-details required></v-textarea>
                </v-col>
                <v-col cols="12">
                  <v-btn width="300" color="#bf9410" class="button ma-2 pa-2  mt-2 mb-8" @click="submitForm">
                    {{ $t('Send') }}
                    <v-icon class="ma-1 pa-1 mb-auto ml-8">
                      mdi-send-variant-outline
                    </v-icon>
                  </v-btn>
                </v-col>
              </v-row>
            </v-container>
          </v-form>
          <!-- ================================end form=================================== -->
        </div>
      </v-col>
    </v-row>

    <div style="height: 600px;"></div>
  </div>
</template>
  
<script>
export default {
  data: () => ({
    data: {
      name: '',
      email: '',
      text: '',
    },
    valid: false,
    emailRules: [
      value => {
        if (value) return true

        return 'E-mail is requred.'
      },
      value => {
        if (/.+@.+\..+/.test(value)) return true

        return 'E-mail must be valid.'
      },
    ],
    nameRules: [
      value => {
        if (value) return true

        return 'Name is required.'
      },
      value => {
        if (value?.length <= 3) return true

        return 'Name must be less than 3 characters.'
      },
    ],
    textRules: [
      value => {
        if (value) return true

        return 'Text is requred.'
      },
    ],
    numRules: [
      value => {
        if (value?.length > 9 && /[0-9-]+/.test(value)) return true

        return 'Phone number needs to be at least 9 digits.'
      },
    ],
  }),
  methods: {
    submitForm() {
      console.log(this.data);
    },
  },
};
</script>
  
<style>
.contact-us-container {
  background-color: #f5f5f5;
  /* Light silver background color */
  padding: 20px;
  /* Adjust the padding as needed */
  border: 1px solid #ddd;
  /* Border color */
}

.description {
  width: 50%;
  margin-left: 25%;
  margin-right: 25%;
}

.button {
  --c: #fff;
  /* text color */
  background: linear-gradient(90deg, #0000 33%, #fff5, #0000 67%) var(--_p, 100%) / 300% no-repeat,
    #bf9410;
  /* background color */
  color: #0000;
  border: none;
  transform: perspective(500px) rotateY(calc(20deg * var(--_i, -1)));
  text-shadow: calc(var(--_i, -1) * 0.08em) -.01em 0 var(--c),
    calc(var(--_i, -1) * -0.08em) .01em 2px #0004;
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
  