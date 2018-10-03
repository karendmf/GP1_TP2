<template>
    <div id="inicio">
        <div v-for="evento in eventos" :key="evento.id">
            {{evento.summary}}
            {{moment(evento.start.dateTime).format("MMM Do YY")}}
        </div>
        <v-layout justify-space-between wrap>
    <v-flex xs12 sm6 class="my-3">
      <div class="subheading">Defined by function</div>
      <v-date-picker
        v-model="date2"
        :event-color="'yellow'"
        :events="functionEvents"
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
            moment: moment,
            eventos: [],
            date2: null,
        }
    },
    mounted(){
        moment.locale('es')
        const CALENDAR_ID = 'invlab084i4liin7tbdd65g83s@group.calendar.google.com'
        const API_KEY = 'AIzaSyCSpyzQ_FvOt6JIPSPxVy_vLUiFhsmEODw'
        let url = `https://www.googleapis.com/calendar/v3/calendars/${CALENDAR_ID}/events?key=${API_KEY}`
        var self= this;
        axios.get(url)
        .then(function (response) {
            self.eventos= response.data.items;
            
        //console.log('Items: ', response.data.items);
        });
        //.catch(function (error) {
        //console.log('Error: ', error);
        //});
    },
    methods: {
      functionEvents (date) {
        const [,, day] = date.split('-')
        const day = moment(date).format("MMM Do YY")
        return day
        console.log('Error: ', day);
      }
    }
}
</script>