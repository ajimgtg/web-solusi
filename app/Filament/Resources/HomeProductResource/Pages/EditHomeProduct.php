<?php

namespace App\Filament\Resources\HomeProductResource\Pages;

use App\Filament\Resources\HomeProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHomeProduct extends EditRecord
{
    protected static string $resource = HomeProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
