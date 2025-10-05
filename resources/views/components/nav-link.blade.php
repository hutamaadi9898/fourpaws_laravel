@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'inline-flex items-center border-b-2 border-rose-400 px-1 pt-1 text-sm font-semibold leading-5 text-white transition'
                : 'inline-flex items-center border-b-2 border-transparent px-1 pt-1 text-sm font-semibold leading-5 text-slate-300 transition hover:border-white/40 hover:text-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
