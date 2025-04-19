<?php

namespace App\Filament\Resources\PermissionBalanceResource\Pages;

use App\Filament\Resources\PermissionBalanceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPermissionBalance extends EditRecord
{
    protected static string $resource = PermissionBalanceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
