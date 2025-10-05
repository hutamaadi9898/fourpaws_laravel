<div x-data="{ mobileOpen: false }" class="relative overflow-hidden">
    <!-- Navigation -->
    <header class="absolute inset-x-0 top-0 z-50">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-6 lg:px-8">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <img src="{{ asset('logo.svg') }}" alt="Four Paws" class="h-10 w-auto">
                <div class="text-left">
                    <span class="text-base font-semibold tracking-tight text-white">Four Paws</span>
                    <span class="block text-xs font-medium text-slate-300">Memorial Experiences</span>
                </div>
            </a>

            <nav class="hidden items-center gap-8 text-sm font-medium text-slate-200 lg:flex">
                <button wire:click="scrollToSection('features')" class="transition hover:text-white">Features</button>
                <button wire:click="scrollToSection('gallery')" class="transition hover:text-white">Memorials</button>
                <button wire:click="scrollToSection('process')" class="transition hover:text-white">How it Works</button>
                <button wire:click="scrollToSection('pricing')" class="transition hover:text-white">Pricing</button>
                <button wire:click="scrollToSection('faq')" class="transition hover:text-white">FAQs</button>
            </nav>

            <div class="hidden items-center gap-4 lg:flex">
                @guest
                    <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-200 transition hover:text-white">
                        Sign in
                    </a>
                    <a href="{{ route('register') }}"
                        class="inline-flex items-center gap-2 rounded-full bg-rose-500 px-5 py-2 text-sm font-semibold text-white shadow-lg shadow-rose-500/30 transition hover:bg-rose-400">
                        Create Memorial
                        <span aria-hidden="true">?</span>
                    </a>
                @else
                    <a href="{{ route('dashboard') }}"
                        class="inline-flex items-center gap-2 rounded-full bg-emerald-500 px-5 py-2 text-sm font-semibold text-white shadow-lg shadow-emerald-500/30 transition hover:bg-emerald-400">
                        Dashboard
                        <span aria-hidden="true">?</span>
                    </a>
                @endguest
            </div>

            <button type="button" class="inline-flex items-center rounded-lg p-2 text-slate-200 transition hover:bg-white/10 lg:hidden" x-on:click="mobileOpen = !mobileOpen">
                <span class="sr-only">Toggle navigation</span>
                <svg x-show="!mobileOpen" class="size-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="mobileOpen" x-cloak class="size-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 6l12 12M18 6L6 18" />
                </svg>
            </button>
        </div>

        <div x-show="mobileOpen" x-transition class="mx-auto mt-2 max-w-7xl rounded-3xl bg-white/10 px-6 py-6 backdrop-blur lg:hidden">
            <nav class="flex flex-col gap-4 text-base font-medium text-white">
                <button wire:click="scrollToSection('features'); mobileOpen=false" class="text-left transition hover:text-rose-200">Features</button>
                <button wire:click="scrollToSection('gallery'); mobileOpen=false" class="text-left transition hover:text-rose-200">Memorials</button>
                <button wire:click="scrollToSection('process'); mobileOpen=false" class="text-left transition hover:text-rose-200">How it Works</button>
                <button wire:click="scrollToSection('pricing'); mobileOpen=false" class="text-left transition hover:text-rose-200">Pricing</button>
                <button wire:click="scrollToSection('faq'); mobileOpen=false" class="text-left transition hover:text-rose-200">FAQs</button>
            </nav>
            <div class="mt-6 flex items-center gap-3">
                @guest
                    <a href="{{ route('login') }}" class="w-full rounded-full border border-white/30 px-5 py-2 text-center text-sm font-semibold text-white transition hover:border-white hover:bg-white/10">
                        Sign in
                    </a>
                    <a href="{{ route('register') }}" class="w-full rounded-full bg-rose-500 px-5 py-2 text-center text-sm font-semibold text-white transition hover:bg-rose-400">
                        Create Memorial
                    </a>
                @else
                    <a href="{{ route('dashboard') }}" class="w-full rounded-full bg-emerald-500 px-5 py-2 text-center text-sm font-semibold text-white transition hover:bg-emerald-400">
                        Dashboard
                    </a>
                @endguest
            </div>
        </div>
    </header>

    <main class="relative isolate">
        <!-- Hero -->
        <section id="hero" class="relative pt-32 sm:pt-36 lg:pt-40">
            <div aria-hidden="true" class="absolute inset-0 -z-10">
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,#1f2937,transparent_50%)]"></div>
                <div class="absolute inset-0 bg-[rgba(15,23,42,0.92)]"></div>
                <div class="absolute inset-x-0 bottom-0 h-48 bg-gradient-to-t from-slate-950"></div>
            </div>

            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid gap-12 lg:grid-cols-12 lg:items-center">
                    <div class="space-y-6 lg:col-span-6">
                        <span class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-4 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-rose-200">Honour their story</span>
                        <h1 class="text-4xl font-semibold tracking-tight text-white sm:text-5xl lg:text-6xl">
                            Hold onto the love.<br>
                            Share the story forever.
                        </h1>
                        <p class="text-lg text-slate-300 sm:text-xl">
                            Four Paws makes it effortless for families to craft personalised pet memorials뾠omplete with stories, photos, tributes, and guestbooks뾱o every wag, purr, and cuddle is remembered with care.
                        </p>
                        <div class="flex flex-col gap-4 sm:flex-row">
                            <a href="{{ route('register') }}" class="inline-flex items-center justify-center gap-3 rounded-full bg-rose-500 px-6 py-3 text-base font-semibold text-white shadow-lg shadow-rose-500/30 transition hover:bg-rose-400">
                                Start a memorial
                                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 12h14m-7-7 7 7-7 7" />
                                </svg>
                            </a>
                            <button wire:click="scrollToSection('gallery')" class="inline-flex items-center justify-center gap-2 rounded-full border border-white/20 px-6 py-3 text-base font-semibold text-white transition hover:border-white/40 hover:bg-white/5">
                                Browse memorials
                                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7l4 4-4 4m4-4h4" />
                                </svg>
                            </button>
                        </div>

                        <dl class="grid gap-6 sm:grid-cols-3">
                            <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
                                <dt class="text-sm text-slate-400">Memorials created</dt>
                                <dd class="mt-2 text-2xl font-semibold text-white">{{ number_format($statistics['total_memorials']) }}</dd>
                            </div>
                            <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
                                <dt class="text-sm text-slate-400">Families comforted</dt>
                                <dd class="mt-2 text-2xl font-semibold text-white">{{ number_format($statistics['total_families']) }}</dd>
                            </div>
                            <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
                                <dt class="text-sm text-slate-400">Years of support</dt>
                                <dd class="mt-2 text-2xl font-semibold text-white">{{ $statistics['years_of_service'] }}+</dd>
                            </div>
                        </dl>
                    </div>

                    <div class="lg:col-span-6">
                        @php($heroMemorial = $recentMemorials->first())
                        <div class="relative overflow-hidden rounded-[2.5rem] border border-white/10 bg-white/5 p-8 shadow-2xl shadow-rose-500/10">
                            <div class="absolute -top-20 -right-24 size-60 rounded-full bg-rose-400/20 blur-3xl"></div>
                            <div class="absolute -bottom-16 -left-16 size-40 rounded-full bg-emerald-400/20 blur-3xl"></div>

                            <div class="relative space-y-6">
                                <h2 class="text-lg font-semibold text-white">
                                    {{ $heroMemorial?->pet_name ?? 'Create a personal memorial in minutes' }}
                                </h2>
                                <p class="text-sm leading-relaxed text-slate-300">
                                    {{ $heroMemorial?->description ?? 'Add heartfelt stories, favourite photos, playlists, and condolences in a beautifully curated space that feels like home.' }}
                                </p>

                                <div class="rounded-2xl border border-white/10 bg-slate-900/60 p-5">
                                    <div class="flex items-center gap-3">
                                        <div class="flex size-12 items-center justify-center rounded-full bg-white/10 text-xl">??</div>
                                        <div>
                                            <p class="text-sm font-semibold text-white">
                                                {{ $heroMemorial?->user?->name ?? 'Invite family & friends' }}
                                            </p>
                                            <p class="text-xs text-slate-400">
                                                {{ $heroMemorial ? 'Share memories, approve guestbook entries, and keep their story growing.' : 'Collaborate on heartfelt tributes with secure sharing controls.' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <ul class="space-y-3 text-sm text-slate-300">
                                    <li class="flex items-start gap-3">
                                        <span class="mt-1 size-2 rounded-full bg-rose-400"></span>
                                        Launch personalised layouts in under 5 minutes.
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="mt-1 size-2 rounded-full bg-rose-400"></span>
                                        Unlimited photos, stories, and guestbook tributes.
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="mt-1 size-2 rounded-full bg-rose-400"></span>
                                        Privacy controls to keep moments for those who matter most.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features -->
        <section id="features" class="relative bg-slate-950 py-24 sm:py-28">
            <div class="mx-auto max-w-6xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl text-center">
                    <h2 class="text-3xl font-semibold text-white sm:text-4xl">Thoughtful tools for meaningful tributes</h2>
                    <p class="mt-4 text-lg text-slate-400">Every detail in Four Paws is designed to feel gentle, considered, and easy뾱o you can focus on celebrating a lifelong companion.</p>
                </div>

                <div class="mt-16 grid gap-8 md:grid-cols-3">
                    <article class="rounded-3xl border border-white/5 bg-white/[0.04] p-8 shadow-lg shadow-black/20">
                        <div class="flex size-12 items-center justify-center rounded-full bg-rose-500/20 text-rose-200">
                            <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v12m6-6H6" />
                            </svg>
                        </div>
                        <h3 class="mt-6 text-lg font-semibold text-white">Beautiful memorial layouts</h3>
                        <p class="mt-3 text-sm leading-6 text-slate-400">Choose from designer-crafted templates optimised for photos, stories, timelines, and keepsakes across every device.</p>
                    </article>

                    <article class="rounded-3xl border border-white/5 bg-white/[0.04] p-8 shadow-lg shadow-black/20">
                        <div class="flex size-12 items-center justify-center rounded-full bg-indigo-500/20 text-indigo-200">
                            <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L18 8.651M16.862 4.487L8.768 12.58a4.5 4.5 0 00-1.057 1.685l-.924 2.773a.563.563 0 00.706.706l2.773-.924a4.5 4.5 0 001.685-1.057l8.094-8.093M16.862 4.487L18 5.625" />
                            </svg>
                        </div>
                        <h3 class="mt-6 text-lg font-semibold text-white">Personal stories & media</h3>
                        <p class="mt-3 text-sm leading-6 text-slate-400">Rich storytelling blocks, unlimited galleries, embedded video, and playlists capture the moments that defined your life together.</p>
                    </article>

                    <article class="rounded-3xl border border-white/5 bg-white/[0.04] p-8 shadow-lg shadow-black/20">
                        <div class="flex size-12 items-center justify-center rounded-full bg-emerald-500/20 text-emerald-200">
                            <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="mt-6 text-lg font-semibold text-white">Shared condolences, safely</h3>
                        <p class="mt-3 text-sm leading-6 text-slate-400">Moderated guestbooks, private sharing links, and approval workflows keep your space respectful and secure.</p>
                    </article>
                </div>
            </div>
        </section>

        <!-- Memorial gallery -->
        <section id="gallery" class="relative bg-slate-950 py-24 sm:py-28">
            <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-white/10 to-transparent"></div>
            <div class="mx-auto max-w-6xl px-6 lg:px-8">
                <div class="flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between">
                    <div>
                        <span class="text-sm font-semibold uppercase tracking-[0.2em] text-rose-200">Memorial gallery</span>
                        <h2 class="mt-3 text-3xl font-semibold text-white sm:text-4xl">Featured stories from our community</h2>
                    </div>
                    <a href="{{ route('register') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-rose-200 transition hover:text-rose-100">
                        Share your own
                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 12h14m-7-7 7 7-7 7" />
                        </svg>
                    </a>
                </div>

                <div class="mt-12 grid gap-8 md:grid-cols-3">
                    @forelse ($recentMemorials as $memorial)
                        <article class="group relative flex h-full flex-col overflow-hidden rounded-3xl border border-white/5 bg-white/[0.04] p-8 shadow-lg shadow-black/20">
                            <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-rose-400/80 via-amber-300/60 to-emerald-400/80 opacity-0 transition group-hover:opacity-100"></div>
                            <h3 class="text-2xl font-semibold text-white">{{ $memorial->pet_name }}</h3>
                            <p class="mt-2 text-sm font-medium text-slate-400">Cherished by {{ $memorial->user?->name ?? 'a loving family' }}</p>
                            <p class="mt-4 line-clamp-3 text-sm leading-6 text-slate-300">{{ $memorial->description }}</p>
                            <div class="mt-auto pt-6">
                                <a href="{{ route('memorial.show', $memorial) }}" class="inline-flex items-center gap-2 text-sm font-semibold text-rose-200 transition hover:text-rose-100">
                                    View memorial
                                    <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 12h14m-7-7 7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </article>
                    @empty
                        <div class="rounded-3xl border border-white/5 bg-white/[0.04] p-10 text-center text-slate-300">
                            We&rsquo;re preparing our first featured memorials. Be among the first to share your companion&rsquo;s story.
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Process -->
        <section id="process" class="relative bg-slate-950 py-24 sm:py-28">
            <div class="mx-auto max-w-5xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl text-center">
                    <h2 class="text-3xl font-semibold text-white sm:text-4xl">A guided journey crafted for care</h2>
                    <p class="mt-4 text-lg text-slate-400">From the first word to the final tribute, Four Paws supports you with thoughtful prompts and gentle automation.</p>
                </div>

                <ol class="mt-16 space-y-10">
                    <li class="relative flex gap-6 rounded-3xl border border-white/5 bg-white/[0.04] p-8 shadow-xl shadow-black/20">
                        <span class="flex size-12 items-center justify-center rounded-2xl bg-rose-500/20 text-lg font-semibold text-rose-200">1</span>
                        <div>
                            <h3 class="text-xl font-semibold text-white">Tell us about your companion</h3>
                            <p class="mt-3 text-sm leading-6 text-slate-300">Add their name, favourite memories, personality quirks, and milestones with prompts that help the words flow.</p>
                        </div>
                    </li>
                    <li class="relative flex gap-6 rounded-3xl border border-white/5 bg-white/[0.04] p-8 shadow-xl shadow-black/20">
                        <span class="flex size-12 items-center justify-center rounded-2xl bg-indigo-500/20 text-lg font-semibold text-indigo-200">2</span>
                        <div>
                            <h3 class="text-xl font-semibold text-white">Curate their gallery & timeline</h3>
                            <p class="mt-3 text-sm leading-6 text-slate-300">Drag-and-drop photos, add videos, and build a living scrapbook that highlights the bonds you shared.</p>
                        </div>
                    </li>
                    <li class="relative flex gap-6 rounded-3xl border border-white/5 bg-white/[0.04] p-8 shadow-xl shadow-black/20">
                        <span class="flex size-12 items-center justify-center rounded-2xl bg-emerald-500/20 text-lg font-semibold text-emerald-200">3</span>
                        <div>
                            <h3 class="text-xl font-semibold text-white">Invite others to celebrate</h3>
                            <p class="mt-3 text-sm leading-6 text-slate-300">Share a private link, collect guestbook messages, and approve tributes so everyone can add their love.</p>
                        </div>
                    </li>
                </ol>
            </div>
        </section>

        <!-- Pricing -->
        <section id="pricing" class="relative bg-slate-950 py-24 sm:py-28">
            <div class="mx-auto max-w-5xl px-6 lg:px-8">
                <div class="text-center">
                    <span class="text-sm font-semibold uppercase tracking-[0.2em] text-rose-200">Pricing</span>
                    <h2 class="mt-3 text-3xl font-semibold text-white sm:text-4xl">Simple, heartfelt, and forever free</h2>
                    <p class="mt-4 text-lg text-slate-400">Create and maintain as many memorials as you need. We believe love should never have a paywall.</p>
                </div>

                <div class="mt-12 rounded-3xl border border-white/5 bg-white/[0.04] p-10 text-center shadow-xl shadow-black/20">
                    <div class="inline-flex items-center gap-3 rounded-full border border-white/10 bg-white/5 px-5 py-2 text-sm font-semibold text-emerald-200">
                        Lifetime access included
                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <p class="mt-6 text-sm uppercase tracking-[0.35em] text-slate-400">Forever plan</p>
                    <div class="mt-4 text-5xl font-semibold text-white">$0</div>
                    <p class="mt-3 text-sm leading-6 text-slate-300">Unlimited memorial pages � Unlimited media � Guestbook controls � Private sharing � Ongoing updates</p>
                    <div class="mt-8 flex flex-col items-center gap-3 sm:flex-row sm:justify-center">
                        <a href="{{ route('register') }}" class="inline-flex items-center justify-center rounded-full bg-rose-500 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-rose-500/30 transition hover:bg-rose-400">
                            Create your memorial today
                        </a>
                        <button wire:click="scrollToSection('faq')" class="inline-flex items-center justify-center rounded-full border border-white/20 px-6 py-3 text-sm font-semibold text-white transition hover:border-white/40 hover:bg-white/5">
                            Learn about what&rsquo;s included
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ -->
        <section id="faq" class="relative bg-slate-950 pb-24 sm:pb-32">
            <div class="mx-auto max-w-5xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl text-center">
                    <h2 class="text-3xl font-semibold text-white sm:text-4xl">Questions, answered with care</h2>
                    <p class="mt-4 text-lg text-slate-400">We&rsquo;re here to support you with privacy, longevity, and gentle guidance throughout the memorial process.</p>
                </div>

                <dl class="mt-12 space-y-6">
                    <div class="rounded-3xl border border-white/5 bg-white/[0.04] p-6">
                        <dt class="text-base font-semibold text-white">How long will our memorial stay online?</dt>
                        <dd class="mt-3 text-sm leading-6 text-slate-300">Forever. We maintain every memorial with redundant backups and offer export options so your memories are always preserved.</dd>
                    </div>
                    <div class="rounded-3xl border border-white/5 bg-white/[0.04] p-6">
                        <dt class="text-base font-semibold text-white">Can we keep the memorial private?</dt>
                        <dd class="mt-3 text-sm leading-6 text-slate-300">Yes. Share privately with selected guests using secure invitations, or make sections public when you&rsquo;re ready.</dd>
                    </div>
                    <div class="rounded-3xl border border-white/5 bg-white/[0.04] p-6">
                        <dt class="text-base font-semibold text-white">Is support available if we need help?</dt>
                        <dd class="mt-3 text-sm leading-6 text-slate-300">Absolutely. Dedicated guides, grief resources, and compassionate support specialists are available whenever you need them.</dd>
                    </div>
                </dl>
            </div>
        </section>

        <!-- CTA -->
        <section id="cta" class="relative bg-gradient-to-br from-rose-500 via-amber-400 to-emerald-400 py-20">
            <div class="absolute inset-0 mix-blend-multiply"></div>
            <div class="mx-auto max-w-5xl px-6 lg:px-8">
                <div class="relative rounded-[3rem] bg-white/[0.08] p-10 text-center shadow-2xl shadow-rose-500/40 backdrop-blur">
                    <h2 class="text-3xl font-semibold text-white sm:text-4xl">A space filled with gratitude, warmth, and love</h2>
                    <p class="mt-4 text-lg text-white/80">Start a memorial today and craft a sanctuary that keeps their spirit close뾲ogether, with the people who loved them most.</p>
                    <div class="mt-8 flex flex-col items-center gap-3 sm:flex-row sm:justify-center">
                        <a href="{{ route('register') }}" class="inline-flex items-center justify-center rounded-full bg-white px-6 py-3 text-sm font-semibold text-slate-950 transition hover:bg-slate-100">
                            Create a memorial now
                        </a>
                        <a href="{{ route('login') }}" class="inline-flex items-center justify-center rounded-full border border-white/50 px-6 py-3 text-sm font-semibold text-white transition hover:border-white">
                            Already started? Continue here
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="border-t border-white/10 bg-slate-950">
        <div class="mx-auto max-w-6xl px-6 py-10 lg:px-8">
            <div class="flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">
                <a href="{{ route('home') }}" class="flex items-center gap-3 text-white">
                    <img src="{{ asset('logo.svg') }}" alt="Four Paws" class="h-8 w-auto">
                    <span class="text-lg font-semibold">Four Paws</span>
                </a>
                <div class="flex flex-wrap items-center gap-4 text-sm text-slate-400">
                    <a href="{{ route('login') }}" class="transition hover:text-white">Sign in</a>
                    <a href="{{ route('register') }}" class="transition hover:text-white">Create memorial</a>
                    <a href="{{ route('terms.show') }}" class="transition hover:text-white">Terms</a>
                    <a href="{{ route('policy.show') }}" class="transition hover:text-white">Privacy</a>
                </div>
            </div>
            <p class="mt-6 text-sm text-slate-500">&copy; {{ now()->year }} Four Paws. Crafted with compassion for pet families everywhere.</p>
        </div>
    </footer>
</div>
