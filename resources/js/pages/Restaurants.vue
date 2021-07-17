<template>
    <div class="container">
        <div class="search-bar">
            <input
                type="text"
                v-model="searchText"
                placeholder="Search for cuisine"
                @keyup.enter="getRestaurants"
            />
            <button @click="getRestaurants">Search</button>
        </div>
        <h1>Restaurant List</h1>
        <article v-for="restaurant in results" :key="restaurant.id">
            <h2>{{ restaurant.name }}</h2>
            <router-link
                :to="{
                    name: 'restaurant-detail',
                    params: { name: restaurant.name }
                }"
                >Restaurant Detail</router-link
            >
        </article>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "Restaurants",
    data() {
        return {
            apiURL: "http://127.0.0.1:8000/api/restaurants",
            restaurants: [],
            searchText: "",
            listRestaurant: [],
            results: []
        };
    },
    created() {
        this.getRestaurants();
    },
    methods: {
        getRestaurants() {
            if (this.searchText === "") {
                axios
                    .get(this.apiURL)
                    .then(res => {
                        this.restaurants = res.data;
                        this.results = this.restaurants;
                    })
                    .catch(err => {
                        console.log(err);
                    });
            } else if (this.searchText !== "") {
                var filteredRestaurant = this.restaurants.filter(element => {
                    for (const item of element.cuisines) {
                        return item.type.includes(this.searchText);
                    }
                });

                this.results = filteredRestaurant;
            }
        }
    }
};
</script>

<style scoped lang="scss">
.container {
    height: 80vh;

    .search-bar {
        display: flex;
        justify-content: flex-end;
    }

    h1 {
        margin: 20px;
        display: flex;
        justify-content: center;
    }

    h2 {
        margin: 10px 0;
    }
}
</style>
