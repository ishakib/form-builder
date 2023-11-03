<template>
    <div class="form-builder">
        <div v-for="(section, sectionIndex) in sections" :key="sectionIndex" class="section">
            <div class="section-header">
                <h4 class="section-title">
          <span v-if="section.editingTitle">
            <input
                v-model="section.title"
                @blur="saveSectionTitle(sectionIndex)"
                @keydown.enter="saveSectionTitle(sectionIndex)"
                @keydown.esc="cancelEditSectionTitle(sectionIndex)"
                class="section-title-input form-control"
            />
            <button @click="saveSectionTitle(sectionIndex)" class="btn btn-primary mt-3">Save</button>
            <button @click="cancelEditSectionTitle(sectionIndex)" class="btn btn-secondary mt-3">Cancel</button>
          </span>
                    <span v-else>
            {{ section.title }}
            <button @click="editSectionTitle(sectionIndex)" class="btn btn-outline-primary ml-2">Edit</button>
          </span>
                </h4>
                <button @click="removeSection(sectionIndex)" class="btn btn-danger">Remove Section</button>
            </div>
            <draggable v-model="section.content" element="div" class="form-fields">
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
                            <button @click="removeItem(sectionIndex, itemIndex)"
                                    class="btn btn-danger btn-sm align-self-center">Remove
                            </button>
                        </div>
                        <component
                            :is="fieldComponentName(item.type)"
                            :field="item"
                            @update-option-label="updateOptionLabel"
                        />
                    </div>
                </div>
            </draggable>
            <div class="add-subsection-section p-3 border rounded mt-4">
                <button @click="addSubsection(sectionIndex)" class="btn btn-info p-2" style="margin-left: 10px;">Add
                    Subsection
                </button>
            </div>
        </div>
        <div class="add-section-section p-3 border rounded mt-4">
            <h4 class="add-section-title">Add a New Section</h4>
            <div class="form-input p-2">
                <label for="sectionTitle">Section Title:</label>
                <input v-model="newSectionTitle" type="text" class="form-control" id="sectionTitle">
            </div>
            <button @click="addSection" class="btn btn-success" style="margin-left: 10px;">Add Section</button>
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
            sections: [],
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
                this.sections.push({
                    title: this.newSectionTitle,
                    editingTitle: false,
                    content: [],
                });
                this.newSectionTitle = "";
            }
        },
        addSubsection(sectionIndex) {
            this.sections[sectionIndex].content.push({
                type: "checkbox",
                label: "Your Label Here",
                options: [{ label: "", value: "", checked: false }],
            });
        },

        // Add this method to update option label
        updateOptionLabel(field, index) {
            // Triggered when an option's label is updated in the child component
            // Do any necessary processing here
        },
        editSectionTitle(sectionIndex) {
            this.sections[sectionIndex].editingTitle = true;
        },
        saveSectionTitle(sectionIndex) {
            this.sections[sectionIndex].editingTitle = false;
        },
        cancelEditSectionTitle(sectionIndex) {
            this.sections[sectionIndex].editingTitle = false;
        },
        removeSection(sectionIndex) {
            this.sections.splice(sectionIndex, 1);
        },
        removeItem(sectionIndex, itemIndex) {
            this.sections[sectionIndex].content.splice(itemIndex, 1);
        },
        submitForm() {
            const formData = {
                sections: this.sections,
            };
            // Send a POST request with Axios here
            // axios.post('/your-api-endpoint', formData)
            //   .then(response => {
            //     console.log('Form submitted successfully');
            //   })
            //   .catch(error => {
            //     console.error('Error submitting the form', error);
            //   });
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
            this.sections[sectionIndex].content[itemIndex].options.push({label: "New Option", value: ""});
        },
    }
}
</script>

<style scoped>
/* Your styles go here */
</style>
