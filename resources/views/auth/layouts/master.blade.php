<html lang="{{ App::getLocale() }}">
@include('auth.includes.header')

<body id="kt_body" class="app-blank">
    @yield('content')
    @include('auth.includes.footer')
    @include('auth.includes.script')
</body>

</html>
