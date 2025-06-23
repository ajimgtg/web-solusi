<?php

namespace App\Filament\Resources\SewalabResource\Pages;

use App\Filament\Resources\SewalabResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSewalab extends EditRecord
{
    protected static string $resource = SewalabResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
