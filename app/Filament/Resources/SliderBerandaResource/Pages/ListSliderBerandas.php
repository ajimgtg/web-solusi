<?php

namespace App\Filament\Resources\SliderBerandaResource\Pages;

use App\Filament\Resources\SliderBerandaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSliderBerandas extends ListRecords
{
    protected static string $resource = SliderBerandaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
