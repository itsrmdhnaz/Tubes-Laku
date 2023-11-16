<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laku! | </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @stack('styles')
    @vite('resources/css/app.css')
</head>
<body>
 <div>
  @yield('container')
</div>

  @include('partials.footer')

</div>

@vite('resources/js/app.js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@yield("script")
</body>


@stack('scripts')


</html>
