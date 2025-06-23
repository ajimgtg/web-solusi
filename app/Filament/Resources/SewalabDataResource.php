<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SewalabDataResource\Pages;
use App\Filament\Resources\SewalabDataResource\RelationManagers;
use App\Models\SewalabData;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SewalabDataResource extends Resource
{
    protected static ?string $model = SewalabData::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-chart-bar';

    // start
    protected static ?string $label = 'Data Sewalab';

    protected static ?string $navigationLabel = 'Data Sewalab';

    protected static ?string $pluralLabel = 'Data Sewalab';

    protected static ?string $navigationGroup = 'Data Layanan';

    protected static ?int $navigationSort = 3;

    protected static ?int $sort = 4;
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
                Forms\Components\Textarea::make('list_1')
                    ->rows(100)
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('list_2')
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
                Tables\Columns\TextColumn::make('list_1')
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('list_2')
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
            'index' => Pages\ListSewalabData::route('/'),
            'create' => Pages\CreateSewalabData::route('/create'),
            'edit' => Pages\EditSewalabData::route('/{record}/edit'),
        ];
    }
}