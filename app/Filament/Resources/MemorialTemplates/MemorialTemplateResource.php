<?php

namespace App\Filament\Resources\MemorialTemplates;

use App\Filament\Resources\MemorialTemplates\Pages\CreateMemorialTemplate;
use App\Filament\Resources\MemorialTemplates\Pages\EditMemorialTemplate;
use App\Filament\Resources\MemorialTemplates\Pages\ListMemorialTemplates;
use App\Filament\Resources\MemorialTemplates\Schemas\MemorialTemplateForm;
use App\Filament\Resources\MemorialTemplates\Tables\MemorialTemplatesTable;
use App\Models\MemorialTemplate;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MemorialTemplateResource extends Resource
{
    protected static ?string $model = MemorialTemplate::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return MemorialTemplateForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MemorialTemplatesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMemorialTemplates::route('/'),
            'create' => CreateMemorialTemplate::route('/create'),
            'edit' => EditMemorialTemplate::route('/{record}/edit'),
        ];
    }
}
