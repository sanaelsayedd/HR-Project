<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PermissionResource\Pages;
use App\Filament\Resources\PermissionResource\RelationManagers;
use App\Models\PermissionBalance;
use App\Models\Permission;
use App\Models\PermissionType;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PermissionResource extends Resource
{
    protected static ?string $model = Permission::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Permission';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                DatePicker::make('StartDate')->required(),
                DatePicker::make('EndDate')->required(),
                Select::make('Status')
                ->label('Status')
                ->default(0)
                ->options([
                    1 => "approved",   
                    0 => "rejected",  
                ])
                ->native(false)
                ->required(),
                Select::make('Permission_Type_id')
                ->label('Permission Type')
                ->options(PermissionType::pluck('TypeName', 'id'))
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('StartDate'),
                TextColumn::make('EndDate'),
                IconColumn::make('Status')
                ->boolean()
                ->alignCenter(),
                TextColumn::make('permissionType.TypeName')->label('permissionType'),
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
            'index' => Pages\ListPermissions::route('/'),
            'create' => Pages\CreatePermission::route('/create'),
            'edit' => Pages\EditPermission::route('/{record}/edit'),
        ];
    }
}
