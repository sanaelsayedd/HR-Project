<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Contract;
use Illuminate\Support\Facades\DB;

class ExpiringContractsLineChart extends ChartWidget
{
    protected static ?string $heading = 'Contracts Expiring Soon (Next 30 Days)';

    protected function getData(): array
    {
        // Get the number of contracts expiring by month for the next 30 days
        $expiringContracts = Contract::whereBetween('End_Date', [now(), now()->addDays(30)])
            ->select(
                DB::raw('MONTH(End_Date) as month'),
                DB::raw('COUNT(*) as total')
            )
            ->groupBy(DB::raw('MONTH(End_Date)'))
            ->orderBy(DB::raw('MONTH(End_Date)'))
            ->get();

        // Prepare the data for the line chart
        $labels = $expiringContracts->pluck('month')->toArray();
        $values = $expiringContracts->pluck('total')->toArray();

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Expiring Contracts',
                    'data' => $values,
                    'borderColor' => '#4CAF50', // Line color
                    'backgroundColor' => 'rgba(76, 175, 80, 0.2)', // Background color (for filled area)
                    'fill' => true, // Fill the area under the line
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line'; // Set the chart type to 'line'
    }
}
