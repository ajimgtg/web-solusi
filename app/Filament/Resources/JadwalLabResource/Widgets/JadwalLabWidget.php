<?php

namespace App\Filament\Resources\JadwalLabResource\Widgets;

use App\Models\JadwalLab;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Columns\TextColumn;

class JadwalLabWidget extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    public function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->query(
                JadwalLab::query()
                    ->fromSub(function ($query) {
                        $query->selectRaw('MIN(id) as id, sesi, jam')
                            ->from('jadwal_lab')
                            ->groupBy('sesi', 'jam');
                    }, 'grouped_jadwal')
                    ->orderBy('id', 'asc') // Urutkan berdasarkan id
                    ->limit(9)
            )
            ->columns([
                TextColumn::make('sesi')
                    ->label('Sesi')
                    ->sortable(),
                TextColumn::make('jam')
                    ->label('Jam')
                    ->sortable(),
                TextColumn::make('senin')
                    ->label('Senin')
                    ->getStateUsing(function ($record) {
                        $status = JadwalLab::where('sesi', $record->sesi)
                            ->where('hari', 1)
                            ->value('status');
                        return $status == 1 ? 'Digunakan' : '-';
                    }),
                TextColumn::make('selasa')
                    ->label('Selasa')
                    ->getStateUsing(function ($record) {
                        $status = JadwalLab::where('sesi', $record->sesi)
                            ->where('hari', 2)
                            ->value('status');
                        return $status == 1 ? 'Digunakan' : '-';
                    }),
                TextColumn::make('rabu')
                    ->label('Rabu')
                    ->getStateUsing(function ($record) {
                        $status = JadwalLab::where('sesi', $record->sesi)
                            ->where('hari', 3)
                            ->value('status');
                        return $status == 1 ? 'Digunakan' : '-';
                    }),
                TextColumn::make('kamis')
                    ->label('Kamis')
                    ->getStateUsing(function ($record) {
                        $status = JadwalLab::where('sesi', $record->sesi)
                            ->where('hari', 4)
                            ->value('status');
                        return $status == 1 ? 'Digunakan' : '-';
                    }),
                TextColumn::make('jumat')
                    ->label("Jum'at")
                    ->getStateUsing(function ($record) {
                        $status = JadwalLab::where('sesi', $record->sesi)
                            ->where('hari', 5)
                            ->value('status');
                        return $status == 1 ? 'Digunakan' : '-';
                    }),
            ]);
    }
}