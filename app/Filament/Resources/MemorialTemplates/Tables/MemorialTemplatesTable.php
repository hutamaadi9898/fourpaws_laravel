<?php

namespace App\Filament\Resources\MemorialTemplates\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

class MemorialTemplatesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                \Filament\Tables\Columns\TextColumn::make('description')
                    ->limit(50)
                    ->tooltip(function (\Filament\Tables\Columns\TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 50) {
                            return null;
                        }

                        return $state;
                    }),

                \Filament\Tables\Columns\ColorColumn::make('template_data.theme_color')
                    ->label('Theme Color'),

                \Filament\Tables\Columns\TextColumn::make('template_data.layout')
                    ->label('Layout')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'modern' => 'success',
                        'classic' => 'info',
                        'elegant' => 'warning',
                        'simple' => 'gray',
                        default => 'gray',
                    }),

                \Filament\Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->sortable(),

                \Filament\Tables\Columns\TextColumn::make('sort_order')
                    ->numeric()
                    ->sortable(),

                \Filament\Tables\Columns\TextColumn::make('memorialPages_count')
                    ->counts('memorialPages')
                    ->label('Pages Using'),

                \Filament\Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                \Filament\Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active')
                    ->boolean()
                    ->trueLabel('Active only')
                    ->falseLabel('Inactive only')
                    ->native(false),

                \Filament\Tables\Filters\SelectFilter::make('template_data.layout')
                    ->label('Layout')
                    ->options([
                        'classic' => 'Classic',
                        'modern' => 'Modern',
                        'elegant' => 'Elegant',
                        'simple' => 'Simple',
                    ]),
            ])
            ->recordActions([
                \Filament\Actions\ViewAction::make(),
                EditAction::make(),
                \Filament\Actions\DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('sort_order');
    }
}
