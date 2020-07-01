<template>
    <div>
        <v-btn icon @click="likeIt">
            <v-icon :color="color">favorite</v-icon>{{count}}
        </v-btn>
    </div>
</template>

<script>
    export default {
        name: "like",
        props:['content'],
        data(){
            return{
                liked: this.content.Liked,
                count: this.content.Like_Count
            }
        },
        computed:{
            color()
            {
                return this.liked ? 'red' : 'red lighten-4';
            }
        },
        created(){
            Echo.channel('likeChannel')
                .listen('LikeEvent', (e) => {
                if(this.content.Identifier == e.id) { e.type == 1 ? this.count ++ : this.count -- }
                });
        },
        methods:{
            likeIt()
            {
                if(User.loggedIn())
                {
                    this.liked ? this.decr() : this.incr()
                    this.liked = !this.liked
                }
            },
            incr()
            {
                axios.post(`/api/like/${this.content.Identifier}`)
                    .then(res => this.count ++)
            },
            decr()
            {
                axios.post(`/api/unlike/${this.content.Identifier}`)
                    .then(res => this.count --)
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
