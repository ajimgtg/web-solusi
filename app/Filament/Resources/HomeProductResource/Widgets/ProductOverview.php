<?php

namespace App\Filament\Resources\HomeProductResource\Widgets;

use App\Models\HomeProduct;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ProductOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Jumlah Product', HomeProduct::count()),
        ];
    }
}
