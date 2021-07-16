<template>
    <div class="container">
        <div class="card" v-for="menu in menus" :key="menu.plate.id">
            <h3>Name: {{ menu.plate.name }}</h3>
        </div>
    </div>
</template>

<script>
export default {
    name: Menus,
    props: {
        menus: Array
    }
};
</script>

<style></style>
