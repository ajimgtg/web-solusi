<?php

namespace App\Filament\Resources\BerandaLayananKamiResource\Pages;

use App\Filament\Resources\BerandaLayananKamiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBerandaLayananKami extends EditRecord
{
    protected static string $resource = BerandaLayananKamiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
