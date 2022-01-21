require('./bootstrap')

import { createApp } from 'vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import axios from 'axios'
import VueAxios from 'vue-axios'
import Welcome from './components/Welcome'

const app = createApp({})

app.component('hello-world', Welcome)
app.use(VueAxios, axios)
app.mount('#app')
