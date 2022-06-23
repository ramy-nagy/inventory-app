<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <style>
        @media (prefers-color-scheme: dark) {
            img {
                opacity: .75;
                transition: opacity .5s ease-in-out;
            }

            img:hover {
                opacity: 1;
            }
        }

        html {
            --text-color-normal: #0a244d;
            --text-color-light: #8cabd9;
        }

        html[data-theme='dark'] {
            --text-color-normal: hsl(210, 10%, 62%);
            --text-color-light: hsl(210, 15%, 35%);
            --text-color-richer: hsl(210, 50%, 72%);
            --text-color-highlight: hsl(25, 70%, 45%);
        }
    </style>
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
