<?php

namespace App\Filament\Resources\VacationTypeResource\Pages;

use App\Filament\Resources\VacationTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVacationTypes extends ListRecords
{
    protected static string $resource = VacationTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
