<template>
    <div>
        <label>Multiple Choice:</label>
        <div v-for="(choice, index) in choices" :key="index">
            <input type="radio" :id="'choice_' + index" v-model="selectedChoice" :value="choice" />
            <label :for="'choice_' + index">{{ choice }}</label>
        </div>
        <p>Selected choice: {{ selectedChoice }}</p>
    </div>
</template>

<script>
export default {
    data() {
        return {
            choices: ['Option 1', 'Option 2', 'Option 3', 'Option 4'], // Define your choices here
            selectedChoice: '', // Initialize with an empty string
        };
    },
};
</script>
