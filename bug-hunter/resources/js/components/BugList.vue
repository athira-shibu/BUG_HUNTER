<template>
    <div class="bug-list">
        <h2>Bug List</h2>
        <ul>
            <li v-for="bug in bugs" :key="bug.id">
                {{ bug.name }} - {{ bug.status }}
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            bugs: []
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
        }
    }
}
</script>