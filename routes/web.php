<?php

use Illuminate\Support\Facades\Route;

Route::get('/', App\Livewire\HomePage::class)->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Memorial page routes
Route::get('/memorial/{memorial:slug}', function (\App\Models\MemorialPage $memorial) {
    // Increment view count
    $memorial->incrementViewCount();

    // Load relationships
    $memorial->load(['user', 'template', 'media', 'stories', 'guestbookEntries']);

    return view('memorial.show', ['memorial' => $memorial]);
})->name('memorial.show');

require __DIR__.'/auth.php';
