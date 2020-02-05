<template>
    <v-container>
        <form>
            <v-text-field
                v-model="form.email"
                label="E-mail"
                type="email"
                required
            ></v-text-field>

            <v-text-field
                v-model="form.password"
                label="Password"
                type="password"
                required
            ></v-text-field>

            <v-btn color="green" @click="login">Login</v-btn>

            <router-link to="/signup">
                <v-btn color="blue">Sign Up</v-btn>
            </router-link>
        </form>
    </v-container>
</template>
<script>
    export default {
        name: "login",
        data(){
            return{
                form:{
                    email:null,
                    password:null
                }
            }
        },
        created(){
            if(User.loggedIn()) { this.$router.push({name:'forum'}) }
        },
        methods:{
            login()
            {
                User.login(this.form)
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
