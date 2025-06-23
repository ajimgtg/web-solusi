<?php

namespace App\Filament\Resources\JadwalLabResource\Widgets;

use App\Models\JadwalLab;
// use Filament\Widgets\Widget;
use Filament\Widgets\TableWidget as BaseWidget;

class JadwalLabWidget extends BaseWidget
{
    protected static string $view = 'filament.widgets.jadwal-lab';

    protected int | string | array $columnSpan = 'full';

    // protected static ?int $columnSpan = 2;

    protected function getViewData(): array
    {
        // Fetch data grouped by sesi and hari
        $jadwal = JadwalLab::all()
            ->groupBy('sesi')
            ->map(function ($items) {
                return $items->keyBy('hari');
            });

        return [
            'jadwal' => $jadwal,
        ];
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                JadwalLab::query()
                    ->select('sesi', 'jam')
                    ->groupBy('sesi', 'jam')
                    ->limit(9)
            )
            ->columns([
                TextColumn::make('sesi')
                    ->label('Sesi')
                    ->sortable(),
                Tables\Columns\TextColumn::make('jam')
                    ->label('Jam')
                    ->sortable(),
                Tables\Columns\SelectColumn::make('senin')
                    ->label('Senin')
                    ->options([
                        1 => 'Digunakan',
                        0 => '-',
                    ])
                    ->getStateUsing(function ($record) {
                        return JadwalLab::where('sesi', $record->sesi)
                            ->where('hari', 1)
                            ->value('status');
                    })
                    ->updateStateUsing(function ($state, $record) {
                        $jadwal = JadwalLab::firstOrCreate(
                            ['sesi' => $record->sesi, 'hari' => 1],
                            ['jam' => $record->jam, 'status' => $state]
                        );
                        $jadwal->update(['status' => $state]);
                    }),
                Tables\Columns\SelectColumn::make('selasa')
                    ->label('Selasa')
                    ->options([
                        1 => 'Digunakan',
                        0 => '-',
                    ])
                    ->getStateUsing(function ($record) {
                        return JadwalLab::where('sesi', $record->sesi)
                            ->where('hari', 2)
                            ->value('status');
                    })
                    ->updateStateUsing(function ($state, $record) {
                        $jadwal = JadwalLab::firstOrCreate(
                            ['sesi' => $record->sesi, 'hari' => 2],
                            ['jam' => $record->jam, 'status' => $state]
                        );
                        $jadwal->update(['status' => $state]);
                    }),
                Tables\Columns\SelectColumn::make('rabu')
                    ->label('Rabu')
                    ->options([
                        1 => 'Digunakan',
                        0 => '-',
                    ])
                    ->getStateUsing(function ($record) {
                        return JadwalLab::where('sesi', $record->sesi)
                            ->where('hari', 3)
                            ->value('status');
                    })
                    ->updateStateUsing(function ($state, $record) {
                        $jadwal = JadwalLab::firstOrCreate(
                            ['sesi' => $record->sesi, 'hari' => 3],
                            ['jam' => $record->jam, 'status' => $state]
                        );
                        $jadwal->update(['status' => $state]);
                    }),
                Tables\Columns\SelectColumn::make('kamis')
                    ->label('Kamis')
                    ->options([
                        1 => 'Digunakan',
                        0 => '-',
                    ])
                    ->getStateUsing(function ($record) {
                        return JadwalLab::where('sesi', $record->sesi)
                            ->where('hari', 4)
                            ->value('status');
                    })
                    ->updateStateUsing(function ($state, $record) {
                        $jadwal = JadwalLab::firstOrCreate(
                            ['sesi' => $record->sesi, 'hari' => 4],
                            ['jam' => $record->jam, 'status' => $state]
                        );
                        $jadwal->update(['status' => $state]);
                    }),
                Tables\Columns\SelectColumn::make('jumat')
                    ->label("Jum'at")
                    ->options([
                        1 => 'Digunakan',
                        0 => '-',
                    ])
                    ->getStateUsing(function ($record) {
                        return JadwalLab::where('sesi', $record->sesi)
                            ->where('hari', 5)
                            ->value('status');
                    })
                    ->updateStateUsing(function ($state, $record) {
                        $jadwal = JadwalLab::firstOrCreate(
                            ['sesi' => $record->sesi, 'hari' => 5],
                            ['jam' => $record->jam, 'status' => $state]
                        );
                        $jadwal->update(['status' => $state]);
                    }),
            ]);
    }
}