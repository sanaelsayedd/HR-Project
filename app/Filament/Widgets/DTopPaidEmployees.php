<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Payroll;
use Illuminate\Support\Facades\DB;

class DTopPaidEmployees extends ChartWidget
{
    protected static ?string $heading = 'Top 5 Highest Paid Employees';

    protected function getData(): array
    {
        // Get top 5 highest paid employees by net salary
        $topEmployees = Payroll::select(
                'employee_id',
                DB::raw('(Amount + Bonus - Deduction) as net_salary')
            )
            ->with('employee')
            ->orderByDesc('net_salary')
            ->limit(5)
            ->get();

        // Prepare labels (employee names) and data (net salary)
        $labels = $topEmployees->map(fn($item) => $item->employee?->name ?? 'Unknown')->toArray();
        $values = $topEmployees->map(fn($item) => $item->net_salary)->toArray();

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Net Salary',
                    'data' => $values,
                    'backgroundColor' => ['#36A2EB', '#4BC0C0', '#FFCE56', '#FF6384', '#9966FF'],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // You can also try 'horizontalBar' or 'doughnut'
    }
}
