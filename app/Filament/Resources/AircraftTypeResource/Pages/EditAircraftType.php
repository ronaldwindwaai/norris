<?php

namespace App\Filament\Resources\AircraftTypeResource\Pages;

use App\Filament\Resources\AircraftTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAircraftType extends EditRecord
{
    protected static string $resource = AircraftTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
