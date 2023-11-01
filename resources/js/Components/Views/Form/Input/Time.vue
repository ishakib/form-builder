<template>
    <div>
        <label for="timePicker">Select a Time:</label>
        <time-picker
            id="timePicker"
            v-model="selectedTime"
            :config="timePickerConfig"
        ></time-picker>
        <p>Selected time: {{ selectedTime }}</p>
    </div>
</template>

<script>
import TimePicker from 'vue2-timepicker';

export default {
    components: {
        TimePicker,
    },
    data() {
        return {
            selectedTime: '', // Initialize with an empty string
            timePickerConfig: {
                format: 'HH:mm',
            },
        };
    },
};
</script>
