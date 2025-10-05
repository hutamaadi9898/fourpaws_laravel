<?php

namespace App\Http\Controllers;

use App\Models\MemorialPage;
use App\Models\MemorialTemplate;

class LandingController extends Controller
{
    public function index()
    {
        try {
            $data = [
                'featuredMemorials' => MemorialPage::published()
                    ->with(['user', 'media' => fn ($query) => $query->limit(1)])
                    ->latest()
                    ->limit(6)
                    ->get(),
                'templates' => MemorialTemplate::active()
                    ->ordered()
                    ->limit(5)
                    ->get(),
                'stats' => [
                    'memorials' => MemorialPage::published()->count(),
                    'templates' => MemorialTemplate::active()->count(),
                    'users' => \App\Models\User::count(),
                ],
            ];
        } catch (\Exception $e) {
            // Fallback data if database queries fail
            $data = [
                'featuredMemorials' => collect([]),
                'templates' => collect([]),
                'stats' => [
                    'memorials' => 0,
                    'templates' => 0,
                    'users' => 0,
                ],
            ];
        }

        return view('landing-standalone', $data);
    }
}
