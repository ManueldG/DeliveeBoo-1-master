<template>
    <div class="container">
        <div class="search-bar">
            <input type="text" v-model="searchText" placeholder="Search" />
            <button @click="getRestaurants">Search</button>
        </div>
        <h1>Lista ristoranti</h1>
        <article v-for="restaurant in results" :key="restaurant.id">
            <h2>{{ restaurant.name }}</h2>
            <router-link
                :to="{
                    name: 'restaurant-detail',
                    params: { name: restaurant.name }
                }"
                >Restaurant Detail</router-link
            >
<<<<<<< HEAD
            <Cuisines :cuisines="restaurant.cuisines" />
=======
>>>>>>> fb33aa192e8ad8c01cb6b6a39f26582e0b2ee19e
        </article>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "Restaurants",
<<<<<<< HEAD
    components: {
        Cuisines,
    },
=======
>>>>>>> fb33aa192e8ad8c01cb6b6a39f26582e0b2ee19e
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
                    this.results = this.restaurants;
                })
                .catch(err => {
                    console.log(err);
                });
            } else if(this.searchText !== ""){
                var filteredRestaurant = this.restaurants.filter((element)=>{

                    for (const item of element.cuisines) {
                        return item.type.includes(this.searchText)
                    }
                });


                this.results = filteredRestaurant;
            }
        }
    }
};
</script>

<style></style>
