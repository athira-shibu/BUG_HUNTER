import './bootstrap';
import { createApp } from 'vue';
import axios from 'axios';
import VueAxios from 'vue-axios';
import router from './router';
import App from './components/App.vue';

// Component Imports
import BugCreationForm from './components/BugCreationForm.vue';
import LayoutStyles from './components/LayoutStyles.vue';
import FooterComponent from './components/FooterComponent.vue';
import SidebarComponent from './components/SidebarComponent.vue';
import StatisticsComponent from './components/StatisticsComponent.vue';
import RecentBugsSection from './components/RecentBugsSection.vue';
import Home from './components/Home.vue';

const app = createApp(App);

// Global Component Registration
app.component('bug-creation-form', BugCreationForm);
app.component('layout-styles', LayoutStyles);
app.component('footer-component', FooterComponent);
app.component('sidebar-component', SidebarComponent);
app.component('statistics-component', StatisticsComponent);
app.component('recent-bugs-section', RecentBugsSection);
app.component('home', Home);
app.component('app', App);

// Use Plugins
app.use(router);
app.use(VueAxios, axios);

// Mount Vue App
app.mount('#app');
