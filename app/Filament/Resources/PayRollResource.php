<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PayRollResource\Pages;
use App\Filament\Resources\PayRollResource\RelationManagers;
use App\Models\PayRoll;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PayRollResource extends Resource
{
    protected static ?string $model = PayRoll::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Salaries & Payments';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('Amount')->step(0.01)->numeric()->required(),
                TextInput::make('Deduction')->step(0.01)->numeric()->required(),
                TextInput::make('Bonus')->step(0.01)->numeric()->required(),
                DatePicker::make('date')->required(),
                Select::make(name: 'employee_id')->options(options: User::pluck('username','id'))->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('Amount'),
                TextColumn::make('Deduction'),
                TextColumn::make('Bonus'),
                TextColumn::make('date'),
                TextColumn::make('employee.email')->label('employee')->searchable(),
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
            'index' => Pages\ListPayRolls::route('/'),
            'create' => Pages\CreatePayRoll::route('/create'),
            'edit' => Pages\EditPayRoll::route('/{record}/edit'),
        ];
    }
}
