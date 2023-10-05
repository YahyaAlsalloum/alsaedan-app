<template>
    <div class="app-drawer">
        <v-navigation-drawer location="right" v-model="drawer">
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit...
            </p>
        </v-navigation-drawer>
    </div>
</template>
  
<script>
export default {
    inject: ['Emitter'],
    data: () => ({
        drawer: false,
    }),
    mounted() {
        this.Emitter.on('openMenu', () => {
            this.drawer = !this.drawer; // Toggle the drawer state
        });
    },
};
</script>
  