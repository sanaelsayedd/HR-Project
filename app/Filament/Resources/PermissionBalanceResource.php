<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PermissionBalanceResource\Pages;
use App\Filament\Resources\PermissionBalanceResource\RelationManagers;
use App\Models\PermissionBalance;
use App\Models\Permission;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PermissionBalanceResource extends Resource
{
    protected static ?string $model = PermissionBalance::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Permission';
    


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('Balance_Amount')->numeric()->required(),
                Select::make(name: 'employee_id')->options(options: User::pluck('username','id'))->required(),
                Select::make(name: 'permissions_id')->options(options: Permission::pluck('id','id'))->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('Balance_Amount'),
                TextColumn::make('employee.email')->label('employee'),
                TextColumn::make('permission.id')->label('permission'),
            ])
            ->filters([
                //
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPermissionBalances::route('/'),
            'create' => Pages\CreatePermissionBalance::route('/create'),
            'edit' => Pages\EditPermissionBalance::route('/{record}/edit'),
        ];
    }
}
