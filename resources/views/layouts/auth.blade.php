<!DOCTYPE html>
<html lang='{{ str_replace('_', '-', app()->getLocale()) }}'>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('img/tcfest%202025.png') }}" type="image/png">

    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="text-slate-800">

    <main class='grid items-center'>
        @yield('content')
    </main>

    @yield('scripts')

</body>

</html>
