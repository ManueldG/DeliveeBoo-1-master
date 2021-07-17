<template>
    <div>
        <span v-for="plate in plates" :key="`plate-${plate.id}`">
            {{plate.name}}
        </span>
    </div>    
</template>

<script>
export default {
    name: 'Plates',
    props: {
        plates: Array,
    }
}
</script>

<style></style>
