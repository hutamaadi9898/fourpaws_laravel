<?php

namespace App\Filament\Resources\MemorialTemplates\Pages;

use App\Filament\Resources\MemorialTemplates\MemorialTemplateResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMemorialTemplates extends ListRecords
{
    protected static string $resource = MemorialTemplateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
