@props(['id' => null, 'maxWidth' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 pt-6">
        <div class="sm:flex sm:items-start">
            <div class="mx-auto flex size-12 shrink-0 items-center justify-center rounded-full bg-red-500/20 text-red-200 sm:mx-0 sm:size-10">
                <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.008v.008H12v-.008z" />
                </svg>
            </div>

            <div class="mt-4 text-center sm:mt-0 sm:ms-4 sm:text-left">
                <h3 class="text-lg font-semibold text-white">
                    {{ $title }}
                </h3>

                <div class="mt-3 text-sm leading-6 text-slate-300">
                    {{ $content }}
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-row justify-end gap-3 border-t border-white/10 bg-slate-900/80 px-6 py-6 text-end">
        {{ $footer }}
    </div>
</x-modal>
