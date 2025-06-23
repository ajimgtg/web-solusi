<?php

namespace App\Filament\Resources\HomeProductResource\Pages;

use App\Filament\Resources\HomeProductResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHomeProducts extends ListRecords
{
    protected static string $resource = HomeProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            \App\Filament\Resources\HomeProductResource\Widgets\ProductOverview::class,
        ];
    }
}
