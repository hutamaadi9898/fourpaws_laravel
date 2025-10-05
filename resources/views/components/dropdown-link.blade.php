<a {{ $attributes->merge([
    'class' => 'block w-full px-4 py-2 text-start text-sm font-medium text-slate-200 transition hover:bg-white/10 hover:text-white'
]) }}>
    {{ $slot }}
</a>
