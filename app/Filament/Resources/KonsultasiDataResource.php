<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KonsultasiDataResource\Pages;
use App\Filament\Resources\KonsultasiDataResource\RelationManagers;
use App\Models\KonsultasiData;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KonsultasiDataResource extends Resource
{
    protected static ?string $model = KonsultasiData::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-chart-bar';

    // start
    protected static ?string $label = 'Data Konsultasi';

    protected static ?string $navigationLabel = 'Data Konsultasi';

    protected static ?string $pluralLabel = 'Data Konsultasi';

    protected static ?string $navigationGroup = 'Data Layanan';

    protected static ?int $navigationSort = 3;

    protected static ?int $sort = 1;
    // end

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->rows(50)
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('list')
                    ->rows(100)
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('list')
                    ->wrap()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListKonsultasiData::route('/'),
            'create' => Pages\CreateKonsultasiData::route('/create'),
            'edit' => Pages\EditKonsultasiData::route('/{record}/edit'),
        ];
    }
}