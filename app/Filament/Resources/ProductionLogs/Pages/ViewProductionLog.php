<?php

namespace App\Filament\Resources\ProductionLogs\Pages;

use App\Filament\Resources\ProductionLogs\ProductionLogResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewProductionLog extends ViewRecord
{
    protected static string $resource = ProductionLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
