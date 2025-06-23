<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FacultyLeaderResource\Pages;
use App\Filament\Resources\FacultyLeaderResource\RelationManagers;
use App\Models\FacultyLeader;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Columns\Layout\Grid as LayoutGrid;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FacultyLeaderResource extends Resource
{
    protected static ?string $model = FacultyLeader::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    // start
    protected static ?string $label = 'Pimpinan';

    protected static ?string $navigationLabel = 'Pimpinan';

    protected static ?string $pluralLabel = 'Pimpinan';

    protected static ?string $navigationGroup = 'Profil Organisasi';

    protected static ?int $navigationSort = 0;

    protected static ?int $sort = 0;
    // end

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('position')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nip')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\Layout\Grid::make()
                    ->columns(1)
                    ->schema([
                        Tables\Columns\Layout\Split::make([
                            Tables\Columns\Layout\Grid::make()
                                ->columns(1)
                                ->schema([
                                    Tables\Columns\ImageColumn::make('image')
                                        ->label('Foto')
                                        ->circular()
                                        ->height(150)
                                        ->width(120)
                                        ->extraAttributes([
                                            'class' => 'rounded-md'
                                        ]),
                                ])
                        ])->grow(false)
                    ]),
                Tables\Columns\Layout\Stack::make([
                    Tables\Columns\TextColumn::make('name')
                        ->searchable()
                        ->weight(FontWeight::Medium)
                        ->label('Nama'),
                    Tables\Columns\TextColumn::make('position')
                        ->searchable()
                        ->weight(FontWeight::Medium)
                        ->label('Jabatan'),
                    Tables\Columns\TextColumn::make('nip')
                        ->searchable()
                        ->weight(FontWeight::Medium)
                        ->label('NIP'),
                    Tables\Columns\TextColumn::make('email')
                        ->searchable()
                        ->weight(FontWeight::Medium)
                        ->label('Email'),
                ])

            ])
            ->contentGrid([
                'md' => 2,
                'xl' => 3,
            ])
            ->recordUrl(false)
            ->paginationPageOptions([9, 18, 27])
            // Tables\Columns\TextColumn::make('name')
            //     ->searchable(),
            // Tables\Columns\TextColumn::make('position')
            //     ->searchable(),
            // Tables\Columns\TextColumn::make('nip')
            //     ->searchable(),
            // Tables\Columns\TextColumn::make('email')
            //     ->searchable(),
            // Tables\Columns\ImageColumn::make('image'),
            // Tables\Columns\TextColumn::make('created_at')
            //     ->dateTime()
            //     ->sortable()
            //     ->toggleable(isToggledHiddenByDefault: true),
            // Tables\Columns\TextColumn::make('updated_at')
            //     ->dateTime()
            //     ->sortable()
            //     ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListFacultyLeaders::route('/'),
            'create' => Pages\CreateFacultyLeader::route('/create'),
            'edit' => Pages\EditFacultyLeader::route('/{record}/edit'),
        ];
    }
}