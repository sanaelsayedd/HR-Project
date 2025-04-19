<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VacationBalanceResource\Pages;
use App\Filament\Resources\VacationBalanceResource\RelationManagers;
use App\Models\User;
use App\Models\VacationBalance;
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

class VacationBalanceResource extends Resource
{
    protected static ?string $model = VacationBalance::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Vacation';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('Total_balance')->numeric()->required(),
                TextInput::make('Total_Days')->numeric()->required(),
                TextInput::make('Remaining_Days')->numeric()->required(),
                Select::make(name: 'employee_id')->options(options: User::pluck('username','id'))->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('Total_balance'),
                TextColumn::make('Total_Days'),
                TextColumn::make('Remaining_Days'),
                TextColumn::make('employee.username')->label('Employee'),

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
            'index' => Pages\ListVacationBalances::route('/'),
            'create' => Pages\CreateVacationBalance::route('/create'),
            'edit' => Pages\EditVacationBalance::route('/{record}/edit'),
        ];
    }
}
