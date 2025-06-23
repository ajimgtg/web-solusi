<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SertifikasiResource\Pages;
use App\Filament\Resources\SertifikasiResource\RelationManagers;
use App\Models\Sertifikasi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SertifikasiResource extends Resource
{
    protected static ?string $model = Sertifikasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-check';

    // start
    protected static ?string $label = 'Sertifikasi';

    protected static ?string $navigationLabel = 'Sertifikasi';

    protected static ?string $pluralLabel = 'Sertifikasi';

    protected static ?string $navigationGroup = 'Layanan';

    protected static ?int $navigationSort = 2;

    protected static ?int $sort = 3;
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
                    ->searchable(),
                Tables\Columns\TextColumn::make('whatsapp')
                    ->sortable(),
                Tables\Columns\TextColumn::make('skema')
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
            'index' => Pages\ListSertifikasis::route('/'),
            'create' => Pages\CreateSertifikasi::route('/create'),
            // 'edit' => Pages\EditSertifikasi::route('/{record}/edit'),
        ];
    }
}