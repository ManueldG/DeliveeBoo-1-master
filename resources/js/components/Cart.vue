<template>
    <main>
        <div class="container">
            <h1>Cart</h1>

            <div v-for="item in restaurant" :key="item.id">
                {{ item }}
            </div>
            <div v-if="Object.keys(cart).length">
                <div v-for="(item, index) in cart" :key="index">
                    <span>{{ item.quantita }}</span>
                    <span>{{ item.name }}</span>
                    <span>{{ item.price.toFixed(2) }}€</span>
                </div>
            </div>
            <div v-else>
                <span>Empty Cart</span>
            </div>
            <h3>Tot: {{ tot.toFixed(2) }}€</h3>
        </div>
    </main>
</template>

<script>
export default {
    name: "Cart",
    data() {
        return {
            tot: 0,
            cart: [],
            restaurant: ""
        };
    },
    created() {
        this.getBill();
        this.getRestaurantDetail();
    },
    methods: {
        getBill() {
            if (window.localStorage.getItem("cart")) {
                this.cart = JSON.parse(widnow.localStorage.getItem("cart"));
                for (let item in this.cart) {
                    this.tot += this.cart[item].price;
                }
            }
        },
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

<style></style>
