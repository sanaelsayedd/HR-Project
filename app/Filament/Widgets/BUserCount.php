<?php

namespace App\Filament\Widgets;

use Doctrine\DBAL\Schema\Column;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use App\Models\JobPosition; // Import the JobPosition model
use App\Models\Department; // Ensure you import the Department model


class BUserCount extends BaseWidget
{
   
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::count())
                ->icon('heroicon-o-users') // Optional: nice icon
                ->color('success'),

            Stat::make('Total Job Positions', JobPosition::count()) // Display the total job positions
                ->icon('heroicon-o-briefcase') // Choose an appropriate icon (example: 'briefcase')
                ->color('primary'), // Optional: Choose a color

            Stat::make('Total Departments', Department::count())
                ->icon('heroicon-o-briefcase')
                ->color('primary'),
        
        ];
    }
}
