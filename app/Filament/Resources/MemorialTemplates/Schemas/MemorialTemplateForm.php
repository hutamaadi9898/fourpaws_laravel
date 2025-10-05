<?php

namespace App\Filament\Resources\MemorialTemplates\Schemas;

use Filament\Schemas\Schema;

class MemorialTemplateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make('Template Information')
                    ->schema([
                        \Filament\Schemas\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        \Filament\Schemas\Components\Textarea::make('description')
                            ->rows(3)
                            ->columnSpanFull(),

                        \Filament\Schemas\Components\FileUpload::make('preview_image')
                            ->image()
                            ->directory('template-previews')
                            ->imagePreviewHeight('200')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                \Filament\Schemas\Components\Section::make('Template Configuration')
                    ->schema([
                        \Filament\Schemas\Components\ColorPicker::make('template_data.theme_color')
                            ->label('Theme Color')
                            ->default('#1e40af'),

                        \Filament\Schemas\Components\Select::make('template_data.layout')
                            ->label('Layout Style')
                            ->options([
                                'classic' => 'Classic',
                                'modern' => 'Modern',
                                'elegant' => 'Elegant',
                                'simple' => 'Simple',
                            ])
                            ->default('modern'),

                        \Filament\Schemas\Components\Select::make('template_data.settings.font_family')
                            ->label('Font Family')
                            ->options([
                                'Inter' => 'Inter (Modern)',
                                'Georgia' => 'Georgia (Classic)',
                                'Times New Roman' => 'Times New Roman (Traditional)',
                            ])
                            ->default('Inter'),

                        \Filament\Schemas\Components\Select::make('template_data.settings.background_type')
                            ->label('Background Type')
                            ->options([
                                'solid' => 'Solid Color',
                                'gradient' => 'Gradient',
                                'image' => 'Background Image',
                            ])
                            ->default('solid'),
                    ])
                    ->columns(2),

                \Filament\Schemas\Components\Section::make('Template Features')
                    ->schema([
                        \Filament\Schemas\Components\Toggle::make('template_data.settings.show_guestbook')
                            ->label('Show Guestbook')
                            ->default(true),

                        \Filament\Schemas\Components\Toggle::make('template_data.settings.show_stories')
                            ->label('Show Stories Section')
                            ->default(true),

                        \Filament\Schemas\Components\Toggle::make('template_data.settings.show_media')
                            ->label('Show Media Gallery')
                            ->default(true),
                    ])
                    ->columns(3),

                \Filament\Schemas\Components\Section::make('Status & Ordering')
                    ->schema([
                        \Filament\Schemas\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),

                        \Filament\Schemas\Components\TextInput::make('sort_order')
                            ->numeric()
                            ->default(0)
                            ->helperText('Lower numbers appear first'),
                    ])
                    ->columns(2),
            ]);
    }
}
