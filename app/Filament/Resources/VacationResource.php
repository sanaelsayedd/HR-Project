<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VacationResource\Pages;
use App\Filament\Resources\VacationResource\RelationManagers;
use App\Models\User;
use App\Models\Vacation;
use App\Models\VacationType;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
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

class VacationResource extends Resource
{
    protected static ?string $model = Vacation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Vacation';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make(name: 'employee_id')->options(options: User::pluck('username','id'))->required(),
                Select::make(name: 'VacationTypeID')->options(options: VacationType::pluck('TypeName','id'))->required(),
                DatePicker::make('Start_Date')->required(),
                DatePicker::make('End_Date')->required(),
                TextInput::make('Duration'),
                DatePicker::make('RequestDate')->required(),
                DatePicker::make('ApprovalDate')->required(),
                Select::make('Status')
                ->label('Status')
                ->default(0)
                ->options([
                    1 => "approved",   
                    0 => "rejected",  
                ])
                ->native(false)
                ->required(),

                TextInput::make('Comments'),


    ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('employee.username')->label('employee')->searchable(),
                TextColumn::make('vacationType.TypeName')->label('VacationType')->searchable(),
                TextColumn::make('Start_Date'),
                TextColumn::make('End_Date'),
                TextColumn::make('Duration'),
                TextColumn::make('RequestDate'),
                TextColumn::make('ApprovalDate'),
                IconColumn::make('Status')
                ->boolean()
                ->alignCenter(),
                TextColumn::make('Comments'),

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
            'index' => Pages\ListVacations::route('/'),
            'create' => Pages\CreateVacation::route('/create'),
            'edit' => Pages\EditVacation::route('/{record}/edit'),
        ];
    }
}
