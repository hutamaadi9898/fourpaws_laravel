@props(['id' => null, 'maxWidth' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-6">
        <div class="text-lg font-semibold text-white">
            {{ $title }}
        </div>

        <div class="mt-4 text-sm leading-6 text-slate-300">
            {{ $content }}
        </div>
    </div>

    <div class="flex flex-row justify-end gap-3 border-t border-white/10 bg-slate-900/80 px-6 py-6 text-end">
        {{ $footer }}
    </div>
</x-modal>
