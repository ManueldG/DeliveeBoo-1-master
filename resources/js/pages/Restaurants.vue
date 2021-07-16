<template>
    <div class="container">
        <div class="search-bar">
            <input type="text" placeholder="Search" />
            <!-- <button @click="search">Search</button> -->
        </div>
        <h1>Lista ristoranti</h1>
        <article v-for="restaurant in restaurants" :key="restaurant.id">
            <h2>{{ restaurant.name }}</h2>
            <router-link
                :to="{
                    name: 'restaurant-detail',
                    params: { name: restaurant.name }
                }"
                >Restaurant Detail</router-link
            >
            <Cuisines :cuisines="restaurant.cuisines" />
        </article>
    </div>
</template>

<script>
import axios from "axios";
import Cuisines from "../components/Cuisines.vue";
export default {
    name: "Restaurants",
    components: {
        Cuisines
    },
    data() {
        return {
            apiURL: "http://127.0.0.1:8000/api/restaurants",
            restaurants: []
        };
    },
    created() {
        this.getRestaurants();
        // this.getData();
    },
    methods: {
        getRestaurants() {
            axios
                .get(this.apiURL)
                .then(res => {
                    this.restaurants = res.data;
                    console.log(this.restaurants);
                    console.log(res);
                })
                .catch(err => {
                    console.log(err);
                });
        }
        // getData(search) {
        //     if (search !== "") {
        //         axios.get(this.apiURL);
        //     }
        // }
    }
};
</script>

<style></style>
