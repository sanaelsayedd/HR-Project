<?php

namespace App\Filament\Resources\PayRollResource\Pages;

use App\Filament\Resources\PayRollResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPayRolls extends ListRecords
{
    protected static string $resource = PayRollResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
