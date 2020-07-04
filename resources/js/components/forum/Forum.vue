<template>
    <v-container fluid grid-list-list-md>
        <v-layout row wrap>
            <v-flex xs8>
                <question
                    v-for="question in questions"
                    :key="question.Path"
                    :question = question>
                </question>

                <div class="text-xs-center">
                    <v-pagination
                        v-model="meta.current_page"
                        :length="meta.last_page"
                        @input="changePage">
                    </v-pagination>
                </div>
            </v-flex>

            <v-flex xs4>
                <app-sidebar></app-sidebar>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
    import Question from "./question";
    import AppSidebar from "./AppSidebar";
    export default {
        name: "Forum",
        components: {AppSidebar, Question},
        data(){
            return{
                questions:{},
                meta:{},
            }
        },
        created() { this.fetchQuestions() },

        methods:{
            fetchQuestions(page)
            {
                let url = page ? `/api/question?page=${page}` : '/api/question'
                axios.get(url)
                    .then(res => {
                        this.questions = res.data.data
                        this.meta = res.data.meta
                    })
                    .catch(error => console.log(error.response.data))
            },
            changePage(page) { this.fetchQuestions(page)}
        }
    }
</script>

<style lang="scss" scoped>

</style>
