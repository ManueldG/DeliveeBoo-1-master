<template>
    <div class="container">
        <h1 v-if="restaurant">Dettagli: {{ restaurant.name }}</h1>
        <div class="mar">
            <h2 class="mb">Tipologie di cucine:</h2>
            <Cuisines :cuisines="restaurant.cuisines" />
        </div>
        <div class="mar">
            <img :src="restaurant.image" :alt="restaurant.name" />
            <p class="mar">{{ restaurant.description }}</p>
            <div>
                <h3 class="mb">I nostri piatti</h3>
                <Plates :plates="restaurant" />
            </div>
            <div class="mar">
                <h3>Contatti</h3>
                <ul>
                    <li><strong>Address: </strong>{{ restaurant.address }}</li>
                    <li><strong>City: </strong>{{ restaurant.city }}</li>
                    <li><strong>Cap: </strong>{{ restaurant.cap }}</li>
                    <li>
                        <strong>Phone number: </strong
                        >{{ restaurant.phone_number }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
import Plates from "../components/Plates.vue";
import Cuisines from "../components/Cuisines.vue";
import axios from "axios";
export default {
    name: "RestaurantDetail",
    components: {
        Plates,
        Cuisines,
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
                    `http://127.0.0.1:8000/api/plates/${this.$route.params.name}`
                )
                .then(res => {
                    this.restaurant = res.data;
                    console.log(this.restaurant);
                })
                .catch(err => {
                    console.log(err);
                });
        }
    }
};
</script>

<style scoped lang="scss">
.mar {
    margin: 20px 0;
    img {
        border-radius: 5px;
    }
}
.mb {
    margin-bottom: 10px;
}
</style>
