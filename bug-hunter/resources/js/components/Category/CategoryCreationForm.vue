<template>
    <div>
        <div>
            <sidebar-component />
        </div>
        <form @submit.prevent="submitForm">
            <div>
                <label for="name">Name</label>
                <input type="text" v-model="category.name" id="name" required />
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            category: {
                name: ''
            },
            api: 'http://localhost:8000/api/categories',
            successMessage: ""
        };
    },
    methods: {
        submitForm() {
            this.axios.post(this.api, this.category)
            .then(res => {
                console.log('Category created successfully:', res.data);
            })
            .catch(error => {
                console.error('Error creating category:', error.res.data);
            });
        }
    }
}
</script>