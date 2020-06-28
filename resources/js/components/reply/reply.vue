<template>
    <div class="mt-3">
        <v-card>
            <v-card-title>
                <div class="headline">{{reply.UserName}}</div>
                <div class="ml-2">said {{reply.Created}}</div>
            </v-card-title>
            <v-divider></v-divider>

            <edit-reply
                v-if="editing"
                :reply=reply
            ></edit-reply>

            <v-card-text v-else v-html="replyBody"></v-card-text>

            <v-divider></v-divider>
            <div v-if="!editing">
                <v-card-actions v-if="own">
                    <v-btn icon small @click="edit">
                        <v-icon color="orange">edit</v-icon>
                    </v-btn>
                    <v-btn icon small @click="destroy">
                        <v-icon color="red">delete</v-icon>
                    </v-btn>
                </v-card-actions>
            </div>
        </v-card>
    </div>
</template>

<script>
    import EditReply from './editReply'
    export default {
        name: "reply",
        props:['reply','index'],
        components:{EditReply},
        data(){
            return{
                editing:false,
                beforeEditReplyBody:''
            }
        },
        computed:{
            own()
            {
                return User.own(this.reply.User_Id)
            },
            replyBody()
            {
                return md.parse(this.reply.Reply)
            }
        },
        created()
        {
            this.listen()
        },
        methods:
            {
            destroy()
            {
                EventBus.$emit('deleteReply', this.index)
            },
            edit()
            {
                this.editing = true
                this.beforeEditReplyBody = this.reply.Reply
            },
            listen()
            {
                EventBus.$on('cancelEditing', (reply)=>{
                    this.editing = false
                    if(reply !== this.reply.Reply)
                    {
                        this.reply.Reply = this.beforeEditReplyBody
                        this.beforeEditReplyBody = ''
                    }
                })
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
