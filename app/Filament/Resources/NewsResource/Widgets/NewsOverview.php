<?php

namespace App\Filament\Resources\NewsResource\Widgets;

use App\Models\News;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class NewsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Jumlah Berita', News::count()),
        ];
    }
}
