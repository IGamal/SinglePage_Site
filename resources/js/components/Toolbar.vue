<template>
    <v-card
        color="grey lighten-4"
        flat
        tile
    >
    <v-toolbar dense>

        <v-toolbar-title>Discuss</v-toolbar-title>

        <v-spacer></v-spacer>

        <app-notification v-if="LoggedIn"></app-notification>
        <router-link
            v-for="item in items"
            :key="item.title"
            :to="item.to"
            v-show="item.show">
            <v-btn>{{item.title}}</v-btn>
        </router-link>
    </v-toolbar>
    </v-card>
</template>

<script>
    import AppNotification from "./AppNotification";
    export default {
        name: "Toolbar",
        components: {AppNotification},
        data() {
            return{
                LoggedIn: User.loggedIn(),
                items:[
                        {title: "Forum", to: "/forum", show:true},
                        {title: "Ask Question", to: "/ask", show: User.loggedIn()},
                        {title: "Category", to: "/category", show: User.Admin()},
                        {title: "Login", to: "/login", show: !User.loggedIn()},
                        {title: "Logout", to: "/logout", show: User.loggedIn()},
                    ]
            }
        },
        created(){
            EventBus.$on('logout', () => { User.logout() })
        }
    }
</script>

<style lang="scss" scoped>

</style>
