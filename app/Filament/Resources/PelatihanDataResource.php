<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PelatihanDataResource\Pages;
use App\Filament\Resources\PelatihanDataResource\RelationManagers;
use App\Models\PelatihanData;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PelatihanDataResource extends Resource
{
    protected static ?string $model = PelatihanData::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-chart-bar';

    // start
    protected static ?string $label = 'Data Pelatihan';

    protected static ?string $navigationLabel = 'Data Pelatihan';

    protected static ?string $pluralLabel = 'Data Pelatihan';

    protected static ?string $navigationGroup = 'Data Layanan';

    protected static ?int $navigationSort = 3;

    protected static ?int $sort = 2;
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
            'index' => Pages\ListPelatihanData::route('/'),
            'create' => Pages\CreatePelatihanData::route('/create'),
            'edit' => Pages\EditPelatihanData::route('/{record}/edit'),
        ];
    }
}