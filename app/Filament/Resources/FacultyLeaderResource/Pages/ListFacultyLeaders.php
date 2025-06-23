<?php

namespace App\Filament\Resources\FacultyLeaderResource\Pages;

use App\Filament\Resources\FacultyLeaderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFacultyLeaders extends ListRecords
{
    protected static string $resource = FacultyLeaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
