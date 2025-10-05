<nav class="-mx-3 flex flex-1 justify-end">
    @auth
        <a
            href="{{ route('dashboard') }}"
            class="rounded-full px-4 py-2 text-sm font-semibold text-slate-200 transition hover:text-white"
        >
            Dashboard
        </a>
    @else
        <a
            href="{{ route('login') }}"
            class="rounded-full px-4 py-2 text-sm font-semibold text-slate-200 transition hover:text-white"
        >
            Log in
        </a>

        @if (Route::has('register'))
            <a
                href="{{ route('register') }}"
                class="rounded-full bg-rose-500 px-4 py-2 text-sm font-semibold text-white shadow-sm shadow-rose-500/30 transition hover:bg-rose-400"
            >
                Register
            </a>
        @endif
    @endauth
</nav>
