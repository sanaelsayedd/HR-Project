<?php

namespace App\Filament\Resources\PermissionTypeResource\Pages;

use App\Filament\Resources\PermissionTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPermissionTypes extends ListRecords
{
    protected static string $resource = PermissionTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
