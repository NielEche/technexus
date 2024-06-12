<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="Floral Design Studio">
        <title>Okidi</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Favicon -->
        <link rel="icon" href="https://res.cloudinary.com/nieleche/image/upload/v1709737600/okidilogo_4x_t7snua.png" type="image/x-icon">


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased" style="background-color:#E7E6E6;">
        <x-banner />

        <div class="min-h-screen" style="background-color:#E7E6E6; color:#B6BA9B;">
         

            <!-- Page Heading -->
            @if (isset($header))
                @if(request()->is('dashboard'))
                    @include('navigation-menu')
                @endif
                @include('partials.header')
            @endif


            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            @if (isset($header))
                @include('partials.footer')
            @endif
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
