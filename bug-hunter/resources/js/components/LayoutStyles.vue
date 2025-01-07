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
    margin-top: 20px;
    padding: 20px 20px;
    background-color: black !important;
}
</style>