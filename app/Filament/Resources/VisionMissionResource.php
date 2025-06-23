<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VisionMissionResource\Pages;
use App\Filament\Resources\VisionMissionResource\RelationManagers;
use App\Models\VisionMission;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VisionMissionResource extends Resource
{
    protected static ?string $model = VisionMission::class;

    protected static ?string $navigationIcon = 'heroicon-o-link';

    // start
    protected static ?string $label = 'Visi Misi';

    protected static ?string $navigationLabel = 'Visi Misi';

    protected static ?string $pluralLabel = 'Visi Misi';

    protected static ?string $navigationGroup = 'Profil Organisasi';

    protected static ?int $navigationSort = 3;

    protected static ?int $sort = 3;
    // end

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('vision')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('mission')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('vision')
                    ->label('Visi')
                    ->limit(50),
                Tables\Columns\TextColumn::make('mission')
                    ->label('Misi')
                    ->limit(50),
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
            'index' => Pages\ListVisionMissions::route('/'),
            'create' => Pages\CreateVisionMission::route('/create'),
            'edit' => Pages\EditVisionMission::route('/{record}/edit'),
        ];
    }
}
