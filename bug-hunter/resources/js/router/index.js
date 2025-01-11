import {createRouter, createWebHistory} from 'vue-router'
import BugCreationForm from '../components/BugCreationForm.vue'
import Home from '../components/Home.vue';

const routes = [
    { path: '/', name:"Welcome", component:Home},
    { path: '/bug-creation', name:"BugCreation", component:BugCreationForm}
];

const router = createRouter({
    history: createWebHistory(),
    routes
});


export default router;
