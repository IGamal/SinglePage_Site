<template>
    <div>
        <toolbar></toolbar>
        <router-view></router-view>
        <app-footer></app-footer>
    </div>
</template>

<script>
    import Toolbar from "./Toolbar";
    import AppFooter from "./AppFooter";
    import Login from "./login/login";

    export default {
        name: "AppHome.vue",
        components: {Login, AppFooter, Toolbar}
    }
</script>

<style lang="sass">

</style>
