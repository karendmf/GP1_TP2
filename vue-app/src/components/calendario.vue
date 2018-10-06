<template>
    <v-flex >
        <vue-event-calendar :events="evt" :title="'Fechas importantes'" class="elevation-2">
        </vue-event-calendar>
    </v-flex>
</template>

<script>
   import axios from 'axios'
   import moment from 'moment'
   export default {
       data() {
           return {
               moment: moment,
               evt: [],
           }
       },
       mounted() {
           moment.locale('es')
           this.fetchData()
       },
       methods: {
           fetchData() {
               var self = this
               const CALENDAR_ID = 'invlab084i4liin7tbdd65g83s@group.calendar.google.com'
               const API_KEY = 'AIzaSyCSpyzQ_FvOt6JIPSPxVy_vLUiFhsmEODw'
               let url = `https://www.googleapis.com/calendar/v3/calendars/${CALENDAR_ID}/events?key=${API_KEY}&orderBy=startTime&singleEvents=true`

               axios.get(url).then((response) => {
                   const todos = response.data.items;
                   var val;
                   for (val of todos) {
                       const date = self.moment(val.start.dateTime).format('YYYY/M/DD')
                       const title = val.summary
                       const desc = val.description
                       if (date >= moment().format('YYYY/M/DD')) {
                           self.evt.push({
                               date,
                               title,
                               desc
                           });
                       }
                   }
               });
           },
       },
       

   }
</script>
<style>
.date{
    border-radius: 0 !important;
}
.events-wrapper{
    border-radius: 0 !important;
    background-color: #00ACC1 !important;
}
.event-item{
    border-radius: 0 !important;
}
.wrapper .title{
    line-height: 2 !important;
    font-size: 15px !important;
}
.__vev_calendar-wrapper .cal-wrapper{
    width: 50%;
    padding: 3em 1em !important;
}
</style>
