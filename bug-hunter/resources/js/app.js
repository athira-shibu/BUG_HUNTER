

import './bootstrap';
import { createApp } from 'vue';


const app = createApp({});

import BugCreationForm from './components/BugCreationForm.vue';
app.component('bug-creation-form', BugCreationForm);



app.mount('#app');
