<?php

namespace App\Filament\Resources\AircraftTypeResource\Pages;

use App\Filament\Resources\AircraftTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAircraftTypes extends ListRecords
{
    protected static string $resource = AircraftTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
