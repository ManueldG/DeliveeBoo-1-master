<template>
    <div class="menu">
        <ul
            class="plate-card"
            v-for="plate in plates"
            :key="`plate-${plate.id}`"
        >
            <img :src="plate.image" :alt="plate.name" />
            <li>
                {{ plate.name }}
            </li>
            <li>
                {{ plate.description }}
            </li>

            <li><strong>Price: </strong>{{ plate.price }}€</li>
            <li>
                <strong>Avaiable: </strong>
                <span v-if="plate.visibility === 0"> No </span>
                <span v-else-if="plate.visibility === 1"> Yes </span>
            </li>
            <li>
                <button
                    class="btn btn-success"
                    @click="addCart(plate)"
                    v-if="plate.visibility === 1"
                >
                    Add to Cart
                </button>
                <button
                    class="btn btn-success"
                    @click="addCart(plate)"
                    v-else
                    disabled
                >
                    Add to Cart
                </button>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "Plates",
    props: ["plates"],
    data() {
        return {
            cart: []
        };
    },
    methods: {
        addCart(plate) {
            this.cart.push({
                name: plate.name,
                price: plate.price,
                quantity: 1
            });
            console.log(this.addCart);
        }
    }
};
</script>

<style scoped lang="scss">
.menu {
    display: flex;
    flex-wrap: wrap;
    .plate-card {
        background: white;
        flex-basis: calc(100% / 4 - 20px);
        margin-right: 10px;
        padding: 20px;
        border-radius: 15px;
        border: 1px solid #ccc;
        img {
            width: 100%;
            height: 200px;
        }
    }
}
</style>
