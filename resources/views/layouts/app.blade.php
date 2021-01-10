<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.links')
</head>
<body>
<main id="app">
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
</main>

@include('layouts.scripts')
</body>
</html>
