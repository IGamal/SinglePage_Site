<template>
    <v-container fluid grid-list-list-md>
        <v-layout row wrap>
            <v-flex xs8>
                <question
                    v-for="question in questions"
                    :key="question.Path"
                    :question = question>
                </question>
            </v-flex>
            SidBar
        </v-layout>
    </v-container>
</template>

<script>
    import Question from "./question";
    export default {
        name: "Forum",
        components: {Question},
        data(){
            return{
                questions:{}
            }
        },
        created() {
            axios.get('/api/question')
                .then(res => this.questions = res.data.data)
                .catch(error => console.log(error.response.data))
        }
    }
</script>

<style lang="scss" scoped>

</style>
