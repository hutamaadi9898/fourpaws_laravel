<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Four Paws - Honoring Pet Memories Forever</title>
    <meta name="description"
        content="Create beautiful, lasting memorials for your beloved pets. Share stories, photos, and celebrate the unconditional love they brought to your life.">
    <meta name="keywords"
        content="pet memorial, pet memory, pet tribute, pet memorial service, beloved pets, four paws">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:title" content="Four Paws - Honoring Pet Memories Forever">
    <meta property="og:description"
        content="Create beautiful, lasting memorials for your beloved pets. Share stories, photos, and celebrate the unconditional love they brought to your life.">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ request()->url() }}">
    <meta property="twitter:title" content="Four Paws - Honoring Pet Memories Forever">
    <meta property="twitter:description" content="Create beautiful, lasting memorials for your beloved pets.">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-white dark:bg-gray-900 text-gray-900 dark:text-white">
    {{ $slot }}

    @livewireScripts

    <script>
        // Smooth scrolling functionality
        document.addEventListener('livewire:init', () => {
            Livewire.on('scroll-to-section', (event) => {
                const section = document.getElementById(event.section);
                if (section) {
                    section.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
    </script>
</body>

</html>