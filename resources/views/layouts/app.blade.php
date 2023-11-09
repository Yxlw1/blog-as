<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/assets/scss/app.scss', 'resources/assets/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased bg-info">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        <header>
            @livewire('navigation')
            @livewire('hero')
        </header>


        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        @livewire('footer')

        <script src="https://kit.fontawesome.com/47c18e4cf3.js" crossorigin="anonymous"></script>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
