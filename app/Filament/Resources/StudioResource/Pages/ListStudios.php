<?php

namespace App\Filament\Resources\StudioResource\Pages;

use App\Filament\Resources\StudioResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStudios extends ListRecords
{
    protected static string $resource = StudioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
