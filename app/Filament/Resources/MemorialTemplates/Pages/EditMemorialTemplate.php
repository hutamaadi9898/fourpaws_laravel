<?php

namespace App\Filament\Resources\MemorialTemplates\Pages;

use App\Filament\Resources\MemorialTemplates\MemorialTemplateResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMemorialTemplate extends EditRecord
{
    protected static string $resource = MemorialTemplateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
