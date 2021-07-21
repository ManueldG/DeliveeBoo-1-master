<template>
    <div class="container">
        <h1>Orders</h1>
        <table class="table mt-5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Date</th>
                    <th>TOT</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>John Doen</td>
                    <td>john@gmail.com</td>
                    <td>Via ciccio pasticcio, 20 | +05 65664656565</td>
                    <td>ordine effettuato/ arrivo</td>
                    <td>300€</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "Orders",
    data() {}
};
</script>

<style scoped lang="scss"></style>
