<?php

namespace App\Filament\Resources\PelatihanDataResource\Pages;

use App\Filament\Resources\PelatihanDataResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPelatihanData extends ListRecords
{
    protected static string $resource = PelatihanDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
