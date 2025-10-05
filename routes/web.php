<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password as SettingsPassword;
use App\Livewire\Settings\Profile as SettingsProfile;
use App\Livewire\Settings\TwoFactor;
use App\Models\MemorialPage;
use Illuminate\Support\Facades\Route;

Route::get('/', App\Livewire\HomePage::class)->name('home');

Route::get('/memorial/{memorial:slug}', function (MemorialPage $memorial) {
    if (! $memorial->is_published) {
        abort(404);
    }

    $memorial->incrementViewCount();

    $memorial->load(['user', 'template', 'media', 'stories', 'guestbookEntries']);

    return view('memorial.show', ['memorial' => $memorial]);
})->name('memorial.show');

require __DIR__.'/auth.php';

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::get('/settings/profile', SettingsProfile::class)->name('settings.profile');
    Route::get('/settings/password', SettingsPassword::class)->name('settings.password');
    Route::get('/settings/appearance', Appearance::class)->name('settings.appearance');
    Route::get('/settings/two-factor', TwoFactor::class)
        ->middleware(['password.confirm'])
        ->name('two-factor.show');
});
