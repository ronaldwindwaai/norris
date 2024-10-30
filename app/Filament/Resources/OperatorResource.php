<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OperatorResource\Pages;
use App\Filament\Resources\OperatorResource\RelationManagers;
use App\Models\Operator;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\TextColumn;

class OperatorResource extends Resource
{
    protected static ?string $model = Operator::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Operator';
    protected static ?string $pluralLabel = 'Operators';
    protected static ?string $label = 'Operator';

    public static function form(Form $form): Form
{
    return $form->schema([
        Forms\Components\TextInput::make('name')
            ->label('Operator Name')
            ->required()
            ->unique(Operator::class, 'name')
            ->maxLength(255),

        Forms\Components\TextInput::make('operator_tel')
            ->label('Telephone')
            ->maxLength(15),
        
        Forms\Components\TextInput::make('operator_mobile')
            ->label('Mobile')
            ->maxLength(15),
        
        Forms\Components\TextInput::make('operator_email')
            ->label('Email')
            ->email()
            ->maxLength(255),
        
        Forms\Components\TextInput::make('operator_website')
            ->label('Website')
            ->url()
            ->maxLength(255),
        
        Forms\Components\TextInput::make('ops_contact_person')
            ->label('Contact Person')
            ->maxLength(255),
        
        Forms\Components\TextInput::make('ops_alternate_contact')
            ->label('Alternate Contact')
            ->maxLength(255),
        
        Forms\Components\TextInput::make('operator_location')
            ->label('Location')
            ->maxLength(255),
        
        Forms\Components\TextInput::make('operator_no_acfts')
            ->label('Number of Aircrafts')
            ->numeric()
            ->min(0),
        
        Forms\Components\Toggle::make('active')
            ->label('Active')
            ->default(true),
    ]);
}

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Operator Name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('operator_tel')
                    ->label('Telephone')
                    ->sortable(),
                Tables\Columns\TextColumn::make('operator_mobile')
                    ->label('Mobile')
                    ->sortable(),
                Tables\Columns\TextColumn::make('operator_email')
                    ->label('Email'),
            ])
            ->filters([
                // Add any filters you need here
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
            // Define any relations if needed
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOperators::route('/'),
            'create' => Pages\CreateOperator::route('/create'),
            'edit' => Pages\EditOperator::route('/{record}/edit'),
        ];
    }
}