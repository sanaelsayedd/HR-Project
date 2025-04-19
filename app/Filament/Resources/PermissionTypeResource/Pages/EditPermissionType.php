<?php

namespace App\Filament\Resources\PermissionTypeResource\Pages;

use App\Filament\Resources\PermissionTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPermissionType extends EditRecord
{
    protected static string $resource = PermissionTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
