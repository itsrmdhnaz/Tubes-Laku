<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laku! | {{ $data['title'] }}
    </title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


    <!-- Styles -->



    @vite('resources/css/app.css')
    @livewireStyles()
</head>

<body bgcolor="#3AB86D">
    <div class="grid md:grid-cols-5 md:grid-rows-3 md:p-12 gap-9 md:w-[1451px] xl:[2000px] md:mx-auto bg-[#3AB86D] min-h-screen">
        @include('partials.nav')


        @include('partials.main2')

       @if(isset($data['aside']) && $data['aside'] == "yes")
       @include('partials.asideup')
        @include('partials.asidedown')
       @endif


        @include('partials.footer')
  </div>
    @vite('resources/js/app.js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@yield("script")
@stack('js')


</body>
    @livewireScripts()

</html>
