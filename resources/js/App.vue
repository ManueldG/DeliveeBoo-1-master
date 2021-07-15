<template>
    <v-app>
        <Header/>

        <main>
            <router-view></router-view>
        </main>
    </v-app>
        
</template>

<script>
import Header from './components/Header';
export default {
    name: 'App',
    components:{
        Header,
    }
}
</script>

<style>

</style>