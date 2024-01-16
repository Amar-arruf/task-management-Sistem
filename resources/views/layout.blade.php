<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>task- @yield('title')</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="{{asset('css/calendar/theme-basic.css')}}">
    <link rel="stylesheet" href="{{asset('css/calendar/theme-glass.css')}}">
    <script src=" {{asset('js/flowbite.min.js')}} "></script>
    <script src="{{asset('js/calendar/bundle.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="{{asset('js/full-calendar/dist/index.global.min.js')}}"></script>
</head>

<body class="p-2 md:p-5 bg-gray-custom md:flex md:gap-6 md:justify-evenly">
    <!-- navigation -->
    @include('navigation')
    <div class="container">
        <!-- top bar -->
        @include('topbar')
        <div class="w-full mt-3">
            @yield('content')
        </div>
    </div>
    @vite('resources/js/app')
</body>

</html>