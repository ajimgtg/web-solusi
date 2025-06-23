<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HomeProductResource\Pages;
use App\Filament\Resources\HomeProductResource\RelationManagers;
use App\Models\HomeProduct;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HomeProductResource extends Resource
{
    protected static ?string $model = HomeProduct::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // start
    protected static ?string $label = 'Katalog Produk';

    protected static ?string $navigationLabel = 'Katalog Produk';

    protected static ?string $pluralLabel = 'Katalog Produk';

    protected static ?string $navigationGroup = 'Informasi Publik';

    protected static ?int $navigationSort = 4;

    protected static ?int $sort = 4;
    // end

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_produk')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('deskripsi_produk')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('harga_produk')
                    ->required()
                    ->numeric()
                    ->prefix('Rp'),
                Forms\Components\FileUpload::make('gambar_produk')
                    ->image()
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('1:1')
                    ->helperText('Ukuran gambar akan otomatis diubah ke 1:1')
                    ->required(),
                Forms\Components\TextInput::make('link_shopee')
                ->label('Link Shopee (Opsional)'),
                    // ->required(),
                Forms\Components\TextInput::make('link_tokped')
                ->label('Link Tokopedia (Opsional)'),
                    // ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_produk')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deskripsi_produk')
                    ->wrap()
                    ->sortable(),
                Tables\Columns\TextColumn::make('harga_produk')
                    ->money('idr')
                    ->sortable(),
                Tables\Columns\ImageColumn::make('gambar_produk')
                    ->height(150),
                Tables\Columns\TextColumn::make('link_shopee')
                    ->label('Link Shopee')
                    ->wrap()
                    ->sortable(),
                Tables\Columns\TextColumn::make('link_tokped')
                    ->label('Link Tokopedia')
                    ->wrap()
                    ->sortable(),
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
            'index' => Pages\ListHomeProducts::route('/'),
            'create' => Pages\CreateHomeProduct::route('/create'),
            'edit' => Pages\EditHomeProduct::route('/{record}/edit'),
        ];
    }
}