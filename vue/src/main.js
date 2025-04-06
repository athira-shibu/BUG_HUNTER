import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import store from '.'
import './index.css'

createApp(App)
.use(store)
.mount('#app')
