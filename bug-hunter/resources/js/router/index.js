import {createRouter, createWebHistory} from 'vue-router'
import BugCreationForm from '../components/BugCreationForm.vue'
import Home from '../components/Home.vue';
import BugList from '../components/BugList.vue';
import CategoryCreationForm from '../components/Category/CategoryCreationForm.vue';

const routes = [
    { path: '/', name:"Welcome", component:Home},
    { path: '/bug-creation', name:"BugCreation", component:BugCreationForm},
    { path: '/bug-list', name:"BugList", component:BugList},
    { path: '/category-creation', name:"CategoryCreation", component:CategoryCreationForm},
];

const router = createRouter({
    history: createWebHistory(),
    routes
});


export default router;
