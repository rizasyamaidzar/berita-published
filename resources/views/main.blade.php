<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @yield('link')
</head>

<body>
    @include('guest.layouts.navbar')
    @yield('content')
    @include('guest.layouts.footer')
    @include('guest.layouts.script')
</body>

</html>
