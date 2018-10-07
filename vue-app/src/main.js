import Vue from 'vue'
import App from './App.vue'
import 'vuetify/dist/vuetify.min.css'
import Vuetify from 'vuetify'
import 'babel-polyfill'
import router from './router'
import 'vue-event-calendar/dist/style.css'
import vueEventCalendar from 'vue-event-calendar'
import VueGoogleCharts from 'vue-google-charts'

Vue.use(Vuetify)
Vue.use(vueEventCalendar, {locale: 'es', color: 'gray'}) 
Vue.use(VueGoogleCharts, {'language': 'es'})
Vue.config.productionTip = false

new Vue({
  el: '#app',
  router,
  render: h => h(App)
}).$mount('#app')

