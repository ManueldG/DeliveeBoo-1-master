<template>
    <div class="card">
        <ul
            class="plate-card"
            v-for="plate in plates"
            :key="`plate-${plate.id}`"
        >
            <li>
                <img :src="plate.image" :alt="plate.name" />
            </li>
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
        </ul>
    </div>
</template>

<script>
export default {
    name: "Plates",
    props: {
        plates: Array
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
