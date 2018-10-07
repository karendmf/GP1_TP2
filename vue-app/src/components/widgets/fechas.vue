<template>
    <div id="fechas">
        <!-- En el codigo HTML simplemente recorremos el JSON de respuesta, y mostramos los eventos -->
        <v-card color="cyan darken-1" class="white--text">
            <v-card-title primary-title>
                <div class="headline">Calendario</div>
            </v-card-title>
            <v-list two-line>
                <v-list>
                    <!-- Gracias a VueJS podemos recorrer un arreglo facilmente -->
                    <v-list-tile v-for="evento in eventos" v-if="moment(evento.start.dateTime).format('DD/MM/YY') >= moment().format('DD/MM/YY')"
                        :key="evento.id">
                        <v-list-tile-content>
                            <v-list-tile-title>{{ evento.summary }}</v-list-tile-title>
                            <v-list-tile-sub-title>{{moment(evento.start.dateTime).format("DD/MM/YY")}}</v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile>
                </v-list>
                <v-btn flat block color="cyan darken-1" to="/calendario">Ver todos los eventos</v-btn>
            </v-list>
        </v-card>
    </div>
</template>
<script>
import axios from 'axios'
import moment from 'moment'
export default {
    components:{
    },
    data() {
        return {
            moment: moment,
            eventos: [],
        }
    },
    mounted() {
        moment.locale('es')

        // ID del calendario público a usar
        const CALENDAR_ID = 'invlab084i4liin7tbdd65g83s@group.calendar.google.com'

        // Clave de API de Google
        const API_KEY = 'AIzaSyCSpyzQ_FvOt6JIPSPxVy_vLUiFhsmEODw'

        // Se arma la url para hacer la petición
        let url = `https://www.googleapis.com/calendar/v3/calendars/${CALENDAR_ID}/events?key=${API_KEY}&orderBy=startTime&singleEvents=true`
        var self = this;

        // Hacemos la petición y guardamos la respuesta en una variable
        axios.get(url)
            .then(function (response) {
                self.eventos = response.data.items;
                //console.log('Fechas: ', self.eventos);

            })
    }
}
</script>
