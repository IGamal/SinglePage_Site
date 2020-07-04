<template>
    <v-container>
        <v-alert v-if="errors" type="error" :value="true">Category Title Can't be Blank</v-alert>
        <form>
            <v-text-field
                v-model="form.name"
                label="Title"
                type="text"
                required
            ></v-text-field>

            <v-btn color="pink" @click="update" v-if="editSlug" :disabled="disabled">Update</v-btn>
            <v-btn color="teal" @click="create" v-else :disabled="disabled">Create</v-btn>

        </form>

        <v-list>
            <div>
                <v-list-item v-for="(Category,index) in categories" :key="Category.Identifier">
                    <v-btn icon small @click="edit(index)">
                        <v-icon color="orange">edit</v-icon>
                    </v-btn>

                    <v-list-item-content>
                        <v-list-item-title>{{Category.Name}}</v-list-item-title>
                    </v-list-item-content>

                    <v-btn icon small @click="destroy(Category.Slug, index)">
                        <v-icon color="red">delete</v-icon>
                    </v-btn>
                </v-list-item>
                <v-divider></v-divider>
            </div>
        </v-list>
    </v-container>
</template>

<script>
    export default {
        name: "CategoryCRUD",
        data(){
            return {
                form:{
                    name: null
                },
                categories:{},
                editSlug: null,
                errors:null
            }
        },
        created(){
            if(!User.Admin()) { this.$router.push('/forum')}

            axios.get('api/category')
                .then(res => this.categories = res.data.data)
        },
        methods: {
            create(){
                axios.post('/api/category', this.form)
                    .then(res => {
                        this.categories.unshift(res.data)
                        this.form.name = null
                    })
                    .catch(error => this.errors = error.response.data.errors)
            },
            edit(index)
            {
                this.form.name = this.categories[index].Name
                this.editSlug = this.categories[index].Slug
                this.categories.splice(index,1)
            },
            update()
            {
                axios.patch(`/api/category/${this.editSlug}`, this.form)
                    .then(res => {
                        this.categories.unshift(res.data)
                        this.form.name = null
                    })
            },
            destroy(slug, index){
                axios.delete(`/api/category/${slug}`)
                    .then(res => this.categories.splice(index,1))
            }
        },
        computed:{
            disabled()
            {
                return !this.form.name
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
