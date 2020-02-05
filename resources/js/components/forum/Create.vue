<template>
    <v-container>
        <form>
            <v-text-field
                v-model="form.title"
                label="Title"
                type="text"
                required
            ></v-text-field>

            <v-select
                :items="categories"
                item-text="Name"
                item-value="Identifier"
                v-model="form.category_id"
                label="Category"
                autocomplete
            ></v-select>

            <vue-simplemde v-model="form.body"></vue-simplemde>

            <v-btn color="green" @click="create">Create</v-btn>
        </form>
    </v-container>
</template>
<script>
    export default {
        name: "Create",
        data(){
            return{
                form:{
                    title:null,
                    category_id:null,
                    body:null
                },
                categories:{},
                errors:{}
            }
        },
        created(){
            axios.get('/api/category')
                .then(res => this.categories = res.data.data)
        },
        methods:{
            create()
            {
                axios.post('/api/question',this.form)
                    .then(res => this.$router.push(res.data.Path))
                    .catch(error => this.errors = error.response.data.error)
            }
        }
    }
</script>

<style lang="scss" scoped>
</style>
