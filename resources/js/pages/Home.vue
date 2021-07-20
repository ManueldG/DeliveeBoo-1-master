<template>
    <div class="container">
        <h1>Homepage</h1>
            <ul v-for="cuisine in cuisines" :key="`cuisine-${cuisine.id}`">
                <li>
                    <label :for="cuisine.type">{{cuisine.type}}</label>
                    <input type="checkbox" :id="cuisine.type" :value="cuisine.type">
                </li>
            </ul>
        <article v-for="restaurant in restaurants" :key="`res-${restaurant.id}`">
            <h2>{{ restaurant.name }}</h2>
            <router-link :to="{name: 'restaurant-detail', params: { name: restaurant.id }}">Restaurant Detail</router-link>
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
        this.getCuisines();
    },
    methods: {
            getRestaurants() {
            axios
                .get('http://127.0.0.1:8000/api/restaurants')
                .then(res => {
                    this.restaurants = res.data;

                    /* this.restaurants.forEach(restaurant => {
                        restaurant.types.forEach(type => {
                            if(!this.types.includes(type.name)){
                                this.types.push(type.name);
                            }
                        });
                    }); */
                })
                .catch(err => {
                    console.log(err);
                });
        },
        getCuisines() {
            axios
                .get("http://127.0.0.1:8000/api/cuisines")
                .then(res =>{
                    this.cuisines = res.data
                })
                .catch(err =>{
                    console.log(err);
                });
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
