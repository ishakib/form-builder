<template>
    <div>
        <label>{{ field.label }}</label>
        <datepicker v-model="selectedDate" format="yyyy-MM-dd"></datepicker>
    </div>
</template>

<script>
import Datepicker from 'vuejs-datepicker';

export default {
    components: {
        Datepicker,
    },
    props: {
        field: Object,
    },
    data() {
        return {
            selectedDate: '',
        };
    },
};
</script>
