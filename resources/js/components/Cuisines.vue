<template>
    <div>
        <span v-for="cuisine in cuisines" :key="`cuisine-${cuisine.id}`"
            >{{ cuisine.type }}
        </span>
    </div>
</template>

<script>
export default {
    name: "Cuisines",
    props: ["cuisines"]
};
</script>

<style scoped lang="scss">
div {
    display: flex;

    span {
        justify-content: center;
        align-self: center;
        margin-right: 5px;
        background: dodgerblue;
        padding: 5px;
        border-radius: 10px;
        color: white;
    }
}
</style>
