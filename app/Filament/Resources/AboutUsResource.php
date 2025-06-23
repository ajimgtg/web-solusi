<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutUsResource\Pages;
use App\Filament\Resources\AboutUsResource\RelationManagers;
use App\Models\AboutUs;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AboutUsResource extends Resource
{
    protected static ?string $model = AboutUs::class;

    protected static ?string $navigationIcon = 'heroicon-o-information-circle';

    // start
    protected static ?string $label = 'Tentang Kami';

    protected static ?string $navigationLabel = 'Tentang Kami';

    protected static ?string $pluralLabel = 'Tentang Kami';

    protected static ?string $navigationGroup = 'Profil Organisasi';

    protected static ?int $navigationSort = 7;

    protected static ?int $sort = 7;
    // end

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('judul1')
                            ->label('Judul')
                            ->required(),
                        Forms\Components\TextInput::make('description1')
                            ->label('Deskripsi')
                            ->required(),
                        Forms\Components\FileUpload::make('image1')
                            ->image()
                            ->imageResizeMode('cover')
                    ->imageCropAspectRatio('4:3')
                    ->helperText('Ukuran gambar akan otomatis diubah ke 4:3')
                            ->required(),
                    ])
                    ->label('Informasi Judul 1'),

                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('judul2')
                            ->label('Judul')
                            ->required(),
                        Forms\Components\TextInput::make('description2')
                            ->label('Deskripsi')
                            ->required(),
                        Forms\Components\TextInput::make('link_yutub')
                            ->label('Link Youtube')
                            ->required(),
                    ])
                    ->label('Informasi Judul 2'),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul1')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image1')
                    ->label('Image')
                    ->height(150)
                    ->toggleable(),
                Tables\Columns\TextColumn::make('description1')
                    ->label('Description')
                    ->wrap()
                    ->limit(100)
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('judul2')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description2')
                    ->wrap()
                    ->label('Description')
                    ->limit(100)
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('link_yutub')
                    ->wrap()
                    ->label('Link Youtube')
                    // ->formatStateUsing(function ($state) {
                    //     if (preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $state, $matches)) {
                    //         return 'https://www.youtube.com/embed/' . $matches[1] . '?';
                    //     } elseif (preg_match('/youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/', $state, $matches)) {
                    //         return 'https://www.youtube.com/embed/' . $matches[1] . '?';
                    //     }
                    //     return $state;
                    // })
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListAboutUs::route('/'),
            'create' => Pages\CreateAboutUs::route('/create'),
            'edit' => Pages\EditAboutUs::route('/{record}/edit'),
        ];
    }
}