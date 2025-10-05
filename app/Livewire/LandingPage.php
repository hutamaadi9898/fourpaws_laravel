<?php

namespace App\Livewire;

use App\Models\MemorialPage;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class LandingPage extends Component
{
    public string $activeTab = 'promote';

    public function mount(): void
    {
        // Initialize with promote tab by default
    }

    public function switchTab(string $tab): void
    {
        // Only allow promote and gallery tabs
        if (in_array($tab, ['promote', 'gallery'])) {
            $this->activeTab = $tab;
        }
    }

    public function render(): View
    {
        try {
            $featuredMemorials = MemorialPage::query()
                ->where('is_published', true)
                ->with('user')
                ->latest()
                ->take(6)
                ->get();

            // Calculate basic stats
            $stats = [
                'memorials' => MemorialPage::where('is_published', true)->count(),
                'templates' => 12, // Static number for templates
                'users' => User::count(),
            ];

            return view('livewire.pages.landing-clean', [
                'featuredMemorials' => $featuredMemorials,
                'stats' => $stats,
            ]);
        } catch (\Exception $e) {
            // Fallback with empty collections if there's an error
            return view('livewire.pages.landing-clean', [
                'featuredMemorials' => collect(),
                'stats' => [
                    'memorials' => 0,
                    'templates' => 12,
                    'users' => 0,
                ],
            ]);
        }
    }
}
