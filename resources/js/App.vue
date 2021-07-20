<template>
    <div>
        <Header />
        <router-view></router-view>
        <Footer />
    </div>
</template>

<script>
import Header from "./components/Header";
import Footer from "./components/Footer";
export default {
    name: "App",
    components: {
        Header,
        Footer
    }
};
</script>

<style lang="scss">
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: "Helvetica Neue", Helvetica, "Segoe UI", Arial, freesans,
        sans-serif;
}

body {
    background: lightgray;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    min-height: 100vh;
}

ul {
    list-style-type: none;

    li {
        margin: 10px 0;
    }
}
</style>
