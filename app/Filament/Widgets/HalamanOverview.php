<?php

namespace App\Filament\Widgets;

use App\Models\BerandaLayananKami;
use App\Models\News;
use App\Models\HomeProduct;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class HalamanOverview extends BaseWidget
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
            Stat::make('Layanan', BerandaLayananKami::count()),
            Stat::make('Produk', HomeProduct::count()),
            Stat::make('Berita', News::count()),
        ];
    }
}