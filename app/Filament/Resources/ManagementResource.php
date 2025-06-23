<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ManagementResource\Pages;
use App\Filament\Resources\ManagementResource\RelationManagers;
use App\Models\Management;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ManagementResource extends Resource
{
    protected static ?string $model = Management::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    // start
    protected static ?string $label = 'Manajemen';

    protected static ?string $navigationLabel = 'Manajemen';

    protected static ?string $pluralLabel = 'Manajemen';

    protected static ?string $navigationGroup = 'Profil Organisasi';

    protected static ?int $navigationSort = 2;

    protected static ?int $sort = 2;
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
                Forms\Components\TextInput::make('link_linkedin'),
                Forms\Components\Select::make('group')
                    ->required()
                    ->options([
                        'struktur' => 'Struktur Organisasi',
                        'asesor' => 'Asessor / Pemateri'
                    ]),
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
                        ->searchable(),
                    Tables\Columns\TextColumn::make('position')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('group')
                        ->searchable()
                        ->formatStateUsing(function ($state) {
                            $labels = [
                                'struktur' => 'Struktur Organisasi',
                                'asesor' => 'Asessor / Pemateri',
                            ];

                            return $labels[$state] ?? $state; // Return the label or the raw value if not found
                        }),
                    Tables\Columns\TextColumn::make('link_linkedin')
                        ->searchable(),
                ])->extraAttributes(['class' => 'space-y-2'])
                    ->grow(),
            ])
            ->contentGrid([
                'md' => 2,
                'xl' => 3,
            ])
            ->recordUrl(false)
            ->paginationPageOptions([9, 18, 27])
            ->filters([
                Tables\Filters\SelectFilter::make('group')
                    ->label('Group')
                    ->options([
                        'struktur' => 'Struktur Organisasi',
                        'asesor' => 'Asessor / Pemateri',
                    ])
                    ->placeholder('All Groups'), // Optional: Placeholder for the filter
                Tables\Filters\SelectFilter::make('position')
                    ->label('Position')
                    ->options(function () {
                        return \App\Models\Management::query()
                            ->distinct()
                            ->pluck('position', 'position')
                            ->toArray();
                    })
                    ->placeholder('All Positions'), // Optional: Placeholder for the filter
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
            'index' => Pages\ListManagement::route('/'),
            'create' => Pages\CreateManagement::route('/create'),
            'edit' => Pages\EditManagement::route('/{record}/edit'),
        ];
    }
}