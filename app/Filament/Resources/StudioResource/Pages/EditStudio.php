<?php

namespace App\Filament\Resources\StudioResource\Pages;

use App\Filament\Resources\StudioResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStudio extends EditRecord
{
    protected static string $resource = StudioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
