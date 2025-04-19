<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PermissionTypeResource\Pages;
use App\Filament\Resources\PermissionTypeResource\RelationManagers;
use App\Models\PermissionType;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PermissionTypeResource extends Resource
{
    protected static ?string $model = PermissionType::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Permission';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('TypeName')->required(),
                Textarea::make('Description')
                ->required()
                ->rows(3),
                TextInput::make('Status')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('TypeName'),
                TextColumn::make('Description'),
                TextColumn::make('Status'),
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
            'index' => Pages\ListPermissionTypes::route('/'),
            'create' => Pages\CreatePermissionType::route('/create'),
            'edit' => Pages\EditPermissionType::route('/{record}/edit'),
        ];
    }
}
