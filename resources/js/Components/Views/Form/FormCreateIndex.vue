<template>
    <div>
        <div class="form-builder">
            <div v-if="fields.length === 0" class="no-fields-message">
                <div class="alert alert-info" role="alert">
                    No fields attached. Click "Add Field" to get started.
                </div>
            </div>

            <draggable v-else v-model="fields" element="div" class="form-fields">
                <div v-for="(field, index) in fields" :key="index" class="form-field card">
                    <div class="form-field-header card-header">
                        <h5 class="mb-0">Field {{ index + 1 }}</h5>
                        <button @click="removeField(index)" class="btn btn-danger btn-sm">Remove</button>
                    </div>
                    <div class="form-field-content card-body">
                        <div class="form-group">
                            <label for="field-type">Field Type:</label>
                            <select v-model="field.type" class="form-control">
                                <option value="short_answer">Short Answer</option>
                                <option value="long_answer">Long Answer</option>
                                <option value="multiple_choice">Multiple Choice</option>
                                <option value="checkbox">Checkbox</option>
                                <option value="dropdown">Dropdown</option>
                                <option value="time">Time</option>
                                <option value="date">Date</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="field-label">Field Label:</label>
                            <input type="text" v-model="field.label" class="form-control" placeholder="Enter field label" />
                        </div>
                        <div v-if="field.type === 'multiple_choice'" class="form-group">
                            <label for="field-choices">Choices (comma-separated):</label>
                            <input type="text" v-model="field.choices" class="form-control" placeholder="Choice 1, Choice 2, ..." />
                        </div>
                    </div>
                </div>
            </draggable>
        </div>
        <button @click="addField" class="btn btn-primary mt-3">Add Field</button>
        <button @click="submitForm" class="btn btn-primary mt-3">Submit Form</button>

    </div>
</template>

<script>
import draggable from 'vuedraggable';
import axios from 'axios';
export default {
    name: "FormCreateIndex",
    components: {
        draggable, // Register the draggable component
    },
    data() {
        return {
            fields: [], // Store form fields
        };
    },
    methods: {
        addField() {
            this.fields.push({
                type: 'short_answer',
                label: 'Field Label',
                choices: '', // For multiple_choice, checkbox, dropdown fields
            });
        },
        removeField(index) {
            this.fields.splice(index, 1);
        },
        submitForm() {
            // Prepare the data to be sent
            const formData = {
                fields: this.fields,
            };

            console.log(formData)
            // Make a POST request to your server
            // axios.post('/your-api-endpoint', formData)
            //     .then(response => {
            //         // Handle a successful response here
            //         console.log('Form submitted successfully');
            //     })
            //     .catch(error => {
            //         // Handle any errors here
            //         console.error('Error submitting the form', error);
            //     });
        },
    },
};
</script>

<style scoped>
.form-builder {
    border: 1px solid #ccc;
    padding: 20px;
    border-radius: 5px;
}

.form-field {
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 15px;
    background-color: #f9f9f9;
    margin: 15px 0;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.form-field-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.form-field-header h3 {
    font-size: 18px;
    margin: 0;
}

.form-field-header button {
    background-color: #ff5252;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 5px 10px;
    cursor: pointer;
}

.form-field-content {
    margin-top: 10px;
}

.form-field-type select,
.form-field-label input,
.form-field-choices input {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 3px;
    margin-top: 8px;
}

.form-field-choices label {
    margin-top: 10px;
}
.no-fields-message {
    text-align: center;
    margin-top: 20px;
}

.no-fields-message .alert {
    background-color: #d6e9c6; /* Change the background color */
    border-color: #c6e1b6; /* Change the border color */
    color: #3c763d; /* Change the text color */
    font-size: 16px; /* Change the font size */
    border-radius: 5px;
}



/* Add more styles as needed */
</style>
