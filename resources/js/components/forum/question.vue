<template>
    <v-card class="mt-2">
        <v-card-title primary-title>
            <div>
                <h3 class="headline mb-0">
                    <router-link :to= "question.Path"> {{question.Title}}</router-link>
                </h3>
                <div class="grey--text" >{{question.UserName}} asked {{question.Created}}</div>
            </div>
        </v-card-title>
        <v-card-text>
            {{question.Body}}
        </v-card-text>
    </v-card>
</template>

<script>
    export default {
        name: "question",
        props:['question']
    }
</script>

<style lang="scss" scoped>

</style>
