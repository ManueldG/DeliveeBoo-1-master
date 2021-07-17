<template>
    <div class="container">
        <h1 v-if="restaurant">Dettagli: {{ restaurant.name }}</h1>
        <div>
            <h2>Tipologie di cucine:</h2>
            <Cuisines :cuisines="restaurant.cuisines" />
        </div>
        <div>
            <img :src="restaurant.image" :alt="restaurant.name" />
            <p>{{ restaurant.description }}</p>
            <div>
                <h3>I nostri piatti</h3>
<<<<<<< HEAD
                <Menus :menus="restaurant.menus" />
=======
                <Plates :plates="restaurant.plates" />
>>>>>>> fb33aa192e8ad8c01cb6b6a39f26582e0b2ee19e
            </div>
            <h3>Contatti</h3>
            <ul>
                <li><strong>Address: </strong>{{ restaurant.address }}</li>
                <li><strong>City: </strong>{{ restaurant.city }}</li>
                <li><strong>Cap: </strong>{{ restaurant.cap }}</li>
                <li>
                    <strong>Phone number: </strong>{{ restaurant.phone_number }}
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import Plates from "../components/Plates.vue";
import Cuisines from "../components/Cuisines.vue";
<<<<<<< HEAD
import Menus from "../components/Menus.vue";
=======
>>>>>>> fb33aa192e8ad8c01cb6b6a39f26582e0b2ee19e
import axios from "axios";
export default {
    name: "RestaurantDetail",
    components: {
        Plates,
        Cuisines,
<<<<<<< HEAD
        Menus,
=======
>>>>>>> fb33aa192e8ad8c01cb6b6a39f26582e0b2ee19e
    },
    data() {
        return {
            restaurant: ""
        };
    },
    created() {
        this.getRestaurantDetail();
    },
    methods: {
        getRestaurantDetail() {
            axios
                .get(
                    `http://127.0.0.1:8000/api/restaurants/${this.$route.params.name}`
                )
                .then(res => {
                    this.restaurant = res.data;
                    // console.log(this.restaurant);
                })
                .catch(err => {
                    console.log(err);
                });
        }
    }
};
</script>

<style></style>
