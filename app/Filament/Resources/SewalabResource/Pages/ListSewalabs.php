<?php

namespace App\Filament\Resources\SewalabResource\Pages;

use App\Filament\Resources\JadwalLabResource\Widgets\JadwalLabWidget;
use App\Filament\Resources\SewalabResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSewalabs extends ListRecords
{
    protected static string $resource = SewalabResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
            Actions\Action::make('Ubah Jadwal')
                ->url(route('filament.administrator.resources.jadwal-labs.index'))
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            JadwalLabWidget::class,
        ];
    }
}