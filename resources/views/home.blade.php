<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{csrf_token()}}">

        <title>Document</title>

        <link href="{{asset('css/app.css')}}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <v-app>
                <app-home></app-home>
            </v-app>
        </div>
    <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
<script>
    import Login from "../js/components/login/login";
    export default {
        components: {Login}
    }
</script>
