<template>
    <div class="card">
        <div
            class="plate-card"
            v-for="plate in plates"
            :key="`plate-${plate.id}`"
        >
            <img :src="plate.image" :alt="plate.name" />
            <h3>{{ plate.name }}</h3>
            <h3>{{ plate.description }}</h3>
            <div><strong>Price: </strong>{{ plate.price }}€</div>
            <div>
                <button @click="lessPlate(plate.price)">-</button>
                <span>{{quantita}}</span>
                <button @click="addPlate(plate.price)">+</button>
            </div>
            <div><strong>Avaiable: </strong></div>
            <span v-if="plate.visibility === 0"> No </span>
            <span v-else-if="plate.visibility === 1"> Yes </span>
        </div>
        <button @click="order(plateDetail)">Add To Cart/TOT:{{price.toFixed(2)}}€</button>
    </div>
</template>

<script>
export default {
    name: "Plates",
    props: {
        plates: Array
    },
    data(){
        return{
            quantita: 1,
            price: plate.price
        }
    },
    methods:{
        order(plateDetail){
            let order = {
                restaurant_id: plateDetail.restaurant_id,
                name: plateDetail.name,
                quantita: 0,
                price: plateDetail.price
            }
            this.$emit("addToCart", order, plateDatail.name, plateDetail.price);
        },
        lessPlate(price){
            if(this.quantita !== 1){
                this.quantita--;
                this.price -= price;
            }
        },
        addPlate(price){
            this.quantita++
            this.price += price;
        }
    }
};
</script>

<style scoped lang="scss">
.card {
    display: flex;
    flex-wrap: wrap;

    .plate-card {
        background: white;
        flex-basis: calc(100% / 4 - 20px);
        margin-right: 10px;
        padding: 20px;
        border-radius: 15px;

        img {
            width: 100%;
            height: 100px;
        }
    }
}
</style>
