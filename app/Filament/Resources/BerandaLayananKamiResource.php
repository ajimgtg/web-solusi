<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BerandaLayananKamiResource\Pages;
use App\Filament\Resources\BerandaLayananKamiResource\RelationManagers;
use App\Models\BerandaLayananKami;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BerandaLayananKamiResource extends Resource
{
    protected static ?string $model = BerandaLayananKami::class;

    protected static ?string $navigationIcon = 'heroicon-o-adjustments-horizontal';

    // start
    protected static ?string $label = 'Beranda Layanan Kami';

    protected static ?string $navigationLabel = 'Beranda Layanan Kami';

    protected static ?string $pluralLabel = 'Beranda Layanan Kami';

    protected static ?string $navigationGroup = 'Informasi Publik';

    protected static ?int $navigationSort = 4;

    protected static ?int $sort = 3;
    // end

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('title')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('1:1')
                    ->helperText('Ukuran gambar akan otomatis diubah ke 1:1 (Upload gambar dengan ukuran 512x512 px, Agar gambar tidak terpotong)')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->wrap()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('Deskripsi')
                    ->wrap()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar')
                    ->size(150)
                    ->wrap(),
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
            'index' => Pages\ListBerandaLayananKamis::route('/'),
            'create' => Pages\CreateBerandaLayananKami::route('/create'),
            'edit' => Pages\EditBerandaLayananKami::route('/{record}/edit'),
        ];
    }
}