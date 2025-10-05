@props(['style' => session('flash.bannerStyle', 'success'), 'message' => session('flash.banner')])

<div
    x-data="{{ json_encode(['show' => true, 'style' => $style, 'message' => $message]) }}"
    :class="{
        'bg-emerald-500/90': style === 'success',
        'bg-red-600/90': style === 'danger',
        'bg-amber-500/90': style === 'warning',
        'bg-slate-800/90': !['success', 'danger', 'warning'].includes(style),
    }"
    style="display: none;"
    x-show="show && message"
    x-on:banner-message.window="
        style = event.detail.style;
        message = event.detail.message;
        show = true;
    "
>
    <div class="mx-auto max-w-6xl px-4 py-2 sm:px-6 lg:px-8">
        <div class="flex flex-wrap items-center justify-between gap-3">
            <div class="flex flex-1 items-center gap-3">
                <span
                    class="flex size-8 items-center justify-center rounded-full bg-white/15"
                    :class="{
                        'text-emerald-200': style === 'success',
                        'text-red-200': style === 'danger',
                        'text-amber-200': style === 'warning',
                        'text-slate-200': !['success', 'danger', 'warning'].includes(style),
                    }"
                >
                    <svg x-show="style === 'success'" class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <svg x-show="style === 'danger'" class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                    </svg>
                    <svg x-show="style === 'warning'" class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4v.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <svg x-show="!['success', 'danger', 'warning'].includes(style)" class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                    </svg>
                </span>

                <p class="text-sm font-semibold text-white" x-text="message"></p>
            </div>

            <button
                type="button"
                class="inline-flex size-8 items-center justify-center rounded-full bg-white/10 text-white transition hover:bg-white/20"
                aria-label="Dismiss"
                x-on:click="show = false"
            >
                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
</div>
