<?php
namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\JobPosition;

class EmployeeDemographics extends ChartWidget
{
    protected static ?string $heading = 'Employees per Job Position' ;

    protected function getData(): array
    {
        $positions = JobPosition::withCount('users')->get();

        $labels = $positions->pluck('Job_Title')->toArray(); 
        $values = $positions->pluck('users_count')->toArray();

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Number of employees',
                    'data' => $values,
                    'backgroundColor' => ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0'], 
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie'; 
    }
}
