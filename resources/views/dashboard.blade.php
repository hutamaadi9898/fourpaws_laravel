<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-semibold text-white">{{ __('Dashboard') }}</h1>
            <p class="text-sm text-slate-400">Welcome back, {{ auth()->user()->name }}.</p>
        </div>
    </x-slot>

    <div class="space-y-8">
        <section class="rounded-3xl border border-white/10 bg-slate-900/60 p-8 shadow-2xl shadow-black/30">
            <x-welcome />
        </section>
    </div>
</x-app-layout>
