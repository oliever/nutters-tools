<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmailAddressResource\Pages;
use App\Filament\Resources\EmailAddressResource\RelationManagers;
use App\Models\EmailAddress;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmailAddressResource extends Resource
{
    protected static ?string $model = EmailAddress::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('store_id')
                    ->required(),
                Forms\Components\TextInput::make('email_address')
                    ->email()
                    ->required()
                    ->maxLength(255),
                /* Forms\Components\TextInput::make('web_subs'),
                Forms\Components\TextInput::make('fb_id')
                    ->maxLength(255), */
                /* 
                Forms\Components\TextInput::make('cell_no')
                    ->maxLength(255), */
                Forms\Components\TextInput::make('first_name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('last_name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('postal_code')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('store_id'),
                Tables\Columns\TextColumn::make('email_address'),
                /* Tables\Columns\TextColumn::make('web_subs'),
                Tables\Columns\TextColumn::make('fb_id'),
                Tables\Columns\TextColumn::make('postal_code'),
                Tables\Columns\TextColumn::make('cell_no'), */
                Tables\Columns\TextColumn::make('first_name'),
                Tables\Columns\TextColumn::make('last_name'),
               /*  Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime(), */
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                /* Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(), */
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageEmailAddresses::route('/'),
        ];
    }    

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
