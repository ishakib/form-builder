<template>
    <div>
        <label for="dropdown">Select an option:</label>
        <select v-model="selectedOption" id="dropdown">
            <option value="option1">Option 1</option>
            <option value="option2">Option 2</option>
            <option value="option3">Option 3</option>
        </select>
        <p>Selected option: {{ selectedOption }}</p>
    </div>
</template>

<script>
export default {
    data() {
        return {
            selectedOption: 'option1', // Set a default selected option
        };
    },
};
</script>
