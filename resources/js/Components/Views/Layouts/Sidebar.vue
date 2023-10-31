<template>
    <div>
        <nav id="sidebar">
            <ul class="mt-4 list-unstyled components">
                <li class="nav-item"  v-for="(item, index) in data">
                    <a class="nav-link" :href="item.id ? '#'+item.id : item.url">{{ item.name }}</a>
                </li>
            </ul>
        </nav>

    </div>
</template>

<script>
export default {
    name: "Sidebar.vue",
    props: {
        data: {
            required: true
        },
    },
    data() {
        return {}
    }
}
</script>

<style scoped>

</style>
