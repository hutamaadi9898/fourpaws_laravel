<?php

namespace App\Filament\Resources\MemorialPages\Schemas;

use Filament\Schemas\Schema;

class MemorialPageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make('Pet Information')
                    ->schema([
                        \Filament\Schemas\Components\Select::make('user_id')
                            ->label('Owner')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        \Filament\Schemas\Components\TextInput::make('pet_name')
                            ->label('Pet Name')
                            ->required()
                            ->maxLength(255),

                        \Filament\Schemas\Components\Select::make('pet_type')
                            ->label('Pet Type')
                            ->options([
                                'Dog' => 'Dog',
                                'Cat' => 'Cat',
                                'Bird' => 'Bird',
                                'Rabbit' => 'Rabbit',
                                'Hamster' => 'Hamster',
                                'Guinea Pig' => 'Guinea Pig',
                                'Fish' => 'Fish',
                                'Horse' => 'Horse',
                                'Other' => 'Other',
                            ])
                            ->required(),

                        \Filament\Schemas\Components\TextInput::make('breed')
                            ->label('Breed')
                            ->maxLength(255),

                        \Filament\Schemas\Components\DatePicker::make('birth_date')
                            ->label('Birth Date'),

                        \Filament\Schemas\Components\DatePicker::make('death_date')
                            ->label('Date of Passing'),
                    ])
                    ->columns(2),

                \Filament\Schemas\Components\Section::make('Memorial Details')
                    ->schema([
                        \Filament\Schemas\Components\Select::make('template_id')
                            ->label('Template')
                            ->relationship('template', 'name')
                            ->required()
                            ->preload(),

                        \Filament\Schemas\Components\TextInput::make('slug')
                            ->label('URL Slug')
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->helperText('Leave blank to auto-generate from pet name'),

                        \Filament\Schemas\Components\Textarea::make('description')
                            ->label('Memorial Description')
                            ->rows(4)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                \Filament\Schemas\Components\Section::make('Status & Settings')
                    ->schema([
                        \Filament\Schemas\Components\Toggle::make('is_published')
                            ->label('Published')
                            ->helperText('Published memorials are visible to the public'),

                        \Filament\Schemas\Components\TextInput::make('view_count')
                            ->label('View Count')
                            ->numeric()
                            ->disabled()
                            ->dehydrated(false),

                        \Filament\Schemas\Components\KeyValue::make('custom_settings')
                            ->label('Custom Settings')
                            ->keyLabel('Setting')
                            ->valueLabel('Value')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}
