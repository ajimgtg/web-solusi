<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KonsultasiResource\Pages;
use App\Filament\Resources\KonsultasiResource\RelationManagers;
use App\Models\Konsultasi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KonsultasiResource extends Resource
{
    protected static ?string $model = Konsultasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-computer-desktop';

    // start
    protected static ?string $label = 'Konsultasi TI';

    protected static ?string $navigationLabel = 'Konsultasi TI';

    protected static ?string $pluralLabel = 'Konsultasi TI';

    protected static ?string $navigationGroup = 'Layanan';

    protected static ?int $navigationSort = 2;

    protected static ?int $sort = 2;
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
                Tables\Columns\TextColumn::make('layanan_yang_dibutuhkan')
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
            'index' => Pages\ListKonsultasis::route('/'),
            'create' => Pages\CreateKonsultasi::route('/create'),
            // 'edit' => Pages\EditKonsultasi::route('/{record}/edit'),
        ];
    }
}