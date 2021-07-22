<template>
    <div class="container">

            <h1 >Dettagli: {{ restaurant.name }}</h1>
            <div class="mar">
                <h2 class="mb">Tipologie di cucine:</h2>
                <Cuisines :cuisines="restaurant.cuisines" />
            </div>
            <div class="mar">
                <img :src="restaurant.image" :alt="restaurant.name" />
                <p class="mar">{{ restaurant.description }}</p>
                <div>
                    <h3 class="mb">I nostri piatti</h3>
                    <Plates :plates="{plates}" />
                </div>
            </div>


        <!-- Cart -->
        <div class="cart">
            <h2>Il tuo Carrello</h2>

            <!-- Products -->
            <div v-if="Object.keys(cart).length" >
                <div v-for="(item, index) in cart" :key="index">
                    <button  @click="remove(item.name, item.unitPrice)">-</button>
                    <input class="inputNum" type="number" min="1" v-model="item.quantità" @change="updateQuantity($event, item.name, item.unitPrice)">
                    <button @click="add(item.name, item.unitPrice)">+</button>
                    <span class="name">{{item.name}}</span>
                    <span>€ {{item.price.toFixed(2)}}</span>
                    <span class="remove" @click="removeAll(item.name, item.price)">X</span>
                </div>
            </div>

            <div v-else>Il carrello è vuoto</div>

            <!-- Tot -->
            <h3>Tot: €{{tot.toFixed(2)}}</h3>

            <!-- CheckOut Button -->
            <router-link :to="{name: 'checkout'}">Cassa</router-link>

            <!-- Delete Button -->
            <button @click="deleteCart()">Elimina Carrello</button>
        </div>

            <div class="mar">
                <h3>Contatti</h3>
                <ul>
                    <li><strong>Address: </strong>{{ restaurant[0].address }}</li>
                    <li><strong>City: </strong>{{ restaurant[0].city }}</li>
                    <li><strong>Cap: </strong>{{ restaurant[0].cap }}</li>
                    <li>
                        <strong>Phone number: </strong
                        >{{ restaurant[0].phone_number }}
                    </li>
                </ul>
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
            restaurant: '',
            plates: [],
            visibility: false,
            cart: {},
            tot: 0,
        };
    },
    created() {
        this.getRestaurantDetail();

        this.getPlate();

        this.popCart();
    },
    methods: {

        getPlate() {
            axios
                .get(
                    `http://127.0.0.1:8000/api/plates/${parseInt(this.$route.params.name)}`
                )
                .then(res => {
                    this.plates = res.data;
                })
                .catch(err => {
                    console.log(err);
                });
        },
        getRestaurantDetail() {
            axios
                .get(
                    `http://localhost:8000/api/restaurants/id/${parseInt(this.$route.params.name)}`
                )
                .then(res => {
                    this.restaurant = res.data;
                })
                .catch(err => {
                    console.log(err);
                });
        },
        /**
         * Populate Cart with localStorage
         */
        popCart(){
            if(window.localStorage.getItem('cart')){
                this.cart = JSON.parse(window.localStorage.getItem('cart'));
                this.setTotal();
            }
        },

        addCart(order, name, unitPrice) {
            if(this.checkId()) {
                if(this.cart[name]){
                    this.cart[name].quantity += order.quantity;
                    this.cart[name].price += order.price;
                } else {
                    this.cart[name] = {...order, unitPrice};
                }
                this.tot += order.price;
                this.store();
                this.closeDetail();
            }
        },

        /**
         * Check for
         */
        checkId(){
            if(Object.keys(this.cart).length != 0){
                if(this.cart[Object.keys(this.cart)[0]].restaurant_id == this.plates.restaurant_id) {
                    return true;
                }else {
                    const resp = confirm('Puoi ordinare da un solo ristorante. Vuoi cancellare il tuo ordine precedente?');
                    if(resp) {
                        this.cart = {};
                        this.tot = 0;
                        return true;
                    } else {
                        return false;
                    }
                }
            }else{
                return true;
            }
        },

        /**
         * Add Button in Cart
         */
        add(name, unit){
            this.cart[name].quantity ++;
            this.cart[name].price += unit;
            this.tot += unit;
            this.store();
        },

        /**
         * Remove Button in Cart
         */
        remove(name, unit){
            if(this.cart[name].quantity == 1){
                delete this.cart[name];
            } else {
                this.cart[name].quantity --;
                this.cart[name].price -= unit;
            }
            this.tot -= unit;
            this.store();
        },

        /**
         * Remove one record in Cart
         */
        removeAll(item, price){
            console.log(item);
            console.log(price);
            delete this.cart[item];
            this.tot -= price;
            this.store();
        },

        /**
         * Set Quantity from Input in Cart
         */
        updateQuantity(e,name, unit){
            const value = parseFloat(e.target.value);
            if(value>0){
                console.log(value);
                this.cart[name].quantity = value;
                this.cart[name].price = (value * unit);
                this.tot = 0;
                this.setTotal();
                this.store();
            } else {
                this.cart[name].quantity = 1;
                this.cart[name].price = unit;
                this.tot = 0;
                this.setTotal();
                this.store();
            }
        },

        /**
         * Set Total Amount
         */
        setTotal(){
            for(let item in this.cart){
                this.tot+=this.cart[item].price;
            };
        },

        /**
         * Save Cart in localStorage
         */
        store(){
            window.localStorage.setItem('cart', JSON.stringify(this.cart));
        },

        /**
         * Eliminate Entire Cart
         */
        deleteCart(){
            const resp = confirm('Vuoi cancellare il tuo ordine?');
            if(resp){
                this.cart = {};
                this.tot = 0;
                window.localStorage.clear();
            }
        },
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
