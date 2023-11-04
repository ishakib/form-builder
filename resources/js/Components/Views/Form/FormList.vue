<template>
    <div>
        <h1>Form List</h1>
        <table-component :items="tableData"></table-component>
    </div>
</template>

<script>
import TableComponent from "../Helpers/TableComponent.vue";

export default {
    data() {
        return {
            tableData: [
                { name: 'Item 1', link: 'https://example.com/link1' },
                { name: 'Item 2', link: 'https://example.com/link2' },
                { name: 'Item 3', link: 'https://example.com/link3' },
            ],
        };
    },
    components: {
        'table-component': TableComponent,
    },
};
</script>
