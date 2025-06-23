<?php

namespace App\Filament\Widgets;

use App\Models\Sewalab;
use App\Models\Pelatihan;
use App\Models\Konsultasi;
use App\Models\HomeService;
use App\Models\Sertifikasi;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class LayananOverview extends BaseWidget
{
    // protected int | string | array $columnSpan = 'full';

    // protected int | string | array $columnSpan = [
    //     'md' => 2,
    //     'xl' => 3,
    // ];

    protected int | string | array $columnSpan = [
        'xl' => 4,
    ];

    protected function getColumns(): int
    {
        return 4;
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Konsultasi', Konsultasi::count()),
            Stat::make('Pelatihan', Pelatihan::count()),
            Stat::make('Sertifikasi', Sertifikasi::count()),
            Stat::make('Sewa Lab', Sewalab::count()),
        ];
    }
}