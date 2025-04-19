<?php

namespace App\Filament\Resources\PermissionBalanceResource\Pages;

use App\Filament\Resources\PermissionBalanceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPermissionBalances extends ListRecords
{
    protected static string $resource = PermissionBalanceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
