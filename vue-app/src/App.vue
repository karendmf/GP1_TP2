<template>
  <v-app id="app">
    <v-navigation-drawer
      v-model="drawer"
      clipped
      fixed
      app
    >
    <v-toolbar flat class="transparent pl-5 mb-3">
        <v-list>
          <v-list-tile avatar>
            <v-list-tile-avatar>
              <img src="https://randomuser.me/api/portraits/men/3.jpg">
            </v-list-tile-avatar>

            <v-list-tile-content>
              <v-list-tile-title>Lucas Lagos</v-list-tile-title>
              <v-list-tile-sub-title>Sujeto de prueba</v-list-tile-sub-title>
            </v-list-tile-content>
          </v-list-tile>
        </v-list>
      </v-toolbar>
          <v-divider></v-divider>
      <v-list dense>
        
        <v-list-tile to="/">
          <v-list-tile-action>
            <v-icon>dashboard</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Inicio</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
        <v-list-tile to="/informes">
          <v-list-tile-action>
            <v-icon>list_alt</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Informes</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
    </v-navigation-drawer>
    <v-toolbar app fixed clipped-left color='cyan darken-1' dark>
      <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
      <v-toolbar-title><v-btn icon large>
        <v-avatar size="40px" tile>
          <img
            src="./assets/logo_blanco.svg"
            alt="reportS"
          >
        </v-avatar>
      </v-btn></v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn icon>
        <v-icon>notifications</v-icon>
      </v-btn>
      <v-btn icon>
        <v-icon>settings</v-icon>
      </v-btn>
      
    </v-toolbar>
    <v-content>
      <v-container fluid>
            <v-fade-transition mode="out-in">
              <router-view></router-view>
            </v-fade-transition>
        </v-container>
    </v-content>
    <v-footer app fixed height="auto">
      <v-card
      class="flex"
      flat
      tile
    >
      <v-card-actions class="justify-center">
         <strong>Framework e Interoperabilidad</strong> — &copy;2018
      </v-card-actions>
    </v-card>
    </v-footer>
  </v-app>
</template>

<script>
import HelloWorld from './components/HelloWorld.vue'
import axios from 'axios'
export default {
  name: 'app',
  components: {
    HelloWorld
  },
  data: () => ({
      drawer: true
    }),
    props: {
      source: String
    }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

</style>
