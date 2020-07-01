<template>
    <div>
        <reply
        v-for="(reply,index) in content"
        :key="reply.id"
        :index="index"
        :reply="reply"></reply>
    </div>
</template>

<script>
    import Reply from './reply'
    export default {
        name: "replies",
        props:['question'],
        data(){
            return{
                content:this.question.replies
            }
        },
        components:{Reply},
        created() {
            this.listen()
        },
        methods:{
            listen(){
                EventBus.$on('newReply', (reply) => {
                    this.content.unshift(reply)
                });

                EventBus.$on('deleteReply', (index) => {
                    axios.delete(`/api/${this.question.Slug}/reply/${this.content[index].Identifier}`)
                    .then(res => {
                        this.content.splice(index,1)
                    })
                });

                Echo.private('App.User.' + User.id())
                    .notification((notification ) =>{
                        this.content.unshift(notification.reply)
                    });

                Echo.channel('deleteReplyChannel')
                    .listen('DeleteReplyEvent', (e) => {
                    for(let index = 0 ; index < this.content.length; index++)
                    {
                        if(this.content[index].Identifier == e.id) { this.content.splice(index,1) }
                    }
                    });
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
