<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Four Paws') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="min-h-screen bg-slate-950 font-sans text-slate-100 antialiased">
        <x-banner />

        <div class="min-h-screen bg-slate-950">
            @livewire('navigation-menu')

            @if (isset($header))
                <header class="border-b border-white/10 bg-slate-950/80 backdrop-blur">
                    <div class="mx-auto max-w-7xl px-6 py-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <main class="mx-auto max-w-7xl px-6 py-8 lg:px-8">
                {{ $slot }}
            </main>
        </div>

        @stack('modals')
        @livewireScripts
    </body>
</html>
