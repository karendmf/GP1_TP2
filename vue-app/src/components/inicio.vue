<template>
    <div id="inicio">
        <v-layout row>
    <v-flex xs12 sm3>
      <v-card>
        <v-list two-line>
          <v-list>
          <v-list-tile
            v-for="evento in eventos" v-if="moment(evento.start.dateTime).format('D/MM/YY') >= moment().format('D/MM/YY')"
            :key="evento.id"
          >
          
            <v-list-tile-content>
              <v-list-tile-title>{{ evento.summary }}</v-list-tile-title>
              <v-list-tile-sub-title>{{moment(evento.start.dateTime).format("dddd D MMMM")}}</v-list-tile-sub-title>
            </v-list-tile-content>

          </v-list-tile>
        </v-list>
        </v-list>
        <v-btn flat block color="cyan darken-1" to="/calendario">Ver todos los eventos</v-btn>
      </v-card>
    </v-flex>
  </v-layout>
    </div>
    
</template>
<script>
import axios from 'axios'
import moment from 'moment'
export default{
    data(){
        return{
            moment: moment,
            eventos: [],
        }
    },
    mounted(){
        moment.locale('es')
        const CALENDAR_ID = 'invlab084i4liin7tbdd65g83s@group.calendar.google.com'
        const API_KEY = 'AIzaSyCSpyzQ_FvOt6JIPSPxVy_vLUiFhsmEODw'
        let url = `https://www.googleapis.com/calendar/v3/calendars/${CALENDAR_ID}/events?key=${API_KEY}&orderBy=startTime&singleEvents=true`
        var self= this;
        axios.get(url)
        .then(function (response) {
            self.eventos= response.data.items;
            //console.log('eventos: ', self.eventos);
        
        })
    }
}
</script>