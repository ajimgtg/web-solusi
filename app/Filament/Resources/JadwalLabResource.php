<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\JadwalLab;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Log;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\JadwalLabResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JadwalLabResource extends Resource
{
    protected static ?string $model = JadwalLab::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    // start
    protected static ?string $label = 'Jadwal Lab';

    protected static ?string $navigationLabel = 'Jadwal Lab';

    protected static ?string $pluralLabel = 'Jadwal Lab';

    protected static ?string $navigationGroup = 'Layanan';

    protected static ?int $navigationSort = 2;

    protected static ?int $sort = 1;
    // end

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('hari')
                    ->options([
                        1 => 'Senin',
                        2 => 'Selasa',
                        3 => 'Rabu',
                        4 => 'Kamis',
                        5 => 'Jum\'at',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('sesi')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('jam')
                    ->required()
                    ->maxLength(100),
                Forms\Components\Select::make('status')
                    ->options([
                        1 => 'Digunakan',
                        0 => 'Tidak Digunakan',
                    ])
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->paginated([9])
            ->defaultPaginationPageOption(1)
            ->columns([
                Tables\Columns\TextColumn::make('sesi')
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
            ]) // Menampilkan 9 data per halaman
            ->filters([
                //
            ])
            ->actions([])
            ->bulkActions([]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJadwalLabs::route('/'),
            'create' => Pages\CreateJadwalLab::route('/create'),
            'edit' => Pages\EditJadwalLab::route('/{record}/edit'),
        ];
    }

    public static function getTableQuery(): Builder
    {
        return JadwalLab::query()
            ->fromSub(function ($query) {
                $query->selectRaw('MIN(id) as id, sesi, jam')
                    ->from('jadwal_lab')
                    ->groupBy('sesi', 'jam');
            }, 'grouped_jadwal')
            ->orderBy('id', 'asc') // Urutkan berdasarkan id
            ->limit(9);
    }
}