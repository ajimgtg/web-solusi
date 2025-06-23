<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Filament\Resources\ContactResource\RelationManagers;
use App\Models\Contact;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-home';

    // start
    protected static ?string $label = 'Kontak';

    protected static ?string $navigationLabel = 'Kontak';

    protected static ?string $pluralLabel = 'Kontak';

    protected static ?string $navigationGroup = 'Informasi Publik';

    protected static ?int $navigationSort = 4;

    protected static ?int $sort = 6;
    // end

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('address')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->placeholder("031")
                    ->helperText('Gunakan format 031 untuk nomor telepon')
                    ->required()
                    ->maxLength(15),
                Forms\Components\TextInput::make('whatsapp')
                    ->tel()
                    ->placeholder("62")
                    ->helperText('Gunakan format 62 untuk nomor telepon')
                    ->required()
                    ->maxLength(15),
                Forms\Components\TextInput::make('instagram')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('youtube')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('linkedin')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('hari_oprasional')
                    ->label('Hari Operasional')
                    ->placeholder('Senin - Jum\'at')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jam_oprasional')
                    ->label('Jam Operasional')
                    ->placeholder('07.30 - 16.00')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('link_maps')
                    ->label('Google Maps')
                    ->placeholder('<iframe src=...></iframe>')
                    // ->helperText('Copy the iframe code from Google Maps and paste it here.')
                    ->helperText('Salin kode iframe dari Google Maps dan paste di sini.')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('No. Telepon')
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('whatsapp')
                    ->label('No. Whatsapp')
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('instagram')
                    ->searchable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('youtube')
                    ->searchable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('linkedin')
                    ->searchable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('hari_oprasional')
                    ->searchable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('jam_oprasional')
                    ->searchable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('link_maps')
                    ->label('Iframe Maps')
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
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}