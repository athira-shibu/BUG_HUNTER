<template>
    <div>
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
                <input type="datetime-local" v-model="bug.raised_at" id="raised_at" required />
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div class="card-body">
            Journey to a full stack dev :-|.
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            bug: {
                title: '',
                description: [],  
                category: 1,
                raised_at: '',
                severity: 'high',  
                status: 'open',    
            },
            api: 'http://localhost:8000/api/bugs'
        };
    },

    methods: {
        submitForm() {
            if (typeof this.bug.description === 'string') {
                this.bug.description = this.bug.description.split('\n');
            }

            this.bug.raised_at = new Date(this.bug.raised_at).toISOString(); 

            // Sending the data to the backend API
            this.axios.post(this.api, this.bug)
                .then(res => {
                    console.log('Bug created successfully:', res.data);
                })
                .catch(error => {
                    console.error('Error creating bug:', error.response.data);
                });
        }
    }
};
</script>
