<?php

namespace App\Filament\Resources\ManagementResource\Pages;

use App\Filament\Resources\ManagementResource;
use App\Filament\Resources\ManagementResource\Widgets\ManagementsOverview;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListManagement extends ListRecords
{
    protected static string $resource = ManagementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            ManagementsOverview::class,
        ];
    }
}
