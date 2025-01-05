

import './bootstrap';
import { createApp } from 'vue';
import * as Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'

const app = createApp({});
// const app = Vue.createApp(...)
app.use(VueAxios, axios)


import BugCreationForm from './components/BugCreationForm.vue';
app.component('bug-creation-form', BugCreationForm);



app.mount('#app');
