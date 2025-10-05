@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'block w-full border-l-4 border-rose-400 bg-white/10 px-4 py-2 text-start text-base font-semibold text-white transition'
                : 'block w-full border-l-4 border-transparent px-4 py-2 text-start text-base font-semibold text-slate-300 transition hover:border-white/30 hover:bg-white/5 hover:text-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
