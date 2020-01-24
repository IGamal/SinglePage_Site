<template>
    <v-card
        color="grey lighten-4"
        flat
        height="200px"
        tile
    >
        <v-toolbar dense>

            <v-toolbar-title>Discuss</v-toolbar-title>

            <v-spacer></v-spacer>

            <router-link to="/forum">
                <v-btn text>Forum</v-btn>
            </router-link>

            <router-link to="/form">
                <v-btn text>Ask Question</v-btn>
            </router-link>

            <router-link to="/form">
                <v-btn text>Category</v-btn>
            </router-link>

            <router-link to="/login">
                <v-btn text>Login</v-btn>
            </router-link>
        </v-toolbar>
    </v-card>
</template>

<script>
    export default {
        name: "Toolbar"
    }
</script>

<style lang="scss" scoped>

</style>
