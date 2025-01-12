<template>
    <div>
        <div>
            <sidebar-component />
        </div>
        <p class="headings">Report your bug here....</p>
        <form @submit.prevent="submitForm">
            <!-- Title -->
            <div>
                <label for="title">Title</label>
                <input type="text" v-model="bug.title" id="title" required />
            </div>
            <div>
                <label for="description">Description</label>
                <textarea v-model="bug.description" id="description" required></textarea>
            </div>
            <!-- Category -->
            <div>
                <label for="category">Category</label>
                <select v-model="bug.category_id" id="category" required>
                    <option v-for="category in categories" :key="category.id" :value="category.id">
                        {{ category.name }} test data
                    </option>
                </select>
            </div>

            <!-- Severity -->
            <div>
                <label for="severity">Severity</label>
                <select v-model="bug.severity" id="severity" required>
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                </select>
            </div>
            <!-- Status -->
            <div>
                <label for="status">Status</label>
                <select v-model="bug.status" id="status" required>
                    <option value="open">Open</option>
                    <option value="closed">Closed</option>
                </select>
            </div>
            <!-- Raised At -->
            <div>
                <label for="raised_at">Raised At</label>
                <input type="date" v-model="bug.raised_at" id="raised_at" required />
            </div>

            <div>
                <label for="solution">Solution</label>
                <textarea v-model="bug.solution" id="solution"></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <!-- showing a success message -->
        <div v-if="successMessage" class="success-message">
            {{ successMessage }}
        </div>
    </div>
</template>

<script>
import { values } from 'lodash';

export default {
    data() {
        return {
            bug: {
                title: '',
                description: '',  
                category_id: '',
                raised_at: '',
                severity: 'high',  
                status: 'open', 
                solution: ''  
            },
            categories: [],
            api: {
                bugs: 'http://localhost:8000/api/bugs',
                categories: 'http://localhost:8000/api/categories',
            },
            successMessage: ""
        };
    },
    mounted() {
        this.fetchCategories();
    },
    methods: {
        fetchCategories() {
            this.axios.get(this.api.categories)
            .then(res => {
                console.log('Category fetched successfully:', res.data);
                this.categories = res.data;
            })
            .catch(error => {
                console.log("Error in fetching categories:", error.res.data);
            });
        },
        submitForm() {
            this.bug.raised_at = new Date(this.bug.raised_at).toISOString(); 

            // Sending the data to the backend API
            this.axios.post(this.api.bugs, this.bug)
                .then(res => {
                    console.log('Bug created successfully:', res.data);
                })
                .catch(error => {
                    console.error('Error creating bug:', error.response.data);
                });

            setTimeout(() => {
                this.successMessage = "Bug has been reported successfully.";
            }, 500);
            setTimeout(() => {
                this.successMessage = ""
            }, 3000)
        },
    },
};
</script>
