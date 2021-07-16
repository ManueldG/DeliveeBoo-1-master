<template>
    <div class="container">
        <div class="search-bar">
            <input type="text" v-model="searchText" placeholder="Search" />
            <button @click="getRestaurants">Search</button>
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
            restaurants: [],
            searchText: '',
            listRestaurant: [],
            results: []
        };
    },
    created() {
        this.getRestaurants();
    },
    methods: {
        getRestaurants() {
            if(this.searchText === ""){
                axios
                .get(this.apiURL)
                .then(res => {
                    this.restaurants = res.data;
                })
                .catch(err => {
                    console.log(err);
                });
            } else if(this.searchText !== ""){
                var a = this.restaurants.filter((element) => {
                    for (const item of element.cuisines) {
                        return item.type.includes(this.searchText)
                    }
                });
                console.log(a);
                this.restaurants = a
            }
        }
    }
};
</script>

<style></style>
