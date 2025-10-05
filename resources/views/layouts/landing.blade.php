<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Four Paws &mdash; Honoring Pet Memories Forever</title>
        <meta name="description" content="Create beautiful, lasting memorials for your beloved pets with stories, photos, and heartfelt guestbooks on Four Paws." />
        <meta name="keywords" content="pet memorial, pet tribute, pet loss, pet remembrance, four paws" />
        <meta name="theme-color" content="#111827">

        <!-- Open Graph -->
        <meta property="og:type" content="website">
        <meta property="og:title" content="Four Paws &mdash; Honoring Pet Memories Forever">
        <meta property="og:description" content="Celebrate the life of your beloved pet with a personalised memorial space filled with stories, media, and condolences.">
        <meta property="og:url" content="{{ request()->url() }}">

        <!-- Twitter -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Four Paws &mdash; Honoring Pet Memories Forever">
        <meta name="twitter:description" content="Create beautiful, lasting memorials for your beloved pets.">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="h-full bg-slate-950 text-slate-100">
        {{ $slot }}

        @livewireScripts

        <script>
            document.addEventListener('livewire:init', () => {
                Livewire.on('scroll-to-section', ({ section }) => {
                    const target = document.getElementById(section);

                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                });
            });
        </script>
    </body>
</html>
