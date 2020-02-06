<template>
    <v-card>
        <v-toolbar color="cyan" dark dense class="mt-2">
            <v-toolbar-title>Categories</v-toolbar-title>
        </v-toolbar>

        <v-list>
            <v-list-item v-for="Category in Categories" :key="Category.Identifier">
                <v-list-item-content>
                    <v-list-item-title>{{Category.Name}}</v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-list>
    </v-card>
</template>

<script>
    export default {
        name: "AppSidebar",
        data(){
            return{
                Categories:{}
            }
        },
        created(){
            axios.get('/api/category')
                .then(res => this.Categories = res.data.data)
        }
    }
</script>

<style lang="scss" scoped>

</style>
