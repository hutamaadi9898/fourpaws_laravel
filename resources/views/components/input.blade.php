@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'rounded-2xl border-white/10 bg-white/5 px-4 py-2 text-sm text-slate-100 placeholder:text-slate-400 shadow-sm transition focus:border-rose-400 focus:ring-rose-400 disabled:cursor-not-allowed disabled:opacity-60'
]) !!}>
