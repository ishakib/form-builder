<template>
    <div class="form-builder">
        <div class="form-input p-2">
            <label for="inputType">Form name:</label>
            <input
                v-model="dataForm.name"
            />
        </div>
        <div class="section" v-for="(section, sectionIndex) in dataForm.sections" :key="sectionIndex">
            <div v-for="(item, itemIndex) in section.contents" :key="itemIndex" class="form-field card">
                <div class="form-field-content card-body">
                    <component
                        :is="fieldComponentName(item.type)"
                        :field="item"
                        :editor-mode="false"
                    />
                </div>
            </div>
        </div>
        <div class="mt-3">
            <div class="d-flex justify-content-between">
                <button @click="submitForm" class="btn btn-primary w-100">Submit Form</button>
            </div>
        </div>
    </div>
</template>

<script>

import ShortAnswerField from "./Input/ShortText.vue";
import LongAnswerField from "./Input/LongText.vue";
import CheckBoxField from "./Input/CheckBox.vue";
import MultipleChoiceAnswerField from "./Input/MultipleChoice.vue";
import DropDownField from "./Input/DropDown.vue";
import TimeField from "./Input/Time.vue";
import DateField from "./Input/Date.vue";

export default {
    name: "FormViewIndex",
    props: {
        dataForm: {
            name: '',
            sections: [],
        },
        inputTypes: {
            type: Array,
            required: true,
        },
    },
    components: {
        ShortAnswerField,
        LongAnswerField,
        CheckBoxField,
        MultipleChoiceAnswerField,
        DropDownField,
        TimeField,
        DateField,
    },
    data() {
        return {
            formData: {
                name: '',
                sections: [],
            },
            newSectionTitle: "",
        };
    },
    methods: {
        fieldComponentName(type) {
            const componentMap = {
                short_answer: "ShortAnswerField",
                long_answer: "LongAnswerField",
                checkbox: "CheckBoxField",
                multiple_choice: "MultipleChoiceAnswerField",
                dropdown: "DropDownField",
                time: "TimeField",
                date: "DateField",
            };
            return componentMap[type] || "div";
        },
        getInputTypeLabel(type) {
            const inputTypeMap = {
                short_answer: "Short Answer",
                long_answer: "Long Answer",
                checkbox: "Checkbox",
                multiple_choice: "Multiple Choice",
                dropdown: "Dropdown",
                time: "Time",
                date: "Date",
            };
            return inputTypeMap[type] || "Unknown";
        },
        submitForm() {
            const formdata = {
                data: this.formData,
                form_id: this.dataForm.id
            }
            axios.post('/form/submission', formdata)
                .then(response => {
                    console.log('Form submitted successfully');
                })
                .catch(error => {
                    console.error('Error submitting the form', error);
                });
        }
    }
};
</script>
