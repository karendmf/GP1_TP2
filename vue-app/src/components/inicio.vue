<template>
    <div id="inicio">
        <div v-for="evento in eventos" :key="evento.id">
            {{evento.summary}}
            {{moment(evento.start.dateTime).format("D/MM/YY")}}
        </div>
        <v-layout justify-space-between wrap>
    <v-flex xs12 sm6 class="my-3">
      <div class="subheading">Defined by array</div>
      <v-date-picker
        v-model="date1"
        :events="arrayEvents"
        event-color="green lighten-1"
      ></v-date-picker>
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
            arrayEvents: null,
            moment: moment,
            eventos: [],
            date1: null,
        }
    },
    mounted(){
        this.arrayEvents = [...Array(6)].map(() => {
            const day = Math.floor(Math.random() * 30)
            const d = new Date()
            d.setDate(day)
            return d.toISOString().substr(0, 10)
            
        }),
        
        console.log('Items: ', this.arrayEvents);
        moment.locale('es')
        const CALENDAR_ID = 'invlab084i4liin7tbdd65g83s@group.calendar.google.com'
        const API_KEY = 'AIzaSyCSpyzQ_FvOt6JIPSPxVy_vLUiFhsmEODw'
        let url = `https://www.googleapis.com/calendar/v3/calendars/${CALENDAR_ID}/events?key=${API_KEY}`
        var self= this;
        /* axios.get(url)
        .then(function (response) {
            self.eventos= response.data.items;
            //console.log('eventos: ', self.eventos);
            var array= self.eventos
            var contador= array.length
            var i;
            var losEventos=[];
            for (i = 0; i < contador; i++) {
                const day = self.moment(self.eventos[i].start.dateTime).format('YYYY-M-D');
                losEventos.push(day); 
            }
        }); */
        function axiosTest() {
        return axios.get(url).then(response => {
            // returning the data here allows the caller to get it through another .then(...)
            return response.data
        })
        }

        axiosTest().then(data => {
            response.json({ message: 'Request received!', data })
            console.log('eventos: ', data);
        })
    },
    
}
</script>