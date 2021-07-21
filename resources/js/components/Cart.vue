<template>
    <main>
        <div class="container">
            <h1>Cart</h1>
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
    },
    methods: {
        getBill() {
            if (window.localStorage.getItem("cart")) {
                this.cart = JSON.parse(window.localStorage.getItem("cart"));
                for (let item in this.cart) {
                    this.tot += this.cart[item].price;
                }
            }
        }
    }
};
</script>

<style></style>
