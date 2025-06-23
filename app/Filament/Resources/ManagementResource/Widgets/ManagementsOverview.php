<?php

namespace App\Filament\Resources\ManagementResource\Widgets;

use App\Models\Management;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class ManagementsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            //make stat with icon and label
            Stat::make('Jumlah Manajemen', Management::count())
                ->label('Jumlah Manajemen')
                ->icon('heroicon-o-user-group')
                ->color('success'),
            Stat::make('Jumlah Struktur', Management::where('group', 'struktur')->count())
                ->label('Jumlah Struktur')
                ->icon('heroicon-o-user-group')
                ->color('primary'),
            Stat::make('Jumlah Asesor', Management::where('group', 'asesor')->count())
                ->label('Jumlah Asesor')
                ->icon('heroicon-o-user-group')
                ->color('warning'),
        ];
    }
}
