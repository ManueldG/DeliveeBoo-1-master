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

            <!-- <li><strong>Price: </strong>{{ plate.price }}€</li>
            <li>
                <strong>Avaiable: </strong>
                <span v-if="plate.visibility === 0"> No </span>
                <span v-else-if="plate.visibility === 1"> Yes </span>
            </li> -->
            <li v-if=(plate.visibility)>
                <button @click="less(plate.price)"> - </button>
                <span>{{quantity}}</span>
                <button @click="more(plate.price)"> + </button>
                <button @click="addDish(plate), $emit('close')" >Aggiungi al carrello | TOT: {{price.toFixed(2)}} €</button>
            </li>
            <li v-else disabled>
                <button>Non disponibile</button>
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
            cart: {},
            price: this.plates.price,
            quantity: 1,
        };
    },
    methods: {
      addPlate(plates){

      let order={
        restaurant_id: plates.restaurant_id,
        name: plates.name,
        quantità: this.quantity,
        prezzo: this.price,
      }

        this.$emit('addToCart', order, plates.name, plates.price);
      },
      more(price){
        this.quantity++;
        this.price += price;
      },
      less(price){
        if(this.quantity != 1){
          this.quantity --;
          this.price -= price;
        }
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
