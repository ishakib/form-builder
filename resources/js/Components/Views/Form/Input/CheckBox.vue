<template>
    <div>
        <label>{{ field.label }}</label>
        <div class="mt-1" v-for="(option, index) in field.options" :key="index">
            <input type="checkbox" :id="getOptionId(index)" :value="option.value" v-model="option.checked" />
            <input v-model="option.label" @input="updateOptionLabel(field, index)" />
            <span class="fa fa-trash cp" @click="removeOption(field, index)"></span>

        </div>
        <button  @click="addOption(field)"
                class="btn btn-success mt-2">Add Option
        </button>
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
    methods: {
        getOptionId(index) {
            return `option_${index}`;
        },
        addOption(field) {
            field.options.push({ label: "", value: "", checked: false });
        },
        removeOption(field, index) {
            field.options.splice(index, 1);
        },
        updateOptionLabel(field, index) {
            // Emit an event to notify the parent component of the label change
            this.$emit("update-option-label", field, index);
        },
    },
};
</script>
