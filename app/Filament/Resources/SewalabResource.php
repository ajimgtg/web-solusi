<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JadwalLabResource\Widgets\JadwalLabWidget;
use App\Filament\Resources\SewalabResource\Pages;
use App\Filament\Resources\SewalabResource\RelationManagers;
use App\Models\Sewalab;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use function Livewire\wrap;

class SewalabResource extends Resource
{
    protected static ?string $model = Sewalab::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    // start
    protected static ?string $label = 'Sewa Lab';

    protected static ?string $navigationLabel = 'Sewa Lab';

    protected static ?string $pluralLabel = 'Sewa Lab';

    protected static ?string $navigationGroup = 'Layanan';

    protected static ?int $navigationSort = 2;

    protected static ?int $sort = 4;
    // end

    public static function form(Form $form): Form
    {
        return $form
            ->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('whatsapp')
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('perusahaan')
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('tujuan')
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('hari')
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal')
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('jam_mulai')
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('jam_berakhir')
                    ->wrap()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListSewalabs::route('/'),
            'create' => Pages\CreateSewalab::route('/create'),
            // 'edit' => Pages\EditSewalab::route('/{record}/edit'),
        ];
    }
}