<?php

namespace App\Livewire;

use App\Models\MemorialPage;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class HomePage extends Component
{
    public function scrollToSection(string $section): void
    {
        $this->dispatch('scroll-to-section', section: $section);
    }

    public function render(): View
    {
        $recentMemorials = MemorialPage::query()
            ->where('is_published', true)
            ->with(['user'])
            ->latest()
            ->take(3)
            ->get();

        $statistics = [
            'total_memorials' => MemorialPage::where('is_published', true)->count(),
            'total_families' => User::count(),
            'years_of_service' => date('Y') - 2020,
        ];

        return view('livewire.home-page', [
            'recentMemorials' => $recentMemorials,
            'statistics' => $statistics,
        ])->layout('layouts.landing');
    }
}
