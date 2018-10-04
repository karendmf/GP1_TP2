<template>
    <v-container fluid grid-list-md id="informes">
        <v-layout row wrap >
        <v-flex xs6 sm3 v-for="informe in informes" :key="informe.id">
        <v-card>
            <v-img
            src="https://picsum.photos/200/300/?random"
            height="200px"
            >
            </v-img>

            <v-card-title primary-title>
            <div>
                <div class="headline">{{informe.titulo}}</div>
                <span class="grey--text">Fecha limite: {{moment(informe.fechalimite).format("D/M/YY")}}</span>
            </div>
            </v-card-title>

            <v-card-actions>
            <v-btn flat>Ver</v-btn>
            <v-spacer></v-spacer>
            </v-card-actions>
        </v-card>
        </v-flex>
    </v-layout>
    </v-container>
</template>

<script>
import axios from 'axios'
import moment from 'moment'
export default{
    data(){
        return{
            moment: moment,
            informes: [],
        }
    },
    mounted(){
        moment.locale('es')
        var self= this;
        axios.get('http://localhost:8000/api/informes')
        .then(function (response) {
            self.informes= response.data;
        //console.log('Informes: ', response.data);
        })
        .catch(function (error) {
        console.log('Error: ', error);
        });
    }
}
</script>