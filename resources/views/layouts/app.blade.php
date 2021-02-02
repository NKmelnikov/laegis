<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.links')
</head>
<body>
<main id="app">
    @include('layouts.header')
    @include('layouts.sidebar')
    @yield('content')
    @include('layouts.footer')
</main>
<script>
    window._locale = '{{ app()->getLocale() }}';
    window._translations = {!! cache('translations') !!};
</script>
@include('layouts.scripts')

</body>
</html>
