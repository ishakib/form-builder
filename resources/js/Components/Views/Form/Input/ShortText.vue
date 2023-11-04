    <template>
        <div>
            <label :for="field.id">{{ field.label }}:</label>
            <input
                type="text"
                v-model="field.value"
                :id="field.id"
                :name="field.name"
                class="form-control"
            />
        </div>
    </template>

    <script>
    export default {
        name: "ShortAnswerField",
        props: {
            field: Object,
        },
        created(){
            console.log("called")
        }
    };
    </script>
