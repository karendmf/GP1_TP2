<template>
    <div id="inicio">
        <v-layout row wrap>
            <v-flex xs12 sm3>
                <fechas></fechas>
            </v-flex>
            <v-flex xs12 sm3>
                <clima></clima>
            </v-flex>
        </v-layout>
    </div>
</template>

<script>
import fechas from './widgets/fechas.vue'
import clima from './widgets/clima.vue'
export default {
    components:{
        fechas,
        clima
    },
}
</script>
<style>
.flex{
    margin: 0.5em;
}
</style>
