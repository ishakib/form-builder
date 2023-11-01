<template>
    <div>
        <label>{{ field.label }}</label>
        <input type="checkbox" v-model="checked" />
    </div>
</template>

<script>
export default {
    props: {
        field: Object,
    },
    data() {
        return {
            checked: false,
        };
    },
    watch: {
        checked() {
            this.$emit('input', this.checked);
        },
    },
};
</script>
