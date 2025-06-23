<?php

namespace App\Filament\Resources\HomeProductResource\Pages;

use App\Filament\Resources\HomeProductResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHomeProduct extends CreateRecord
{
    protected static string $resource = HomeProductResource::class;
}
