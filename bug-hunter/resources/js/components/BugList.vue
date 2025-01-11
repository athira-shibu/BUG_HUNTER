<template>
    <div class="bug-list">
        <div>
            <sidebar-component />
        </div>
        <h2>Bug List</h2>

        <!-- BUg list table -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Severity</th>
                    <th>Status</th>
                    <th>Raised at</th>
                    <th>Solution</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="bug in bugs" :key="bug.id">
                    <td>{{ bug.id }}</td>
                    <td>{{ bug.title }}</td>
                    <td>{{ bug.description }}</td>
                    <td>{{ bug.severity }}</td>
                    <td>{{ bug.status }}</td>
                    <td>{{ bug.raised_at }}</td>
                    <!-- <td>{{ formatDate(bug.raised_at) }}</td> -->

                    <td>{{ bug.solution }}</td>
                    <td><button @click="editBug(bug.id)">Edit</button></td>
                    <td><button @click="deleteBug(bug.id)">Delete</button></td>
                </tr>
            </tbody>
        </table>
        <!-- <ul>
            <li v-for="bug in bugs" :key="bug.id">
                {{ bug.title }} - {{ bug.status }}
            </li>
        </ul> -->
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
        },
        editBug(id) {
            console.log("Editing bug with id:", id);
        },
        deleteBug(id) {
            console.log("Deleting bug with id:", id);
        }
    }
}
</script>