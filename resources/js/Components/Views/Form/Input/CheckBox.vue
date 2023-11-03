<template>
    <div>
        <label>{{ field.label }}</label>
        <div v-for="(option, index) in field.options" :key="index">
            <input type="checkbox" :id="getOptionId(index)" :value="option.value" v-model="selectedOptions" />
            <label :for="getOptionId(index)">{{ option.label }}</label>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        field: {
            type: Object,
            required: true,
        },
    },
    data() {
        return {
            selectedOptions: [], // Store selected options
        };
    },
    watch: {
        selectedOptions() {
            this.$emit('input', this.selectedOptions);
        },
    },
    methods: {
        getOptionId(index) {
            // Create a unique ID for each option
            return `option_${index}`;
        },
    },
};
</script>
