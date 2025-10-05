<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MemorialTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $templates = [
            [
                'name' => 'Classic Memorial',
                'description' => 'A timeless, elegant design perfect for honoring beloved pets',
                'template_data' => [
                    'theme_color' => '#1e40af',
                    'layout' => 'classic',
                    'settings' => [
                        'show_guestbook' => true,
                        'show_stories' => true,
                        'show_media' => true,
                        'font_family' => 'Georgia',
                        'background_type' => 'solid',
                    ],
                ],
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Modern Tribute',
                'description' => 'Clean, contemporary design with modern typography',
                'template_data' => [
                    'theme_color' => '#059669',
                    'layout' => 'modern',
                    'settings' => [
                        'show_guestbook' => true,
                        'show_stories' => true,
                        'show_media' => true,
                        'font_family' => 'Inter',
                        'background_type' => 'gradient',
                    ],
                ],
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Gentle Farewell',
                'description' => 'Soft, comforting design with warm colors',
                'template_data' => [
                    'theme_color' => '#ea580c',
                    'layout' => 'elegant',
                    'settings' => [
                        'show_guestbook' => true,
                        'show_stories' => true,
                        'show_media' => true,
                        'font_family' => 'Inter',
                        'background_type' => 'solid',
                    ],
                ],
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Rainbow Bridge',
                'description' => 'Hopeful design celebrating the joy pets bring to our lives',
                'template_data' => [
                    'theme_color' => '#7c3aed',
                    'layout' => 'modern',
                    'settings' => [
                        'show_guestbook' => true,
                        'show_stories' => true,
                        'show_media' => true,
                        'font_family' => 'Inter',
                        'background_type' => 'gradient',
                    ],
                ],
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Simple & Serene',
                'description' => 'Minimalist design focusing on memories and stories',
                'template_data' => [
                    'theme_color' => '#0891b2',
                    'layout' => 'simple',
                    'settings' => [
                        'show_guestbook' => true,
                        'show_stories' => true,
                        'show_media' => false,
                        'font_family' => 'Inter',
                        'background_type' => 'solid',
                    ],
                ],
                'is_active' => true,
                'sort_order' => 5,
            ],
        ];

        foreach ($templates as $template) {
            \App\Models\MemorialTemplate::create($template);
        }
    }
}
