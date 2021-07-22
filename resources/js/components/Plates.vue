<template>

    <div class="menu" >
        <div
            v-for="pla in plates"
            :key="`pla-${pla.id}`"
        >

        <div
            class="plate-card"
            v-for="plate in pla"
            :key="`plate-${plate.id}`"
        >
            <ul v-if="plate.visibility">
                <img :src="plate.image" :alt="plate.name" />
                <li>
                    {{ plate.restaurant }}
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
                <li v-if=(plate.visibility)>
                    <button @click="less(plate.price)"> - </button>
                    <span>{{quantity}}</span>
                    <button @click="more(plate.price)"> + </button>
                    <button @click="addPlate(plate)" >Aggiungi al carrello | TOT: {{plate.price.toFixed(2)}} €</button>
                </li>
                <li v-else disabled>
                    <button>Non disponibile</button>
                </li>
            </ul>
        </div>
        </div>
    </div>


</template>

<script>
export default {
    name: "Plates",
    props: ["plates"],
    data() {
        return {
            cart: {},
            price: this.plate.price,
            quantity: 1,
        };
    },
    methods: {
      addPlate(plate){

      let order={
        restaurant_id: plate.restaurant_id,
        name: plate.name,
        quantità: this.quantity,
        prezzo: this.price,
      }

        this.$emit('addCart', order, plate.name, plate.price);
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
