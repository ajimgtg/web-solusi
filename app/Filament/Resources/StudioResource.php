<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudioResource\Pages;
use App\Filament\Resources\StudioResource\RelationManagers;
use App\Models\Studio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudioResource extends Resource
{
    protected static ?string $model = Studio::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    // start
    protected static ?string $label = 'Studio';

    protected static ?string $navigationLabel = 'Studio';

    protected static ?string $pluralLabel = 'Studio';

    protected static ?string $navigationGroup = 'Layanan';

    protected static ?int $navigationSort = 2;

    protected static ?int $sort = 5;
    // end

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_produk')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('harga_produk')
                    ->label('Harga Produk (Opsional)')
                    ->numeric(),
                Forms\Components\Textarea::make('deskripsi_produk')
                    ->rows(50)
                    ->required()
                    ->columnSpanFull(),
                    Forms\Components\TextInput::make('link_shopee')
                    ->label('Link Shopee (Opsional)')
                    ->maxLength(255),
                    Forms\Components\TextInput::make('link_tokped')
                    ->label('Link Tokopedia (Opsional)')
                    ->maxLength(255),
                    Forms\Components\FileUpload::make('gambar_produk')
                    ->image()
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('1:1')
                    ->helperText('Ukuran gambar akan otomatis diubah ke 1:1')
                        ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_produk')
                    ->searchable(),
                Tables\Columns\TextColumn::make('harga_produk')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gambar_produk')
                    ->searchable(),
                Tables\Columns\TextColumn::make('link_shopee')
                    ->searchable(),
                Tables\Columns\TextColumn::make('link_tokped')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListStudios::route('/'),
            'create' => Pages\CreateStudio::route('/create'),
            'edit' => Pages\EditStudio::route('/{record}/edit'),
        ];
    }
}
