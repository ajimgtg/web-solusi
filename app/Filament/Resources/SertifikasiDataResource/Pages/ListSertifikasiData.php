<?php

namespace App\Filament\Resources\SertifikasiDataResource\Pages;

use App\Filament\Resources\SertifikasiDataResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSertifikasiData extends ListRecords
{
    protected static string $resource = SertifikasiDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
