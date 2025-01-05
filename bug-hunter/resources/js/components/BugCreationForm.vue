<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Report your bug here....</div>
                    <form @submit.prevent="submitForm">
                        <div>
                            <label for="title">Title</label>
                            <input type="text" v-model="bug.title" id="title" required />
                        </div>
                        <div>
                            <label for="severity">Severity</label>
                            <select v-model="bug.severity" id="severity" required>
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
                        </div>
                        <div>
                            <label for="status">Status</label>
                            <select v-model="bug.status" id="status" required>
                                <option value="open">Open</option>
                                <option value="closed">Closed</option>
                            </select>
                        </div>
                        <div>
                            <label for="raised_at">Raised At</label>
                            <input type="datetime-local" v-model="bug.raised_at" id="raised_at" required />
                        </div>

                        <button type="submit">Submit</button>
                    </form>
                    <div class="card-body">
                        Journey to a full stack dev :-|.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
// import axios from 'axios';
    export default {
        data() {
            return{
                bug:{
                    'title': '',
                    'description': '',
                    'category': 1,
                    'raised_at': '',
                    'severity': '',
                    'status': ''
                },
                api: 'http://localhost:8000/api/bugs'
            }
        },

        mounted() {
            console.log('Component mounted.')
            // get api data here.
            this.bug.severity = 'high',
            this.bug.status = 'closed',
            this.bug.raised_at = new Date().toISOString();

            this.axios.post(this.api).then(res => {
                console.log(res);
            }).catch(error => {
                console.error(error.response);
            });
        }
    }
</script>
