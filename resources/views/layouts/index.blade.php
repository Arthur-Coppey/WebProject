<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layouts/partials/_head')
    </head>
    <body style = height :100%>
        <header>
            @include('layouts/partials/_sidebar')
            @yield('navbar')
        </header>

        <main>
            @yield('main')
        </main>

        <footer>
            @include('layouts/partials/_footer')
        </footer>
    </body>
</html>
