<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $memorial->pet_name }} - Memorial | Four Paws</title>

    <!-- SEO Meta Tags -->
    <meta name="description"
        content="A loving memorial for {{ $memorial->pet_name }}, a beloved {{ $memorial->pet_type }} who brought joy and love to their family.">
    <meta name="keywords"
        content="pet memorial, {{ $memorial->pet_name }}, {{ $memorial->pet_type }}, in memory, beloved pet">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ $memorial->pet_name }} - Memorial">
    <meta property="og:description"
        content="A loving memorial for {{ $memorial->pet_name }}, a beloved {{ $memorial->pet_type }}.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->url() }}">
    @if($memorial->media->first())
    <meta property="og:image" content="{{ Storage::url($memorial->media->first()->file_path) }}">
    @endif

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $memorial->pet_name }} - Memorial">
    <meta name="twitter:description"
        content="A loving memorial for {{ $memorial->pet_name }}, a beloved {{ $memorial->pet_type }}.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Georgia:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased"
    style="font-family: {{ $memorial->template->template_data['settings']['font_family'] ?? 'Inter' }}, sans-serif;">
    <div class="min-h-screen" style="background: {{ $memorial->template->template_data['theme_color'] ?? '#1e40af' }};">
        {{-- Header --}}
        <header class="bg-white/90 backdrop-blur-sm shadow-sm sticky top-0 z-50">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                <div class="flex items-center justify-between">
                    <a href="{{ route('home') }}" class="text-slate-600 hover:text-slate-900 font-medium">
                        ← Back to Four Paws
                    </a>
                    <div class="text-sm text-slate-500">
                        Memorial created by {{ $memorial->user->name }}
                    </div>
                </div>
            </div>
        </header>

        {{-- Hero Section --}}
        <section class="relative py-20 text-white">
            <div class="absolute inset-0 bg-gradient-to-r from-black/40 to-black/20"></div>
            <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                @if($memorial->media->first())
                <div class="mb-8">
                    <img src="{{ Storage::url($memorial->media->first()->file_path) }}" alt="{{ $memorial->pet_name }}"
                        class="w-48 h-48 rounded-full mx-auto object-cover border-4 border-white/20 shadow-2xl">
                </div>
                @endif

                <h1 class="text-4xl md:text-6xl font-bold mb-4">{{ $memorial->pet_name }}</h1>
                <p class="text-xl md:text-2xl opacity-90 mb-2">{{ $memorial->breed ? $memorial->breed . ' • ' : '' }}{{
                    $memorial->pet_type }}</p>

                @if($memorial->birth_date || $memorial->death_date)
                <p class="text-lg opacity-80">
                    @if($memorial->birth_date && $memorial->death_date)
                    {{ $memorial->birth_date->format('M j, Y') }} - {{ $memorial->death_date->format('M j, Y') }}
                    @elseif($memorial->death_date)
                    Passed {{ $memorial->death_date->format('M j, Y') }}
                    @endif
                </p>
                @endif

                <div class="mt-8 flex items-center justify-center space-x-6 text-sm opacity-75">
                    <span>{{ $memorial->view_count }} visits</span>
                    <span>•</span>
                    <span>{{ $memorial->guestbookEntries->count() }} messages</span>
                    @if($memorial->stories->count() > 0)
                    <span>•</span>
                    <span>{{ $memorial->stories->count() }} {{ Str::plural('story', $memorial->stories->count())
                        }}</span>
                    @endif
                </div>
            </div>
        </section>

        {{-- Memorial Content --}}
        <section class="bg-white">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
                {{-- Description --}}
                @if($memorial->description)
                <div class="prose prose-lg max-w-none mb-16">
                    <p class="text-xl text-slate-700 leading-relaxed">{{ $memorial->description }}</p>
                </div>
                @endif

                {{-- Stories Section --}}
                @if($memorial->stories->count() > 0 && ($memorial->template->template_data['settings']['show_stories']
                ?? true))
                <div class="mb-16">
                    <h2 class="text-3xl font-bold text-slate-900 mb-8">Memories & Stories</h2>
                    <div class="space-y-8">
                        @foreach($memorial->stories as $story)
                        <div class="bg-slate-50 rounded-xl p-8">
                            <h3 class="text-xl font-semibold text-slate-900 mb-4">{{ $story->title }}</h3>
                            <div class="prose max-w-none text-slate-700">
                                {!! nl2br(e($story->content)) !!}
                            </div>
                            @if($story->author_name)
                            <p class="text-sm text-slate-500 mt-4">— {{ $story->author_name }}</p>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Media Gallery --}}
                @if($memorial->media->count() > 1 && ($memorial->template->template_data['settings']['show_media'] ??
                true))
                <div class="mb-16">
                    <h2 class="text-3xl font-bold text-slate-900 mb-8">Photo Gallery</h2>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach($memorial->media->skip(1) as $media)
                        <div class="aspect-square rounded-lg overflow-hidden">
                            @if($media->media_type === 'image')
                            <img src="{{ Storage::url($media->file_path) }}" alt="{{ $media->alt_text }}"
                                class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Guestbook --}}
                @if($memorial->template->template_data['settings']['show_guestbook'] ?? true)
                <div>
                    <h2 class="text-3xl font-bold text-slate-900 mb-8">Condolences</h2>

                    @if($memorial->guestbookEntries->count() > 0)
                    <div class="space-y-6">
                        @foreach($memorial->guestbookEntries as $entry)
                        <div class="bg-slate-50 rounded-xl p-6">
                            <p class="text-slate-700 mb-4">{!! nl2br(e($entry->message)) !!}</p>
                            <div class="flex items-center justify-between text-sm text-slate-500">
                                <span>— {{ $entry->visitor_name }}</span>
                                <span>{{ $entry->created_at->format('M j, Y') }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="text-center py-12">
                        <p class="text-slate-500">No messages yet. Be the first to leave a loving memory.</p>
                    </div>
                    @endif
                </div>
                @endif
            </div>
        </section>

        {{-- Footer --}}
        <footer class="bg-slate-900 text-white py-12">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <p class="text-slate-400 mb-4">
                    This memorial was created with love using Four Paws
                </p>
                <div class="flex items-center justify-center space-x-2">
                    <div
                        class="w-6 h-6 bg-gradient-to-r from-blue-600 to-purple-600 rounded flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" />
                        </svg>
                    </div>
                    <a href="{{ route('home') }}" class="text-slate-300 hover:text-white font-medium">
                        Create your own memorial
                    </a>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>