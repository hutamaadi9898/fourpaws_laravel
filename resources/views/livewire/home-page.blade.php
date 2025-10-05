<div>
    <!-- Navigation -->
    <nav
        class="fixed top-0 w-full bg-white/80 dark:bg-gray-900/80 backdrop-blur-sm border-b border-gray-200 dark:border-gray-700 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center shadow-lg">
                        <span class="text-white font-bold text-lg">🐾</span>
                    </div>
                    <div>
                        <h1
                            class="text-xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
                            Four Paws
                        </h1>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Pet Memorial Service</p>
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:flex items-center space-x-8">
                    <button wire:click="scrollToSection('hero')"
                        class="text-gray-600 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400 transition-colors">
                        Home
                    </button>
                    <button wire:click="scrollToSection('features')"
                        class="text-gray-600 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400 transition-colors">
                        Features
                    </button>
                    <button wire:click="scrollToSection('gallery')"
                        class="text-gray-600 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400 transition-colors">
                        Gallery
                    </button>
                    <button wire:click="togglePricingModal"
                        class="text-gray-600 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400 transition-colors">
                        Pricing
                    </button>
                </div>

                <!-- Auth Buttons -->
                <div class="flex items-center space-x-4">
                    @guest
                    <a href="{{ route('login') }}"
                        class="text-gray-600 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400 transition-colors">
                        Sign In
                    </a>
                    <a href="{{ route('register') }}"
                        class="bg-gradient-to-r from-purple-600 to-pink-600 text-white px-6 py-2 rounded-full hover:from-purple-700 hover:to-pink-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
                        Get Started
                    </a>
                    @else
                    <a href="{{ route('dashboard') }}"
                        class="bg-gradient-to-r from-purple-600 to-pink-600 text-white px-6 py-2 rounded-full hover:from-purple-700 hover:to-pink-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
                        Dashboard
                    </a>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="hero"
        class="relative min-h-screen flex items-center justify-center bg-gradient-to-br from-purple-50 via-pink-50 to-purple-100 dark:from-gray-900 dark:via-purple-900/20 dark:to-gray-900 overflow-hidden">
        <!-- Background decoration -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-20 left-10 w-20 h-20 bg-purple-500 rounded-full blur-xl"></div>
            <div class="absolute top-40 right-20 w-32 h-32 bg-pink-500 rounded-full blur-2xl"></div>
            <div class="absolute bottom-20 left-20 w-24 h-24 bg-purple-400 rounded-full blur-xl"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="space-y-8">
                <!-- Main Heading -->
                <div class="space-y-4">
                    <h1 class="text-5xl md:text-7xl font-bold leading-tight">
                        <span
                            class="bg-gradient-to-r from-purple-600 via-pink-600 to-purple-800 bg-clip-text text-transparent">
                            Honor Your
                        </span>
                        <br>
                        <span class="bg-gradient-to-r from-pink-600 to-purple-600 bg-clip-text text-transparent">
                            Beloved Pet's Memory
                        </span>
                    </h1>
                    <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto leading-relaxed">
                        Create beautiful, lasting memorial pages to celebrate the unconditional love and joy your furry
                        friends brought to your life.
                    </p>
                </div>

                <!-- Statistics -->
                <div
                    class="flex flex-col sm:flex-row justify-center items-center space-y-6 sm:space-y-0 sm:space-x-12 py-8">
                    <div class="text-center">
                        <div
                            class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
                            {{ $statistics['total_memorials'] }}+
                        </div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">Memorials Created</div>
                    </div>
                    <div class="text-center">
                        <div
                            class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
                            {{ $statistics['total_families'] }}+
                        </div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">Families Served</div>
                    </div>
                    <div class="text-center">
                        <div
                            class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
                            {{ $statistics['years_of_service'] }}+
                        </div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">Years of Service</div>
                    </div>
                </div>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6">
                    @guest
                    <a href="{{ route('register') }}"
                        class="group bg-gradient-to-r from-purple-600 to-pink-600 text-white px-8 py-4 rounded-full text-lg font-semibold hover:from-purple-700 hover:to-pink-700 transition-all duration-300 shadow-2xl hover:shadow-purple-500/25 transform hover:scale-105">
                        <span class="flex items-center justify-center space-x-2">
                            <span>Create Memorial</span>
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </span>
                    </a>
                    @else
                    <a href="{{ route('dashboard') }}"
                        class="group bg-gradient-to-r from-purple-600 to-pink-600 text-white px-8 py-4 rounded-full text-lg font-semibold hover:from-purple-700 hover:to-pink-700 transition-all duration-300 shadow-2xl hover:shadow-purple-500/25 transform hover:scale-105">
                        <span class="flex items-center justify-center space-x-2">
                            <span>Go to Dashboard</span>
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </span>
                    </a>
                    @endguest

                    <button wire:click="scrollToSection('gallery')"
                        class="bg-white dark:bg-gray-800 text-gray-900 dark:text-white px-8 py-4 rounded-full text-lg font-semibold border-2 border-gray-200 dark:border-gray-700 hover:border-purple-300 dark:hover:border-purple-600 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                        View Gallery
                    </button>
                </div>
            </div>
        </div>

        <!-- Scroll indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <button wire:click="scrollToSection('features')"
                class="w-6 h-10 border-2 border-gray-400 dark:border-gray-600 rounded-full flex justify-center">
                <div class="w-1 h-3 bg-gray-400 dark:bg-gray-600 rounded-full mt-2 animate-pulse"></div>
            </button>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-white dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    <span class="bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
                        Why Choose Four Paws?
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                    We understand the deep bond between you and your pet. Our platform provides a beautiful way to honor
                    their memory.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div
                    class="group bg-gradient-to-br from-purple-50 to-pink-50 dark:from-gray-800 dark:to-purple-900/20 p-8 rounded-2xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">Beautiful Memorials</h3>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                        Create stunning, personalized memorial pages with photos, stories, and memories that capture
                        your pet's unique personality.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div
                    class="group bg-gradient-to-br from-purple-50 to-pink-50 dark:from-gray-800 dark:to-purple-900/20 p-8 rounded-2xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">Private & Secure</h3>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                        Your memories are safe with us. Control who can view your pet's memorial with privacy settings
                        that work for you.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div
                    class="group bg-gradient-to-br from-purple-50 to-pink-50 dark:from-gray-800 dark:to-purple-900/20 p-8 rounded-2xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">Share & Connect</h3>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                        Share your pet's story with family and friends. Let others contribute their own memories and
                        condolences.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="py-20 bg-gradient-to-br from-gray-50 to-purple-50 dark:from-gray-800 dark:to-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    <span class="bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
                        Recent Memorials
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                    See how families have honored their beloved companions with beautiful memorial pages.
                </p>
            </div>

            @if($recentMemorials->count() > 0)
            <div class="grid md:grid-cols-3 gap-8">
                @foreach($recentMemorials as $memorial)
                <div
                    class="group bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105 overflow-hidden">
                    @if($memorial->featured_image)
                    <div
                        class="aspect-video bg-gradient-to-br from-purple-100 to-pink-100 dark:from-gray-700 dark:to-purple-900/30 flex items-center justify-center">
                        <img src="{{ $memorial->featured_image }}" alt="{{ $memorial->pet_name }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    </div>
                    @else
                    <div
                        class="aspect-video bg-gradient-to-br from-purple-100 to-pink-100 dark:from-gray-700 dark:to-purple-900/30 flex items-center justify-center">
                        <div class="text-6xl">🐾</div>
                    </div>
                    @endif

                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-gray-900 dark:text-white">{{ $memorial->pet_name }}</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                            {{ Str::limit($memorial->description, 100) }}
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                By {{ $memorial->user->name }}
                            </span>
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                {{ $memorial->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-16">
                <div class="text-6xl mb-4">🐾</div>
                <h3 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">No memorials yet</h3>
                <p class="text-gray-600 dark:text-gray-300 mb-8">Be the first to create a beautiful memorial for your
                    beloved pet.</p>
                @guest
                <a href="{{ route('register') }}"
                    class="bg-gradient-to-r from-purple-600 to-pink-600 text-white px-8 py-3 rounded-full font-semibold hover:from-purple-700 hover:to-pink-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
                    Create First Memorial
                </a>
                @else
                <a href="{{ route('dashboard') }}"
                    class="bg-gradient-to-r from-purple-600 to-pink-600 text-white px-8 py-3 rounded-full font-semibold hover:from-purple-700 hover:to-pink-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
                    Create Memorial
                </a>
                @endguest
            </div>
            @endif
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 dark:bg-black text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center space-y-8">
                <!-- Logo -->
                <div class="flex items-center justify-center space-x-3">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center shadow-lg">
                        <span class="text-white font-bold text-xl">🐾</span>
                    </div>
                    <div>
                        <h1
                            class="text-2xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                            Four Paws
                        </h1>
                        <p class="text-sm text-gray-400">Pet Memorial Service</p>
                    </div>
                </div>

                <!-- Description -->
                <p class="text-gray-300 max-w-2xl mx-auto text-lg leading-relaxed">
                    Helping families honor and remember their beloved pets with beautiful, lasting memorials that
                    celebrate the unconditional love and joy they brought to our lives.
                </p>

                <!-- Copyright -->
                <div class="border-t border-gray-800 pt-8">
                    <p class="text-gray-400">
                        © {{ date('Y') }} Four Paws. Made with ❤️ for pet families everywhere.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Pricing Modal -->
    @if($showPricingModal)
    <div class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4"
        wire:click="togglePricingModal">
        <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 max-w-md w-full shadow-2xl" wire:click.stop>
            <div class="text-center space-y-6">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white">
                    Simple Pricing
                </h3>

                <div
                    class="bg-gradient-to-br from-purple-50 to-pink-50 dark:from-gray-700 dark:to-purple-900/30 p-8 rounded-xl">
                    <div
                        class="text-5xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent mb-2">
                        FREE
                    </div>
                    <p class="text-gray-600 dark:text-gray-300">
                        Create beautiful memorials for your beloved pets at no cost.
                    </p>
                </div>

                <div class="space-y-4 text-left">
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        <span class="text-gray-700 dark:text-gray-300">Unlimited photos</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        <span class="text-gray-700 dark:text-gray-300">Custom stories & memories</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        <span class="text-gray-700 dark:text-gray-300">Share with family & friends</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        <span class="text-gray-700 dark:text-gray-300">Forever preserved</span>
                    </div>
                </div>

                <div class="flex space-x-4">
                    <button wire:click="togglePricingModal"
                        class="flex-1 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-6 py-3 rounded-full font-semibold hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors">
                        Close
                    </button>
                    @guest
                    <a href="{{ route('register') }}"
                        class="flex-1 bg-gradient-to-r from-purple-600 to-pink-600 text-white px-6 py-3 rounded-full font-semibold hover:from-purple-700 hover:to-pink-700 transition-all duration-200 text-center">
                        Get Started
                    </a>
                    @else
                    <a href="{{ route('dashboard') }}"
                        class="flex-1 bg-gradient-to-r from-purple-600 to-pink-600 text-white px-6 py-3 rounded-full font-semibold hover:from-purple-700 hover:to-pink-700 transition-all duration-200 text-center">
                        Dashboard
                    </a>
                    @endguest
                </div>
            </div>
        </div>
    </div>
    @endif

</div>