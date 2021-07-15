<template>
    <div class="container">
        <h1>Lista ristoranti</h1>
        <article v-for="restaurant in restaurants" :key="restaurant.id">
            <h2>{{restaurant.name}}</h2>
            <router-link :to="{name:'restaurant-detail', params:{name:restaurant.name}}">Restaurant Detail</router-link>
                <Cuisines :cuisines='restaurant.cuisines'/>
              <!--   <div class="search-bar">
                    <input
                        :class="{ bar: search }"
                        type="text"
                        placeholder="Search"
                        v-model.trim="searchText"
                        @keyup="$emit('performSearch', searchText)"
                        ref="inputSearch"
                    />
                </div> -->
        </article>
    </div>
</template>

<script>
import axios from 'axios';
import Cuisines from '../components/Cuisines.vue'
export default {
    name: 'Restaurants',
    components: {
        Cuisines
    },
    data(){
        return {
            restaurants: [],
        }
    },
    created(){
        this.getRestaurants();
    },
    methods: {
        getRestaurants(){
            axios.
            get('http://127.0.0.1:8000/api/restaurants')
            .then(res => {
                this.restaurants = res.data;
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