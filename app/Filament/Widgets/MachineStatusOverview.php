<?php

namespace App\Filament\Widgets;

use App\Models\Machine;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class MachineStatusOverview extends BaseWidget
{
    protected ?string $heading = 'Machine Status';
    protected ?string $pollingInterval = '10s';

    protected function getStats(): array
    {
        return [
            Stat::make('Running', Machine::where('status', 'Running')
                ->count())
                ->color('success'),
            Stat::make('Idle', Machine::where('status', 'Idle')
                ->count())
                ->color('warning'),
            Stat::make('Maintenance', Machine::where('status', 'Maintenance')
                ->count())
                ->color('info'),
            Stat::make('Error', Machine::where('status', 'Error')
                ->count())
                ->color('danger'),

        ];
    }
}