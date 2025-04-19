<?php

namespace App\Filament\Resources;

use App\Models\User;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\ContractResource\Pages;
use App\Filament\Resources\ContractResource\RelationManagers;
use App\Models\Contract;
use App\Models\jobPosition;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContractResource extends Resource
{
    protected static ?string $model = Contract::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Salaries & Payments';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                DatePicker::make('Start_Date')->required(),
                DatePicker::make('End_Date')->required(),
                TextInput::make('Growth_Salary')->required(),
                TextInput::make('Net_Salary')->required(),
                Select::make('job_position_id')->options(jobPosition::pluck('Job_Title','id'))->required(),
                Select::make('employee_id')->options(options: User::pluck('username','id'))->required(),


                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('Start_Date'),
                TextColumn::make('End_Date'),
                TextColumn::make('Growth_Salary'),
                TextColumn::make('Net_Salary'),
                TextColumn::make('jobPosition.Job_Title')->label('jobPosition'),
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
            'index' => Pages\ListContracts::route('/'),
            'create' => Pages\CreateContract::route('/create'),
            'edit' => Pages\EditContract::route('/{record}/edit'),
        ];
    }
}
