<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Four Paws - Pet Memorial Service</title>

    <!-- SEO Meta Tags -->
    <meta name="description"
        content="Create beautiful, lasting memorial pages for your beloved pets. Share memories, photos, and celebrate the unconditional love they brought to your life.">
    <meta name="keywords"
        content="pet memorial, pet memorial service, pet tribute, pet memory, beloved pets, four paws">

    <!-- Open Graph -->
    <meta property="og:title" content="Four Paws - Pet Memorial Service">
    <meta property="og:description"
        content="Create beautiful, lasting memorial pages for your beloved pets. Share memories, photos, and celebrate the unconditional love they brought to your life.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->url() }}">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Four Paws - Pet Memorial Service">
    <meta name="twitter:description" content="Create beautiful, lasting memorial pages for your beloved pets.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-sans antialiased h-full">
    <div
        class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-slate-100 dark:from-slate-900 dark:via-slate-800 dark:to-slate-900">
        {{-- Header/Navigation --}}
        <header
            class="sticky top-0 z-50 backdrop-blur-sm bg-white/80 dark:bg-slate-900/80 border-b border-slate-200 dark:border-slate-700">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    {{-- Logo --}}
                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 rounded-lg flex items-center justify-center">
                            <svg class="w-8 h-8" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <linearGradient id="gradient1" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#3B82F6" />
                                        <stop offset="100%" style="stop-color:#8B5CF6" />
                                    </linearGradient>
                                </defs>
                                <circle cx="32" cy="32" r="30" fill="url(#gradient1)" stroke="#FFFFFF"
                                    stroke-width="2" />
                                <path
                                    d="M20 28c0-6.627 5.373-12 12-12s12 5.373 12 12c0 4.418-2.389 8.291-5.943 10.376L32 44l-6.057-5.624C22.389 36.291 20 32.418 20 28z"
                                    fill="#FFFFFF" />
                                <circle cx="28" cy="26" r="2" fill="url(#gradient1)" />
                                <circle cx="36" cy="26" r="2" fill="url(#gradient1)" />
                                <path d="M26 32c0 3.314 2.686 6 6 6s6-2.686 6-6" stroke="url(#gradient1)"
                                    stroke-width="2" stroke-linecap="round" />
                                <ellipse cx="24" cy="24" rx="3" ry="2" fill="#FFFFFF" opacity="0.8" />
                                <ellipse cx="40" cy="24" rx="3" ry="2" fill="#FFFFFF" opacity="0.8" />
                                <path d="M18 20c-2 2-2 6 0 8" stroke="#FFFFFF" stroke-width="2"
                                    stroke-linecap="round" />
                                <path d="M46 20c2 2 2 6 0 8" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" />
                            </svg>
                        </div>
                        <span
                            class="text-xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Four
                            Paws</span>
                    </div>

                    {{-- Navigation Tabs --}}
                    <nav class="hidden md:flex space-x-1 bg-slate-100 dark:bg-slate-800 rounded-lg p-1">
                        <button wire:click="switchTab('promote')"
                            @class([ 'px-4 py-2 rounded-md text-sm font-medium transition-all duration-200'
                            , 'bg-white dark:bg-slate-700 text-blue-600 dark:text-blue-400 shadow-sm'=> $activeTab ===
                            'promote',
                            'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-200' =>
                            $activeTab !== 'promote'
                            ])
                            >
                            Create Memorial
                        </button>
                        <button wire:click="switchTab('gallery')"
                            @class([ 'px-4 py-2 rounded-md text-sm font-medium transition-all duration-200'
                            , 'bg-white dark:bg-slate-700 text-blue-600 dark:text-blue-400 shadow-sm'=> $activeTab ===
                            'gallery',
                            'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-200' =>
                            $activeTab !== 'gallery'
                            ])
                            >
                            Featured Memorials
                        </button>
                    </nav>

                    {{-- Auth Links --}}
                    <div class="flex items-center space-x-4">
                        @guest
                        <a href="{{ route('login') }}"
                            class="text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-200 font-medium">
                            Sign In
                        </a>
                        <a href="{{ route('register') }}"
                            class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-4 py-2 rounded-lg font-medium hover:from-blue-700 hover:to-purple-700 transition-all duration-200">
                            Get Started
                        </a>
                        @endguest
                        @auth
                        <a href="{{ route('dashboard') }}"
                            class="text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-200 font-medium">
                            Dashboard
                        </a>
                        <flux:dropdown>
                            <flux:button variant="ghost" size="sm">
                                {{ Auth::user()->name }}
                            </flux:button>
                            <flux:menu>
                                <flux:menu.item href="{{ route('profile') }}">Profile</flux:menu.item>
                                <flux:menu.separator />
                                <flux:menu.item onclick="document.getElementById('logout-form').submit();">
                                    Sign Out
                                </flux:menu.item>
                            </flux:menu>
                        </flux:dropdown>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                        @endauth
                    </div>
                </div>
            </div>
        </header>

        {{-- Mobile Navigation --}}
        <div class="md:hidden bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-700">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex space-x-1 py-3">
                    <button wire:click="switchTab('promote')"
                        @class([ 'flex-1 py-2 px-3 rounded-md text-sm font-medium text-center transition-all duration-200'
                        , 'bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400'=> $activeTab === 'promote',
                        'text-slate-600 dark:text-slate-400' => $activeTab !== 'promote'
                        ])
                        >
                        Create Memorial
                    </button>
                    <button wire:click="switchTab('gallery')"
                        @class([ 'flex-1 py-2 px-3 rounded-md text-sm font-medium text-center transition-all duration-200'
                        , 'bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400'=> $activeTab === 'gallery',
                        'text-slate-600 dark:text-slate-400' => $activeTab !== 'gallery'
                        ])
                        >
                        Featured Memorials
                    </button>
                </div>
            </div>
        </div>

        {{-- Tab Content --}}
        <main>
            {{-- Promote Tab --}}
            @if($activeTab === 'promote')
            <div>
                {{-- Hero Section --}}
                <section class="relative py-20 lg:py-32">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="text-center">
                            <h1 class="text-4xl md:text-6xl font-bold text-slate-900 dark:text-slate-100 mb-6">
                                Honor Your
                                <span
                                    class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Beloved
                                    Companion</span>
                            </h1>
                            <p
                                class="text-xl text-slate-600 dark:text-slate-400 mb-8 max-w-3xl mx-auto leading-relaxed">
                                Create a beautiful, lasting memorial for your pet with our easy-to-use memorial page
                                generator.
                                Share memories, photos, and celebrate the unconditional love they brought to your life.
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                                @auth
                                <a href="{{ route('dashboard') }}"
                                    class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-xl font-semibold text-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl">
                                    Create Memorial Now
                                </a>
                                @else
                                <a href="{{ route('register') }}"
                                    class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-xl font-semibold text-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl">
                                    Get Started Free
                                </a>
                                @endauth
                                <button wire:click="switchTab('templates')"
                                    class="border border-slate-300 dark:border-slate-600 text-slate-700 dark:text-slate-300 px-8 py-4 rounded-xl font-semibold text-lg hover:bg-slate-50 dark:hover:bg-slate-800 transition-all duration-200">
                                    View Templates
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Background decoration --}}
                    <div class="absolute inset-0 -z-10 overflow-hidden">
                        <div
                            class="absolute -top-40 -right-32 w-80 h-80 bg-gradient-to-r from-blue-400/20 to-purple-400/20 rounded-full blur-3xl">
                        </div>
                        <div
                            class="absolute -bottom-40 -left-32 w-80 h-80 bg-gradient-to-r from-purple-400/20 to-pink-400/20 rounded-full blur-3xl">
                        </div>
                    </div>
                </section>

                {{-- Stats Section --}}
                <section class="py-16 bg-white/50 dark:bg-slate-800/50 backdrop-blur-sm">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="grid grid-cols-3 gap-8 text-center">
                            <div>
                                <div class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-slate-100">{{
                                    number_format($stats['memorials']) }}+</div>
                                <div class="text-slate-600 dark:text-slate-400 mt-2">Memorials Created</div>
                            </div>
                            <div>
                                <div class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-slate-100">{{
                                    $stats['templates'] }}</div>
                                <div class="text-slate-600 dark:text-slate-400 mt-2">Beautiful Templates</div>
                            </div>
                            <div>
                                <div class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-slate-100">{{
                                    number_format($stats['users']) }}+</div>
                                <div class="text-slate-600 dark:text-slate-400 mt-2">Loving Families</div>
                            </div>
                        </div>
                    </div>
                </section>

                {{-- Features Section --}}
                <section class="py-20">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="text-center mb-16">
                            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-slate-100 mb-4">
                                Everything You Need to Honor Their Memory
                            </h2>
                            <p class="text-xl text-slate-600 dark:text-slate-400 max-w-2xl mx-auto">
                                Our platform provides all the tools to create a meaningful and beautiful memorial page.
                            </p>
                        </div>

                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                            <div
                                class="bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-700">
                                <div
                                    class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center mb-4">
                                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-slate-900 dark:text-slate-100 mb-2">Photo
                                    Galleries</h3>
                                <p class="text-slate-600 dark:text-slate-400">Upload and organize your favorite photos
                                    in beautiful, responsive galleries that celebrate your pet's life.</p>
                            </div>

                            <div
                                class="bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-700">
                                <div
                                    class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-lg flex items-center justify-center mb-4">
                                    <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-slate-900 dark:text-slate-100 mb-2">Share Stories
                                </h3>
                                <p class="text-slate-600 dark:text-slate-400">Write and share heartwarming stories and
                                    memories that capture your pet's unique personality and spirit.</p>
                            </div>

                            <div
                                class="bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-700">
                                <div
                                    class="w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center mb-4">
                                    <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-slate-900 dark:text-slate-100 mb-2">Guest Messages
                                </h3>
                                <p class="text-slate-600 dark:text-slate-400">Allow friends and family to leave
                                    condolences and share their own memories of your beloved pet.</p>
                            </div>

                            <div
                                class="bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-700">
                                <div
                                    class="w-12 h-12 bg-pink-100 dark:bg-pink-900/30 rounded-lg flex items-center justify-center mb-4">
                                    <svg class="w-6 h-6 text-pink-600 dark:text-pink-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-slate-900 dark:text-slate-100 mb-2">Beautiful
                                    Templates</h3>
                                <p class="text-slate-600 dark:text-slate-400">Choose from professionally designed
                                    templates that can be customized to reflect your pet's personality.</p>
                            </div>

                            <div
                                class="bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-700">
                                <div
                                    class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900/30 rounded-lg flex items-center justify-center mb-4">
                                    <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-slate-900 dark:text-slate-100 mb-2">Easy Sharing
                                </h3>
                                <p class="text-slate-600 dark:text-slate-400">Share your pet's memorial page with family
                                    and friends through social media or direct links.</p>
                            </div>

                            <div
                                class="bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-700">
                                <div
                                    class="w-12 h-12 bg-orange-100 dark:bg-orange-900/30 rounded-lg flex items-center justify-center mb-4">
                                    <svg class="w-6 h-6 text-orange-600 dark:text-orange-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-slate-900 dark:text-slate-100 mb-2">Private &
                                    Secure</h3>
                                <p class="text-slate-600 dark:text-slate-400">Your memorial pages are secure and private
                                    by default. You control who can view and interact with them.</p>
                            </div>
                        </div>
                    </div>
                </section>

                {{-- Template Preview --}}
                <section class="py-20 bg-slate-50 dark:bg-slate-900/50">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="text-center mb-16">
                            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-slate-100 mb-4">
                                Choose from Beautiful Templates
                            </h2>
                            <p class="text-xl text-slate-600 dark:text-slate-400 max-w-2xl mx-auto">
                                Each template is professionally designed and can be personalized to honor your pet's
                                unique spirit.
                            </p>
                        </div>

                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                            @foreach($templates->take(3) as $template)
                            <div
                                class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-700 overflow-hidden group hover:shadow-md transition-shadow duration-200">
                                <div class="aspect-video bg-gradient-to-br {{ 
                                    match($template->template_data['theme_color'] ?? '#1e40af') {
                                        '#1e40af' => 'from-blue-400 to-blue-600',
                                        '#059669' => 'from-green-400 to-green-600',
                                        '#ea580c' => 'from-orange-400 to-orange-600',
                                        '#7c3aed' => 'from-purple-400 to-purple-600',
                                        '#0891b2' => 'from-cyan-400 to-cyan-600',
                                        default => 'from-blue-400 to-blue-600'
                                    }
                                }} relative overflow-hidden">
                                    <img src="https://images.unsplash.com/photo-1548199973-03cce0bbc87b?w=400&h=225&fit=crop&auto=format"
                                        alt="Pet memorial template"
                                        class="absolute inset-0 w-full h-full object-cover opacity-20">
                                    <div class="absolute inset-0 bg-black/30"></div>
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <div class="text-white text-center">
                                            <div
                                                class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4 backdrop-blur-sm">
                                                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                                    <path
                                                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" />
                                                </svg>
                                            </div>
                                            <h3 class="font-semibold">{{ $template->name }}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100 mb-2">{{
                                        $template->name }}</h3>
                                    <p class="text-slate-600 dark:text-slate-400 text-sm mb-4">{{ $template->description
                                        }}</p>
                                    <div class="flex items-center justify-between">
                                        <span class="text-xs text-slate-500 dark:text-slate-400 capitalize">{{
                                            $template->template_data['layout'] ?? 'Classic' }} Style</span>
                                        <span class="w-4 h-4 rounded-full"
                                            style="background-color: {{ $template->template_data['theme_color'] ?? '#1e40af' }}"></span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="text-center mt-12">
                            <button wire:click="switchTab('templates')"
                                class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-xl font-semibold text-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl">
                                View All Templates
                            </button>
                        </div>
                    </div>
                </section>

                {{-- CTA Section --}}
                <section class="py-20">
                    <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
                        <h2 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-slate-100 mb-4">
                            Ready to Honor Your Beloved Pet?
                        </h2>
                        <p class="text-xl text-slate-600 dark:text-slate-400 mb-8">
                            Create a beautiful memorial page in minutes. It's free to start and easy to share.
                        </p>
                        @auth
                        <a href="{{ route('dashboard') }}"
                            class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-xl font-semibold text-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl inline-block">
                            Create Your Memorial Now
                        </a>
                        @else
                        <a href="{{ route('register') }}"
                            class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-xl font-semibold text-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl inline-block">
                            Get Started Free
                        </a>
                        @endauth
                    </div>
                </section>
            </div>
            @endif

            {{-- Gallery Tab --}}
            @if($activeTab === 'gallery')
            <div>

                {{-- Hero Section for Gallery --}}
                <section class="relative py-20 lg:py-32">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="text-center">
                            <h1 class="text-4xl md:text-6xl font-bold text-slate-900 dark:text-slate-100 mb-6">
                                Featured
                                <span
                                    class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Pet
                                    Memorials</span>
                            </h1>
                            <p class="text-xl text-slate-600 dark:text-slate-400 max-w-3xl mx-auto mb-8">
                                Discover touching tributes created by pet parents who wanted to honor their beloved
                                companions. Each memorial tells a unique story of love, joy, and cherished memories.
                            </p>
                        </div>
                    </div>

                    {{-- Background decoration --}}
                    <div class="absolute inset-0 -z-10 overflow-hidden">
                        <div
                            class="absolute -top-40 -right-32 w-80 h-80 bg-gradient-to-r from-blue-400/20 to-purple-400/20 rounded-full blur-3xl">
                        </div>
                        <div
                            class="absolute -bottom-40 -left-32 w-80 h-80 bg-gradient-to-r from-purple-400/20 to-pink-400/20 rounded-full blur-3xl">
                        </div>
                    </div>
                </section>

                {{-- Featured Memorials Gallery --}}
                <div
                    class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-700 overflow-hidden group hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                    <div class="aspect-video bg-gradient-to-br {{ 
                                    match($template->template_data['theme_color'] ?? '#1e40af') {
                                        '#1e40af' => 'from-blue-400 to-blue-600',
                                        '#059669' => 'from-green-400 to-green-600',
                                        '#ea580c' => 'from-orange-400 to-orange-600',
                                        '#7c3aed' => 'from-purple-400 to-purple-600',
                                        '#0891b2' => 'from-cyan-400 to-cyan-600',
                                        default => 'from-blue-400 to-blue-600'
                                    }
                                }} relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1601758228041-f3b2795255f1?w=400&h=225&fit=crop&auto=format"
                            alt="Pet memorial template" class="absolute inset-0 w-full h-full object-cover opacity-20">
                        <div class="absolute inset-0 bg-black/30"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-white text-center">
                                <div
                                    class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4 backdrop-blur-sm">
                                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" />
                                    </svg>
                                </div>
                                <h3 class="font-semibold text-lg">{{ $template->name }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100 mb-2">{{
                            $template->name }}</h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm mb-4">{{ $template->description
                            }}</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-slate-500 dark:text-slate-400 capitalize">
                                {{ $template->template_data['layout'] ?? 'Classic' }} Style
                            </span>
                            <div class="flex items-center space-x-2">
                                <span class="w-4 h-4 rounded-full"
                                    style="background-color: {{ $template->template_data['theme_color'] ?? '#1e40af' }}"></span>
                                <button
                                    class="text-blue-600 dark:text-blue-400 text-sm font-medium hover:text-blue-700 dark:hover:text-blue-300">
                                    Preview →
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="text-center mt-12">
                @auth
                <a href="{{ route('dashboard') }}"
                    class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-xl font-semibold text-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl inline-block">
                    Start Creating Your Memorial
                </a>
                @else
                <a href="{{ route('register') }}"
                    class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-xl font-semibold text-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl inline-block">
                    Get Started Free
                </a>
                @endauth
            </div>
    </div>
    </section>
    </div>



    {{-- Hero Section for Gallery --}}
    <section class="relative py-20 lg:py-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold text-slate-900 dark:text-slate-100 mb-6">
                    Featured
                    <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Pet
                        Memorials</span>
                </h1>
                <p class="text-xl text-slate-600 dark:text-slate-400 mb-8 max-w-3xl mx-auto leading-relaxed">
                    Explore beautiful memorial pages created by loving families to honor their cherished
                    pets. Each memorial tells a unique story of love, joy, and cherished memories.
                </p>
            </div>
        </div>

        {{-- Background decoration --}}
        <div class="absolute inset-0 -z-10 overflow-hidden">
            <div
                class="absolute -top-40 -right-32 w-80 h-80 bg-gradient-to-r from-blue-400/20 to-purple-400/20 rounded-full blur-3xl">
            </div>
            <div
                class="absolute -bottom-40 -left-32 w-80 h-80 bg-gradient-to-r from-purple-400/20 to-pink-400/20 rounded-full blur-3xl">
            </div>
        </div>
    </section>

    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($featuredMemorials as $index => $memorial)
                @php
                $stockImages = [
                'https://images.unsplash.com/photo-1601758228041-f3b2795255f1?w=400&h=225&fit=crop&auto=format',
                // Golden retriever
                'https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?w=400&h=225&fit=crop&auto=format',
                // Cat
                'https://images.unsplash.com/photo-1587300003388-59208cc962cb?w=400&h=225&fit=crop&auto=format',
                // Dog
                'https://images.unsplash.com/photo-1573865526739-10659fec78a5?w=400&h=225&fit=crop&auto=format',
                // Cat
                'https://images.unsplash.com/photo-1552053831-71594a27632d?w=400&h=225&fit=crop&auto=format',
                // Dog
                'https://images.unsplash.com/photo-1596854407944-bf87f6fdd49e?w=400&h=225&fit=crop&auto=format',
                // Cat
                ];
                $imageUrl = $stockImages[$index % count($stockImages)];
                @endphp
                <div
                    class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-700 overflow-hidden group hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                    <div class="aspect-video bg-slate-200 dark:bg-slate-700 relative overflow-hidden">
                        <img src="{{ $imageUrl }}" alt="{{ $memorial->pet_name }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent">
                        </div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <h3 class="text-lg font-semibold">{{ $memorial->pet_name }}</h3>
                            <p class="text-sm opacity-90">{{ $memorial->pet_type }} {{ $memorial->breed ? '•
                                ' . $memorial->breed : '' }}</p>
                        </div>
                        <div class="absolute top-4 right-4">
                            <span class="bg-white/20 backdrop-blur-sm text-white text-xs px-2 py-1 rounded-full">
                                {{ $memorial->view_count }} views
                            </span>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-sm text-slate-500 dark:text-slate-400">
                                @if($memorial->birth_date && $memorial->death_date)
                                {{ $memorial->birth_date->format('Y') }} - {{
                                $memorial->death_date->format('Y') }}
                                @elseif($memorial->death_date)
                                Passed {{ $memorial->death_date->format('M Y') }}
                                @endif
                            </span>
                            <div class="flex items-center space-x-1 text-yellow-500">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path
                                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                </svg>
                                <span class="text-xs text-slate-500">Featured</span>
                            </div>
                        </div>

                        @if($memorial->description)
                        <p class="text-slate-600 dark:text-slate-400 text-sm line-clamp-3 mb-4">
                            {{ Str::limit($memorial->description, 120) }}
                        </p>
                        @endif

                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <div
                                    class="w-6 h-6 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full flex items-center justify-center">
                                    <span class="text-white text-xs font-medium">
                                        {{ substr($memorial->user?->name ?? 'U', 0, 1) }}
                                    </span>
                                </div>
                                <span class="text-xs text-slate-500 dark:text-slate-400">
                                    By {{ $memorial->user?->name ?? 'Unknown' }}
                                </span>
                            </div>
                            <a href="{{ route('memorial.show', $memorial) }}"
                                class="text-blue-600 dark:text-blue-400 text-sm font-medium hover:text-blue-700 dark:hover:text-blue-300 flex items-center space-x-1 group">
                                <span>View Memorial</span>
                                <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center py-12">
                    <div
                        class="w-16 h-16 bg-slate-200 dark:bg-slate-700 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-slate-400 dark:text-slate-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100 mb-2">No memorials
                        yet</h3>
                    <p class="text-slate-600 dark:text-slate-400 mb-6">Be the first to create a beautiful
                        memorial for your beloved pet.</p>
                    <button wire:click="switchTab('promote')"
                        class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-3 rounded-lg font-medium hover:from-blue-700 hover:to-purple-700 transition-all duration-200">
                        Create First Memorial
                    </button>
                </div>
                @endforelse
            </div>

            <div class="text-center mt-16">
                @auth
                <a href="{{ route('dashboard') }}"
                    class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-xl font-semibold text-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl inline-block">
                    Create Your Own Memorial
                </a>
                @else
                <a href="{{ route('register') }}"
                    class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-xl font-semibold text-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl inline-block">
                    Get Started Free
                </a>
                @endauth
            </div>
        </div>
    </section>
    </div>
    </main>

    {{-- Footer --}}
    <footer class="bg-slate-50 dark:bg-slate-900 border-t border-slate-200 dark:border-slate-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <div class="w-8 h-8 rounded-lg flex items-center justify-center">
                        <svg class="w-8 h-8" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <linearGradient id="gradient2" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" style="stop-color:#3B82F6" />
                                    <stop offset="100%" style="stop-color:#8B5CF6" />
                                </linearGradient>
                            </defs>
                            <circle cx="32" cy="32" r="30" fill="url(#gradient2)" stroke="#FFFFFF" stroke-width="2" />
                            <path
                                d="M20 28c0-6.627 5.373-12 12-12s12 5.373 12 12c0 4.418-2.389 8.291-5.943 10.376L32 44l-6.057-5.624C22.389 36.291 20 32.418 20 28z"
                                fill="#FFFFFF" />
                            <circle cx="28" cy="26" r="2" fill="url(#gradient2)" />
                            <circle cx="36" cy="26" r="2" fill="url(#gradient2)" />
                            <path d="M26 32c0 3.314 2.686 6 6 6s6-2.686 6-6" stroke="url(#gradient2)" stroke-width="2"
                                stroke-linecap="round" />
                            <ellipse cx="24" cy="24" rx="3" ry="2" fill="#FFFFFF" opacity="0.8" />
                            <ellipse cx="40" cy="24" rx="3" ry="2" fill="#FFFFFF" opacity="0.8" />
                            <path d="M18 20c-2 2-2 6 0 8" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" />
                            <path d="M46 20c2 2 2 6 0 8" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </div>
                    <span
                        class="text-lg font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Four
                        Paws</span>
                </div>
                <div class="text-sm text-slate-500 dark:text-slate-400">
                    © {{ date('Y') }} Four Paws. Made with ❤️ for pet families.
                </div>
            </div>
        </div>
    </footer>
    </div>
    @endif
    </main>
    </div>

    @livewireScripts
</body>

</html>