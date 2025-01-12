<template>
    <div class="category-list">
        <div>
            <sidebar-component />
        </div>
        <h2 class="bug-list-heading">Category List</h2>
        <!-- Category List table -->
         <table>
            <thead>
                <tr>Name</tr>
            </thead>
            <tbody>
                <tr v-for="category in categories" :key="category.id">
                    <td>{{ category.name }}</td>
                </tr>
            </tbody>
         </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            categories: [],
            api: 'http://localhost:8000/api/categories',
        };
    },
    mounted() {
        this.fetchCategories();
    },
    methods: {
        async fetchCategories() {
            try {
                const res = await this.axios.get(this.api);
                console.log('Category listed successfully:', res.data);
                this.categories = res.data; // Assign the fetched data to `categories`
            } catch (error) {
                console.error('Error listing categories:', error.response.data);
            }

            this.axios.get(this.api, this.category)
            .then(res => {
                console.log('Category listed successfully:', res.data);
            })
            .catch(error => {
                console.error('Error listing categories:', error.res.data);
            });
        }
    }
}
</script>