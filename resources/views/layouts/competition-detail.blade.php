<!DOCTYPE html>
<html lang='{{ str_replace('_', '-', app()->getLocale()) }}'>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>

        <title>@yield('title')</title>

        @vite('resources/css/app.css')
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body class="text-slate-800">

        <main class='container grid mx-auto items-center h-[100vh] px-4'>
            @yield('content')
        </main>

    @yield('scripts')

    </body>
</html>
