<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--CSRF Token--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', '@Master Layout'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    <!-- Scripts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href=" {{ asset('css/prism.css') }}">
</head>

<body>
    <div class="flex gap-2 h-screen">
        @include('admin.partial.menu')
        <div class="lg:w-full bg-[#f8f8f8]">
            @include('admin.partial.header')
            <main class="px-9 pt-6 pb-10 min-h-[calc(100vh-120px)] xl:min-h-[calc(100vh-145px)] bg-[#f8f8f8]">
                @yield('content')
            </main>
        </div>

    </div>
    <script src="{{asset('js/prism.js')}}"></script>
</body>

</html>
