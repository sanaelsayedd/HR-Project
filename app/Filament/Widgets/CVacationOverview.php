<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\VacationBalance;

class CVacationOverview extends ChartWidget
{
    protected static ?string $heading = 'Remaining Leave Days per Employee';

    protected function getData(): array
    {
        $balances = VacationBalance::with('employee')->get();

        $labels = $balances->map(function ($item) {
            return $item->employee?->username ?? 'Unknown';
        })->toArray();

        $values = $balances->pluck('Remaining_Days')->toArray();

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Remaining Days',
                    'data' => $values,
                    'backgroundColor' => '#4CAF50',
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
