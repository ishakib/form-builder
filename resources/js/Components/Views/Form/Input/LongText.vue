<template>
    <div>
        <label for="longText">Long Text:</label>
        <textarea v-model="longText" id="longText" rows="5"></textarea>
        <p>Entered text:</p>
        <div class="entered-text">{{ longText }}</div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            longText: '', // Initialize with an empty string
        };
    },
};
</script>
