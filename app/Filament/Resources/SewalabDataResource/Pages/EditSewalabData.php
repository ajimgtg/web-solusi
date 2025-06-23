<?php

namespace App\Filament\Resources\SewalabDataResource\Pages;

use App\Filament\Resources\SewalabDataResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSewalabData extends EditRecord
{
    protected static string $resource = SewalabDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
