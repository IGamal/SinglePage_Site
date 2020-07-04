<template>
    <div v-if="question">
        <edit-question
            v-if="editing"
            :question = question
        ></edit-question>

        <show-question
            v-else
            :question = question
        ></show-question>

        <v-container>
            <Replies :question="question"></Replies>

            <new-reply v-if="loggedIn" :questionSlug="question.Slug"></new-reply>
            <div class="mt-4" v-else>
                <router-link to="/login">Login in to Reply</router-link>
            </div>
        </v-container>
    </div>
</template>

<script>
    import ShowQuestion from "./ShowQuestion";
    import EditQuestion from "./EditQuestion";
    import Replies from "../reply/replies";
    import NewReply from "../reply/newReply";

    export default {
        name: "Read",
        components: {ShowQuestion, EditQuestion, Replies, NewReply},
        data(){
            return {
                question:null,
                editing: false,
            }
        },
        created() {
            this.getQuestion()
            this.listen()
        },
        computed:{
            loggedIn() { return User.loggedIn()}
        },
        methods:{
            getQuestion(){
                axios.get(`/api/question/${this.$route.params.slug}`)
                    .then(res => this.question = res.data.data)
                    .catch(error => console.log(error.response.data))
            },
            listen(){
                EventBus.$on('startEditing', ()=>{
                    this.editing = true
                })

                EventBus.$on('cancelEditing', ()=>{
                    this.editing = false
                })
            },

        }
    }
</script>

<style lang="scss" scoped>

</style>
