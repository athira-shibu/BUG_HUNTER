

import './bootstrap';
import { createApp } from 'vue';
import * as Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'

const app = createApp({});
// const app = Vue.createApp(...)
app.use(VueAxios, axios)


import BugCreationForm from './components/BugCreationForm.vue';
import LayoutStyles from './components/LayoutStyles.vue';
import FooterComponent from './components/FooterComponent.vue';
import SidebarComponent from './components/SidebarComponent.vue';
import StatisticsComponent from './components/StatisticsComponent.vue';
import RecentBugsSection from './components/RecentBugsSection.vue';

app.component('bug-creation-form', BugCreationForm);
app.component('layout-styles', LayoutStyles);
app.component('footer-component', FooterComponent);
app.component('sidebar-component', SidebarComponent);
app.component('statistics-component', StatisticsComponent);
app.component('recent-bugs-section', RecentBugsSection);


app.mount('#app');
