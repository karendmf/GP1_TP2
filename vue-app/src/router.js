import Vue from 'vue'
import Router from 'vue-router'
import Inicio from './components/inicio.vue'
import Informes from './components/informes.vue'

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
    }
  ]
})