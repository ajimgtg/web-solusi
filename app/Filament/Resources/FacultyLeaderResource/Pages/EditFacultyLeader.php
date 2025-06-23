<?php

namespace App\Filament\Resources\FacultyLeaderResource\Pages;

use App\Filament\Resources\FacultyLeaderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFacultyLeader extends EditRecord
{
    protected static string $resource = FacultyLeaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
