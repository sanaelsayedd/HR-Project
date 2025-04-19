<?php

namespace App\Filament\Resources\PayRollResource\Pages;

use App\Filament\Resources\PayRollResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPayRoll extends EditRecord
{
    protected static string $resource = PayRollResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
