<?php

namespace App\Filament\Resources\JadwalLabResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\JadwalLabResource;
use App\Filament\Resources\JadwalLabResource\Widgets\JadwalLabWidget;

class ListJadwalLabs extends ListRecords
{
    protected static string $resource = JadwalLabResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
            
            Actions\Action::make('Kembali')
                ->url(route('filament.administrator.resources.sewalabs.index'))
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            // \App\Filament\Resources\JadwalLabResource\Widgets\JadwalLabWidget::class,
            // JadwalLabWidget::class,
        ];
    }
}