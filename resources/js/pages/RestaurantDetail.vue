<template>
    <div class="container">
        <h1 v-if="restaurant">Dettagli: {{restaurant.name}}</h1>
        <div>
            <h2>Tipologie di cucine:</h2>
            <Cuisines :cuisines='restaurant.cuisines'/>
        </div>
        <div>
            <img :src="restaurant.image" :alt="restaurant.name">
            <p>{{restaurant.description}}</p>
            <div>
                <h3>I nostri piatti</h3>
               <!--  <ul>
                    <li>
                        nome: {{}}
                    </li>
                </ul> -->
            </div>
            <h3>Contatti</h3>
            <ul>
                <li><strong>Address: </strong>{{restaurant.address}}</li>
                <li><strong>City: </strong>{{restaurant.city}}</li>
                <li><strong>Cap: </strong>{{restaurant.cap}}</li>
                <li><strong>Phone number: </strong>{{restaurant.phone_number}}</li>
            </ul>
        </div>
    </div>
</template>

<script>
import Cuisines from '../components/Cuisines.vue';
import axios from 'axios';
export default {
    name: 'RestaurantDetail',
    components: {
        Cuisines
    },
    data(){
        return {
            restaurant: '',
        }
    },
    created(){
        this.getRestaurantDetail();
    },
    methods: {
        getRestaurantDetail(){
            axios.
            get(`http://127.0.0.1:8000/api/restaurants/${this.$route.params.name}`)
            .then(res => {
                this.restaurant = res.data;
            })
            .catch(err => {
                console.log(err);
            })
        }
    }
}
</script>

<style>

</style>