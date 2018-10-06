<template>
    <v-container fluid grid-list-md id="informes">
        <div class="loading" v-if="loading">
            Cargando...
        </div>
        <div v-if="error">
            <v-alert
            :value="true"
            color="error"
            icon="warning"
            outline
            >
            {{ error }}
            </v-alert>
            <v-alert
            :value="true"
            color="cyan darken-1"
            icon="priority_high"
            >
            Para poder ver los informes, la base de datos y el servidor de Lumen deben estar funcionando correctamente.
            </v-alert>
            
        </div>
        <v-layout row wrap v-if="informes">
            <v-flex xs6 sm3 v-for="informe in informes" :key="informe.id">
                <v-card>
                    <v-card-title primary-title>
                        <div>
                            <div class="headline">{{informe.titulo}}</div>
                            <span class="grey--text">Fecha limite: {{moment(informe.fechalimite).format("D/M/YY")}}</span>
                        </div>
                    </v-card-title>
                    <v-card-actions>
                        <v-btn flat block color="cyan darken-1">Ver</v-btn>
                    </v-card-actions>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
import axios from 'axios'
import moment from 'moment'
export default {
    data() {
        return {
            moment: moment,
            informes: null,
            loading: false,
            error: null
        }
    },
    mounted() {
        moment.locale('es')
        this.fetchData()
    },
    methods: {
        fetchData (){
            var self = this
            self.loading = true
            self.error = null;
            axios.get('http://localhost:8000/api/informes')
                .then(function (response) {
                    self.loading = false
                    self.informes = response.data;
                    //console.log('Informes: ', response.data);
                })
                .catch(function (err) {
                    self.error = err.toString()
                    self.loading = false
                });
        }
    }
}
</script>