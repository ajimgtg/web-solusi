<?php

namespace App\Filament\Resources\KonsultasiDataResource\Pages;

use App\Filament\Resources\KonsultasiDataResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKonsultasiData extends EditRecord
{
    protected static string $resource = KonsultasiDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
