<?php

namespace App\Filament\Resources\SertifikasiDataResource\Pages;

use App\Filament\Resources\SertifikasiDataResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSertifikasiData extends EditRecord
{
    protected static string $resource = SertifikasiDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
