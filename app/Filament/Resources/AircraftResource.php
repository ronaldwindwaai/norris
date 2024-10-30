<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AircraftResource\Pages;
use App\Filament\Resources\AircraftResource\RelationManagers;
use App\Models\Aircraft;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AircraftResource extends Resource
{
    protected static ?string $model = Aircraft::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('registration')->required(),
            TextInput::make('elt_serial_number')->required(),
            TextInput::make('elt_manufacturer')->required(),
            Toggle::make('406_mhz_capability')->label('406 MHz Capability'),
            TextInput::make('operator_name')->required(),
            TextInput::make('contact_primary')->required(),
            TextInput::make('contact_secondary')->nullable(),
            TextInput::make('email')->nullable()->email(),
            TextInput::make('physical_address')->nullable(),
            TextInput::make('aircraft_type')->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('registration'),
                Tables\Columns\TextColumn::make('operator_name'),
                Tables\Columns\TextColumn::make('contact_primary'),
                Tables\Columns\TextColumn::make('aircraft_type'),
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

    public static function getTableQuery(): Builder
    {
        return parent::getTableQuery()->search(['registration', 'operator_name', 'contact_primary']);
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
            'index' => Pages\ListAircraft::route('/'),
            'create' => Pages\CreateAircraft::route('/create'),
            'edit' => Pages\EditAircraft::route('/{record}/edit'),
        ];
    }
}
