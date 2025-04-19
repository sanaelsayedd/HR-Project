<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VacationTypeResource\Pages;
use App\Filament\Resources\VacationTypeResource\RelationManagers;
use App\Models\VacationType;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VacationTypeResource extends Resource
{
    protected static ?string $model = VacationType::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Vacation';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('TypeName')->required(),
                TextInput::make('Description')->required(),
                TextInput::make('Max_Days')->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('TypeName'),
                TextColumn::make('Description'),
                TextColumn::make('Max_Days'),

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
            'index' => Pages\ListVacationTypes::route('/'),
            'create' => Pages\CreateVacationType::route('/create'),
            'edit' => Pages\EditVacationType::route('/{record}/edit'),
        ];
    }
}
