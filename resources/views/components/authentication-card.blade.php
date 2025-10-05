<div class="min-h-screen bg-slate-950">
    <div class="mx-auto flex min-h-screen w-full max-w-md flex-col items-center justify-center px-6 py-12">
        <div class="mb-8">
            {{ $logo }}
        </div>

        <div class="w-full rounded-3xl border border-white/10 bg-slate-900/80 p-8 shadow-2xl shadow-black/40 backdrop-blur">
            {{ $slot }}
        </div>
    </div>
</div>
