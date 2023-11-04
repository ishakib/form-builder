<template>
    <div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Link</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item, index) in items" :key="index">
                <td>{{ item.name }}</td>
                <td>
                    <a :href="item.link" target="_blank">{{ item.link }}</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
export default {
    props: ['items'],
};
</script>
