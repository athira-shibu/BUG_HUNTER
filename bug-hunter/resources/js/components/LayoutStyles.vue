<template>
    <div class="page-layout">

    </div>
    <slot>
        <!-- to render page content -->
    </slot>
</template>

<script>
export default {
    name: "LayoutStyles"
};
</script>

<style scoped>
.page-layout {
    margin-top: 200px;
    padding: 0 20px;
    background-color: black !important;
    color: red;
    font-weight: bold;
}
</style>