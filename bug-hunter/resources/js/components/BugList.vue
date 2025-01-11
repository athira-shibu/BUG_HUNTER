<template>
    <div class="bug-list">
        <h2>Bug List</h2>
        <ul>
            <li v-for="bug in bugs" :key="bug.id">
                {{ bug.title }} - {{ bug.status }}
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            bugs: [],
            api: 'http://localhost:8000/api/bugs',
        };
    },
    mounted() {
        this.fetchBugs();
    },
    methods: {
        async fetchBugs() {
            try {
                const response = await fetch('api/bugs');
                this.bugs = await response.json();
            } catch (error) {
                console.error("Error fetching bugs", error);
            }

            this.axios.get(this.api, this.bug)
                .then(res => {
                    console.log('Bug listed successfully:', res.data);
                })
                .catch(error => {
                    console.error('Error listing bugs:', error.response.data);
                });
        }
    }
}
</script>