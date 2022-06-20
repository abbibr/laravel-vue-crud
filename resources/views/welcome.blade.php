<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }

            [v-cloak] {
                display: none !important;
            }
        </style>
    </head>
    <body>
        <div id="app" v-cloak>
            <router-view></router-view>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    </body>
</html>
