import Vue from 'vue'
import Router from 'vue-router'
import Inicio from './components/inicio.vue'
import Informes from './components/informes.vue'
import Calendario from './components/calendario.vue'
import Estadisticas from './components/estadisticas.vue'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'inicio',
      component: Inicio
    },
    {
      path: '/informes',
      name: 'informes',
      component: Informes
    },
    {
      path: '/calendario',
      name: 'calendario',
      component: Calendario
    },
    {
      path: '/estadisticas',
      name: 'estadisticas',
      component: Estadisticas
    },
  ]
})