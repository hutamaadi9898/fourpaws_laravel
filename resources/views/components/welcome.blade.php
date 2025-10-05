@php
    $memorialCount = auth()->user()?->memorialPages()->count() ?? 0;
@endphp

<section class="grid gap-8 lg:grid-cols-2">
    <div class="rounded-3xl border border-white/10 bg-gradient-to-br from-rose-500/20 via-purple-500/10 to-emerald-500/10 p-8 shadow-2xl shadow-black/30">
        <div class="flex items-center gap-4">
            <img src="{{ asset('logo.svg') }}" alt="Four Paws" class="h-12 w-auto">
            <div>
                <h2 class="text-2xl font-semibold text-white">Welcome back to Four Paws</h2>
                <p class="text-sm text-slate-200">Your secure space for celebrating lifelong companions.</p>
            </div>
        </div>

        <p class="mt-6 text-sm leading-6 text-slate-100/80">
            Build beautiful memorials, curate stories, invite family and friends, and keep every precious moment together. We&rsquo;ll handle the hosting, design, accessibility, and privacy so you can focus on what matters most.
        </p>

        <div class="mt-6 flex flex-col gap-3 sm:flex-row">
            <a href="{{ route('home') }}#gallery" class="inline-flex items-center justify-center rounded-full border border-white/30 px-5 py-2 text-sm font-semibold text-white transition hover:border-white/60 hover:bg-white/10">
                View community memorials
            </a>
            <a href="{{ route('home') }}#cta" class="inline-flex items-center justify-center rounded-full bg-rose-500 px-5 py-2 text-sm font-semibold text-white shadow-sm shadow-rose-500/30 transition hover:bg-rose-400">
                Start a new memorial
            </a>
        </div>
    </div>

    <div class="space-y-6">
        <div class="rounded-3xl border border-white/10 bg-slate-900/70 p-6 shadow-2xl shadow-black/30">
            <h3 class="text-sm font-semibold text-slate-200">Your memorials</h3>
            <p class="mt-3 text-3xl font-semibold text-white">{{ $memorialCount }}</p>
            <p class="mt-2 text-sm text-slate-400">Total memorials published under your account.</p>
        </div>

        <div class="rounded-3xl border border-white/10 bg-slate-900/70 p-6 shadow-2xl shadow-black/30">
            <h3 class="text-sm font-semibold text-slate-200">Next steps</h3>
            <ul class="mt-3 space-y-2 text-sm text-slate-300">
                <li>• Upload recent photos and stories to keep memories vivid.</li>
                <li>• Share private links with loved ones for heartfelt guestbook entries.</li>
                <li>• Enable two-factor authentication in your profile for extra security.</li>
            </ul>
        </div>
    </div>
</section>
