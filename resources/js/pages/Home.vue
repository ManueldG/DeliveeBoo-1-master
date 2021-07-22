<template>
    <div>
        <img class="jumbo" src="../img/jumbo.jpeg" alt="" />
        <div class="container">
            <h1>Homepage</h1>
            <ul v-for="cuisine in cuisines" :key="cuisine.id">
                <li>
                    <label :for="cuisine.type">{{ cuisine.type }}</label>
                    <input
                        type="checkbox"
                        :id="cuisine.type"
                        :value="cuisine.type"
                        v-model="temp"
                        @change="getRestaurants($event)"
                    />
                </li>
            </ul>

            <div
                class="card-rest"
                v-for="restaurant in restaurants.results"
                :key="`res-${restaurant.id}`"
            >
                <div class="rest">
                    <ul>
                        <li>
                            <h2>{{ restaurant.name }}</h2>
                        </li>
                        <li>
                            <img
                                class="img-fluid img"
                                :src="restaurant.image"
                                alt=""
                            />
                        </li>
                        <li>
                            <div class="badge bg-success">
                                {{ restaurant.type }}
                            </div>
                        </li>
                        <li>
                            <router-link
                                :to="{
                                    name: 'restaurant-detail',
                                    params: { name: restaurant.id }
                                }"
                                >Restaurant Detail</router-link
                            >
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import Cuisines from "../components/Cuisines.vue";
export default {
    name: "Home",
    components: {
        Cuisines
    },
    data() {
        return {
            apiURL: "http://127.0.0.1:8000/api/restaurants",
            restaurants: [],
            listRestaurant: [],
            searchText: "",
            results: [],
            cuisines: [],
            temp: [],
            query: ""
        };
    },
    created() {
        this.getRestaurants();
        this.getCuisines();
    },
    methods: {
        getRestaurants: function(e) {
            axios
                .get(this.apiURL + "/" + (this.temp.join("-")) )
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
                .get("http://127.0.0.1:8000/api/cuisines/")
                .then(res => {
                    this.cuisines = res.data;
                })
                .catch(err => {
                    console.log(err);
                });
        }
    }
};
</script>

<style scoped lang="scss">
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

.jumbo {
    width: 100%;
}

.card-rest {
    display: flex;
    flex-wrap: wrap;

    .rest {
        flex-basis: calc(100% / 3 - 20px);
        margin: 10px;

        img {
            border-radius: 5px;
        }
    }
}
</style>
