<template>
    <div>
        <vue-simplemde v-model="reply.Reply"></vue-simplemde>

        <v-card-actions>
            <v-btn icon small @click="update">
                <v-icon color="green">save</v-icon>
            </v-btn>
            <v-btn icon small @click="cancel">
                <v-icon color="black">cancel</v-icon>
            </v-btn>
        </v-card-actions>
    </div>
</template>

<script>
    export default {
        name: "editReply",
        props:['reply'],
        methods: {
            update() {
                axios.patch(`/api/${this.reply.Question_Slug}/reply/${this.reply.Identifier}`,
                    {body:this.reply.Reply})
                    .then(res => this.cancel(this.reply.Reply))
            },
            cancel(reply) {
                EventBus.$emit('cancelEditing', reply);
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
