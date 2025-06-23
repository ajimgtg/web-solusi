<?php

namespace App\Filament\Resources\SewalabDataResource\Pages;

use App\Filament\Resources\SewalabDataResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSewalabData extends ListRecords
{
    protected static string $resource = SewalabDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
