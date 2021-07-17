<template>
    <div class="container">
        <div class="card" v-for="menu in menus" :key="menu.id">
            <div v-if="menu.visibility == 1">
                <h3>Name: {{ menu.name }}</h3>
                <div><img :src="menu.image" :alt="menu.name"></div>
                <p>{{ menu.description }}</p>
                <div>Price: {{ menu.price}}</div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: Menus,
    props: [
        'menus'
    ]
};
</script>

<style></style>
