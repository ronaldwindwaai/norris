<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AircraftTypeResource\Pages;
use App\Filament\Resources\AircraftTypeResource\RelationManagers;
use App\Models\AircraftType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;

class AircraftTypeResource extends Resource
{
    protected static ?string $model = AircraftType::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Aircraft Types';
    protected static ?string $pluralLabel = 'Aircraft Types';
    protected static ?string $label = 'Aircraft Type';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('type')
                ->label('Aircraft Type')
                ->required()
                ->unique(AircraftType::class, 'type')
                ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type')
                ->label('Aircraft Type')
                ->sortable()
                ->searchable(),
            
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAircraftTypes::route('/'),
            'create' => Pages\CreateAircraftType::route('/create'),
            'edit' => Pages\EditAircraftType::route('/{record}/edit'),
        ];
    }
}
