<template>
    <header>
        <ul>
            <li>
                <a href="/">DeliveeBoo</a>
            </li>
            <li>
                <a href="/restaurants">Restaurant List</a>
            </li>
        </ul>
        <ul>
            <li>
                <a href="/admin">Admin</a>
            </li>
        </ul>
    </header>
</template>

<script>
export default {
    name: "Header"
};
</script>

<style scoped lang="scss">
header {
    background: white;
    margin-bottom: 50px;
    line-height: 3;
    display: flex;
    justify-content: space-between;

    ul {
        list-style: none;
        display: flex;

        li {
            padding-right: 15px;

            a {
                text-decoration: none;
            }
        }
    }
}
</style>
