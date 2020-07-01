<template>
    <div class="'mt-4">
        <vue-simplemde v-model="body"></vue-simplemde>

        <v-btn dark color="green" @click="create">Reply</v-btn>
    </div>
</template>

<script>
    export default {
        name: "newReply",
        props:['questionSlug'],
        data(){
            return {
                body:null
            }
        },
        methods:{
            create(){
                axios.post(`/api/${this.questionSlug}/reply`, {body:this.body})
                    .then(res=> {
                        this.body = ''
                        EventBus.$emit('newReply', res.data.reply)
                        window.scrollTo(0,0)
                    })
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
