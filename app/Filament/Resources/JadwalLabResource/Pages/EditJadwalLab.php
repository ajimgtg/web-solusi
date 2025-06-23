<?php

namespace App\Filament\Resources\JadwalLabResource\Pages;

use App\Filament\Resources\JadwalLabResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJadwalLab extends EditRecord
{
    protected static string $resource = JadwalLabResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
