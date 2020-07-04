<template>
    <v-card>
        <v-container>
            <v-card-title primary-title>
                <div>
                    <div class="headline"> {{question.Title}} </div>
                    <span class="grey--text" >{{question.UserName}} asked {{question.Created}}</span>
                </div>
                <v-spacer></v-spacer>
                <v-btn color="teal">{{ReplyCount}} Replies</v-btn>
            </v-card-title>
            <v-card-text v-html="body"></v-card-text>

            <v-card-actions v-if="own">
                <v-btn icon small @click="edit">
                    <v-icon color="orange">edit</v-icon>
                </v-btn>
                <v-btn icon small @click="destroy">
                    <v-icon color="red">delete</v-icon>
                </v-btn>
            </v-card-actions>
        </v-container>
    </v-card>
</template>

<script>
    import md from 'marked'

    export default {
        name: "ShowQuestion",
        props: ['question'],
        data(){
            return {
                own : User.own(this.question.UserId),
                ReplyCount: this.question.reply_count
            }
        },
        computed:{
            body(){
                return md.parse(this.question.Body)
            }
        },
        created()
        {
            EventBus.$on('newReply', () => {
                this.ReplyCount++
            });


            Echo.private('App.User.' + User.id())
                .notification((notification ) =>{
                    this.ReplyCount++
                });

            EventBus.$on('deleteReply', () => {
                this.ReplyCount--
            });
            
            Echo.channel('deleteReplyChannel')
                .listen('DeleteReplyEvent', (e) => {
                    this.ReplyCount--
                });
        },
        methods:{
            edit(){
                EventBus.$emit('startEditing')
            },
            destroy(){
                axios.delete(`/api/question/${this.question.Slug}`)
                    .then(res => this.$router.push('/forum'))
                    .catch(error => console.log(error.response.data))
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
