@props(['for'])

@error($for)
    <p {{ $attributes->merge(['class' => 'mt-2 text-sm font-medium text-rose-300']) }}>{{ $message }}</p>
@enderror
