<?php

namespace App\Filament\Resources\MemorialPages\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

class MemorialPagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('pet_name')
                    ->label('Pet Name')
                    ->searchable()
                    ->sortable(),

                \Filament\Tables\Columns\TextColumn::make('pet_type')
                    ->label('Type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Dog' => 'success',
                        'Cat' => 'info',
                        'Bird' => 'warning',
                        'Rabbit' => 'gray',
                        'Fish' => 'primary',
                        default => 'secondary',
                    }),

                \Filament\Tables\Columns\TextColumn::make('breed')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                \Filament\Tables\Columns\TextColumn::make('user.name')
                    ->label('Owner')
                    ->searchable()
                    ->sortable(),

                \Filament\Tables\Columns\TextColumn::make('template.name')
                    ->label('Template')
                    ->searchable(),

                \Filament\Tables\Columns\IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean()
                    ->sortable(),

                \Filament\Tables\Columns\TextColumn::make('view_count')
                    ->label('Views')
                    ->numeric()
                    ->sortable(),

                \Filament\Tables\Columns\TextColumn::make('media_count')
                    ->counts('media')
                    ->label('Media'),

                \Filament\Tables\Columns\TextColumn::make('stories_count')
                    ->counts('stories')
                    ->label('Stories'),

                \Filament\Tables\Columns\TextColumn::make('guestbookEntries_count')
                    ->counts('guestbookEntries')
                    ->label('Messages'),

                \Filament\Tables\Columns\TextColumn::make('birth_date')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                \Filament\Tables\Columns\TextColumn::make('death_date')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                \Filament\Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                \Filament\Tables\Filters\SelectFilter::make('pet_type')
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
                    ]),

                \Filament\Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Published')
                    ->boolean()
                    ->trueLabel('Published only')
                    ->falseLabel('Unpublished only')
                    ->native(false),

                \Filament\Tables\Filters\SelectFilter::make('template')
                    ->relationship('template', 'name'),

                \Filament\Tables\Filters\Filter::make('created_at')
                    ->form([
                        \Filament\Schemas\Components\DatePicker::make('created_from'),
                        \Filament\Schemas\Components\DatePicker::make('created_until'),
                    ])
                    ->query(function (\Illuminate\Database\Eloquent\Builder $query, array $data): \Illuminate\Database\Eloquent\Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (\Illuminate\Database\Eloquent\Builder $query, $date): \Illuminate\Database\Eloquent\Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (\Illuminate\Database\Eloquent\Builder $query, $date): \Illuminate\Database\Eloquent\Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
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
            ->defaultSort('created_at', 'desc');
    }
}
