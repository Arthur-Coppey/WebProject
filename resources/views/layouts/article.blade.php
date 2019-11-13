<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layouts/partials/_articlehead', ['label', $label])
    </head>
    <body>
        <header>
            @include('layouts/partials/_sidebar')
            @include('layouts/partials/_navbar')
        </header>

        <main>
            @yield('main')
        </main>

        <footer>
            @include('layouts/partials/_footer')
        </footer>
    </body>
</html>
