<template>
    <div class="form-builder">
        <div class="form-input p-2">
            <label for="inputType">Form name:</label>
            <input
                v-model="formData.name"
            />
        </div>
        <div class="section" v-for="(section, sectionIndex) in formData.sections" :key="sectionIndex">
            <div class="section-header">
                <div class="section-title">
                      <span v-if="section.editing_title">
                        <input
                            v-model="section.title"
                            @blur="saveSectionTitle(sectionIndex)"
                            @keydown.enter="saveSectionTitle(sectionIndex)"
                            @keydown.esc="cancelEditSectionTitle(sectionIndex)"
                            class="section-title-input form-control"
                        />
                        <button @click="saveSectionTitle(sectionIndex)" class="btn btn-primary mt-3">Save</button>
                        <button @click="cancelEditSectionTitle(sectionIndex)"
                                class="btn btn-secondary mt-3">Cancel</button>
                      </span>
                    <span v-else> {{ section.title }}
                        <button @click="editSectionTitle(sectionIndex)"
                                class="btn btn-outline-primary ml-2">Edit</button>
                    </span>
                </div>
                <span class="fa fa-trash cp" @click="removeSection(sectionIndex)"></span>
            </div>
            <draggable v-model="section.content" element="div" class="form-fields p-3">
                <div v-for="(item, itemIndex) in section.content" :key="itemIndex" class="form-field card">
                    <div class="form-field-content card-body">
                        <div class="form-group d-flex">
                            <div class="form-input p-2">
                                <label for="label">Label Name:</label>
                                <input v-model="item.label" type="text" class="form-control" id="label">
                            </div>
                            <div class="form-input p-2">
                                <label for="inputType">Select an Input Type:</label>
                                <select v-model="item.type" class="form-control" id="inputType">
                                    <option v-for="type in inputTypes" :key="type.value" :value="type.value">
                                        {{ type.label }}
                                    </option>
                                </select>
                            </div>
                            <span class="fa fa-trash cp" @click="removeItem(sectionIndex, itemIndex)"></span>
                        </div>
                        <component
                            :is="fieldComponentName(item.type)"
                            :field="item"
                            @update-option-label="updateOptionLabel"
                        />
                    </div>
                </div>
            </draggable>
            <div class="add-subsection-section p-3 rounded mt-4 d-flex justify-content-between">
                <button class="btn btn-info w-100 cp" @click="addSubsection(sectionIndex)">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="add-section-section p-3 border rounded mt-4 d-flex justify-content-between">
            <div class="form-input p-2">
                <label for="sectionTitle">Section Title:</label>
                <input v-model="newSectionTitle" type="text" class="form-control" id="sectionTitle">
            </div>
            <span class="fa fa-plus cp" @click="addSection"></span>
        </div>
        <div class="mt-3">
            <div class="d-flex justify-content-between">
                <button @click="submitForm" class="btn btn-primary w-100">Submit Form</button>
            </div>
        </div>
    </div>
</template>

<script>
import draggable from "vuedraggable";
import ShortAnswerField from "./Input/ShortText.vue";
import LongAnswerField from "./Input/LongText.vue";
import CheckBoxField from "./Input/CheckBox.vue";
import MultipleChoiceAnswerField from "./Input/MultipleChoice.vue";
import DropDownField from "./Input/DropDown.vue";
import TimeField from "./Input/Time.vue";
import DateField from "./Input/Date.vue";

export default {
    name: "FormCreateIndex",
    components: {
        draggable,
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
            inputTypes: [
                {value: "short_answer", label: "Short Answer"},
                {value: "long_answer", label: "Long Answer"},
                {value: "checkbox", label: "Checkbox"},
                {value: "multiple_choice", label: "Multiple Choice"},
                {value: "dropdown", label: "Dropdown"},
                {value: "time", label: "Time"},
                {value: "date", label: "Date"}
            ]
        };
    },
    methods: {
        addSection() {
            if (this.newSectionTitle) {
                this.formData.sections.push({
                    title: this.newSectionTitle,
                    editing_title: false,
                    content: [],
                });
                this.newSectionTitle = "";
            }
        },
        addSubsection(sectionIndex) {
            this.formData.sections[sectionIndex].content.push({
                type: "checkbox",
                label: "",
                options: [{label: "", value: "", checked: false}],
            });
        },

        // Add this method to update option label
        updateOptionLabel(field, index) {
            // Triggered when an option's label is updated in the child component
            // Do any necessary processing here
        },
        editSectionTitle(sectionIndex) {
            this.formData.sections[sectionIndex].editing_title = true;
        },
        saveSectionTitle(sectionIndex) {
            this.formData.sections[sectionIndex].editing_title = false;
        },
        cancelEditSectionTitle(sectionIndex) {
            this.formData.sections[sectionIndex].editing_title = false;
        },
        removeSection(sectionIndex) {
            this.formData.sections.splice(sectionIndex, 1);
        },
        removeItem(sectionIndex, itemIndex) {
            this.formData.sections[sectionIndex].content.splice(itemIndex, 1);
        },
        submitForm() {
            axios.post('/admin/form', this.formData)
                .then(response => {
                    console.log('Form submitted successfully');
                })
                .catch(error => {
                    console.error('Error submitting the form', error);
                });
        },
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
        addOption(sectionIndex, itemIndex) {
            this.formData.sections[sectionIndex].content[itemIndex].options.push({label: "New Option", value: ""});
        },
    }
}
</script>
