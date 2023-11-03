<template>
    <div>
        <div class="form-group">
            <div class="ml-5 p-2" v-for="(option, index) in field.options" :key="index">
                <div class="input-group mb-2">
                    <input
                        class="form-control"
                        v-model="option.label"
                        @input="updateOptionLabel(option, index)"
                    />
                    <div class="input-group-append">
                        <span v-if="field.options.length !== 1" class="fa fa-minus cp p-2" @click="removeOption(index)"></span>
                        <span v-if="index === field.options.length - 1" class="fa fa-plus cp p-2" @click="addOption"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="d-flex align-items-center">
                <label class="mb-2 mr-2">{{ field.label }}</label>
                <select class="form-control" v-model="selectedOption">
                    <option value="">Select an option</option>
                    <option
                        v-for="(option, index) in field.options"
                        :key="index"
                        :value="option.value"
                    >{{ option.label }}</option>
                </select>
            </div>
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
            selectedOption: "",
        };
    },
    methods: {
        addOption() {
            this.field.options.push({ label: "", value: "" });
        },
        removeOption(index) {
            this.field.options.splice(index, 1);
        },
        updateOptionLabel(option, index) {
            this.$set(this.field.options, index, option);
        },
    },
};
</script>
