<template>
    <v-container fluid>
        <v-card>
            <v-form>
                <v-text-field
                    v-model="form.Title"
                    label="Title"
                    type="text"
                    required
                ></v-text-field>

                <vue-simplemde v-model="form.Body"></vue-simplemde>

                <v-card-actions>
                    <v-btn icon small @click="update">
                        <v-icon color="teal">save</v-icon>
                    </v-btn>
                    <v-btn icon small @click="cancel">
                        <v-icon>cancel</v-icon>
                    </v-btn>
                </v-card-actions>
            </v-form>
        </v-card>
        </v-container>
</template>
<script>
    export default {
        name: "EditQuestion",
        props: ['question'],
        data(){
            return {
                form: {
                    Title: null ,
                    Body: null
                }
            }
        },
        created(){
            this.form = this.question
        },
        methods:{
            update()
            {
                axios.patch(`/api/question/${this.question.Slug}`,this.form)
                    .then(res => this.cancel())
            },
            cancel(){
                EventBus.$emit('cancelEditing')
            }
        }
    }
</script>

<style lang="scss" scoped>
</style>

