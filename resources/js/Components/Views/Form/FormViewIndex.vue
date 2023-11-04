<template>
    <div>
        <h1>Form View</h1>

        <!-- Loop through sections -->
        <div v-for="(section, sectionIndex) in dataForm.sections" :key="sectionIndex">
            <div class="section-header">
                <div class="section-title">
                    <span>{{ section.title }}</span>
                </div>
            </div>

            <!-- Loop through content within each section -->
            <div v-for="(item, itemIndex) in section.content" :key="itemIndex" class="form-field card">
                <div class="form-field-content card-body">
                    <div class="form-group d-flex">
                        <div class="form-input p-2">
                            <label for="label">Label Name:</label>
                            <input v-model="item.label" type="text" class="form-control" id="label">
                        </div>
                        <div class="form-input p-2">
                            <label for="inputType">Input Type:</label>
                            <span>{{ getInputTypeLabel(item.type) }}</span>
                        </div>
                    </div>

                    <!-- Render the appropriate input component based on the type -->
                    <component
                        :is="fieldComponentName(item.type)"
                        :field="item"
                    ></component>
                </div>
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
    }
};
</script>
