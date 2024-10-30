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
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\BulkActionGroup;

use App\Models\Operator;
use App\Models\AircraftType;


class AircraftResource extends Resource
{
    protected static ?string $model = Aircraft::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Aircraft';
    protected static ?string $pluralLabel = 'Aircrafts';
    protected static ?string $label = 'Aircraft';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('registration')
                ->label('Aircraft Registration')
                ->required()
                ->maxLength(50),
                
            Forms\Components\Select::make('aircraft_type_id')
                ->label('Aircraft Type')
                ->options(AircraftType::all()->pluck('type', 'id')->filter(function ($label) {
                    return !is_null($label);
                }))
                ->searchable()
                ->required(),
                
            Forms\Components\Select::make('operator_id')
                ->label('Operator Name')
                ->options(Operator::all()->pluck('name', 'id')->filter(function ($label) {
                    return !is_null($label);
                }))
                ->searchable()
                ->required(),
                
            Forms\Components\TextInput::make('elt_code')
                ->label('ELT Serial Number')
                ->maxLength(255),

            Forms\Components\TextInput::make('elt_manufacturer')
                ->label('ELT Manufacturer')
                ->maxLength(255),
                
            Forms\Components\TextInput::make('hex_id')
                ->label('Hex ID')
                ->maxLength(50),
                
            Forms\Components\TextInput::make('contact_primary')
                ->label('Primary Contact')
                ->maxLength(50),

            Forms\Components\TextInput::make('contact_secondary')
                ->label('Secondary Contact')
                ->maxLength(50),

            Forms\Components\TextInput::make('email')
                ->label('Email')
                ->email()
                ->maxLength(255),
                
            Forms\Components\TextInput::make('physical_address')
                ->label('Physical Address')
                ->maxLength(255),

            Forms\Components\Toggle::make('406_mhz_capability')
                ->label('406MHz Capability')
                ->default(false),        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            Tables\Columns\TextColumn::make('aircraft_registration')
                ->label('Aircraft Registration')
                ->sortable()
                ->searchable(),
                
            Tables\Columns\TextColumn::make('aircraftType.type')
                ->label('Aircraft Type')
                ->sortable()
                ->searchable(),
                
            Tables\Columns\TextColumn::make('operator.name')
                ->label('Operator Name')
                ->sortable()
                ->searchable(),
                
            Tables\Columns\TextColumn::make('elt_code')
                ->label('ELT Serial Number')
                ->sortable(),

            Tables\Columns\BooleanColumn::make('mhz_406')
                ->label('406MHz Capability'),
                
            Tables\Columns\TextColumn::make('created_at')
                ->label('Created At')
                ->dateTime('d/m/Y H:i')
                ->sortable(),

              
            Tables\Columns\TextColumn::make('updated_at')
                ->label('Updated At')
                ->dateTime('d/m/Y H:i')
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
