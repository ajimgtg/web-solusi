<?php

namespace App\Filament\Resources\PelatihanDataResource\Pages;

use App\Filament\Resources\PelatihanDataResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPelatihanData extends EditRecord
{
    protected static string $resource = PelatihanDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
