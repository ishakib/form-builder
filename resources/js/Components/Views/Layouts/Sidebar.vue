<template>
    <div>
        <nav id="sidebar">
            <ul class="mt-4 list-unstyled components" v-for="item in data">
                <li>
                    <a href="#">{{ item.name }}</a>
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
