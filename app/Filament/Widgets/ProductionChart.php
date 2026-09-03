<?php

namespace App\Filament\Widgets;

use App\Models\ProductionLog;
use Filament\Widgets\ChartWidget;

class ProductionChart extends ChartWidget
{
    protected ?string $heading = 'Hourly Production (Today)';
    protected ?string $pollingInterval = '15s';

    protected function getData(): array
    {
        $logs = ProductionLog::whereDate('recorded_at', today())
            ->selectRaw('HOUR(recorded_at) as hour, SUM(quantity) as total')
            ->groupBy('hour')
            ->orderBy('hour')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Produksi',
                    'data' => $logs->pluck('total'),
                ],
            ],
            'labels' => $logs
                ->pluck('hour')
                ->map(fn($h) => 'Jam ' . $h . ':00'),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}