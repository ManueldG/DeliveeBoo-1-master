<template>
    <div class="container">
        <h1>Homepage</h1>
            <ul v-for="cuisine in cuisines" :key="`cuisine-${cuisine.id}`">
                <li>
                    <label :for="cuisine.type">{{cuisine.type}}</label>
                    <input type="checkbox" :id="cuisine.type" :value="cuisine.type">
                </li>
            </ul>
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
import Cuisines from "../components/Cuisines.vue";
export default {
    name: "Home",
    components: {
        Cuisines,
    },
    data() {
        return {
            apiURL: "http://127.0.0.1:8000/api/restaurants",
            restaurants: [],
            listRestaurant: [],
            searchText: '',
            results: [],
            cuisines: [],
        };
    },
    created() {
        this.getRestaurants();
        axios
        .get("http://127.0.0.1:8000/api/cuisines")
        .then(res =>{
            this.cuisines = res.data
        })
        .catch(err =>{
            console.log(err);
        });
    },
    methods: {
      getRestaurants() {
            if (this.SearchText == '') {
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
                        if (item.type.includes(this.searchText))
                            return item.type;

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
