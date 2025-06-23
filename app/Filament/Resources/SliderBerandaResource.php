<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SliderBerandaResource\Pages;
use App\Filament\Resources\SliderBerandaResource\RelationManagers;
use App\Models\SliderBeranda;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SliderBerandaResource extends Resource
{
    protected static ?string $model = SliderBeranda::class;

    protected static ?string $navigationIcon = 'heroicon-o-adjustments-horizontal';

    // start
    protected static ?string $label = 'Slider Beranda';

    protected static ?string $navigationLabel = 'Slider Beranda';

    protected static ?string $pluralLabel = 'Slider Beranda';

    protected static ?string $navigationGroup = 'Informasi Publik';

    protected static ?int $navigationSort = 4;

    protected static ?int $sort = 1;
    // end

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('judul')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('16:9')
                    ->helperText('Ukuran gambar akan otomatis diubah ke 16:9')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->wrap(),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar')
                    ->size(150)
                    ->wrap(),
                Tables\Columns\TextColumn::make('description')
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
            'index' => Pages\ListSliderBerandas::route('/'),
            'create' => Pages\CreateSliderBeranda::route('/create'),
            'edit' => Pages\EditSliderBeranda::route('/{record}/edit'),
        ];
    }
}