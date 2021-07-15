<template>
    <div>
        <span v-for="cuisine in cuisines" :key="`cuisine-${cuisine.id}`">{{cuisine.type}} </span>
    </div>
</template>

<script>
export default {
    name: 'Cuisines',
    props: [
        'cuisines'
    ]
}
</script>

<style>

</style>