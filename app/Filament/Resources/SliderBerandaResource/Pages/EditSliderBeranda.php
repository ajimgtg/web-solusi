<?php

namespace App\Filament\Resources\SliderBerandaResource\Pages;

use App\Filament\Resources\SliderBerandaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSliderBeranda extends EditRecord
{
    protected static string $resource = SliderBerandaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
