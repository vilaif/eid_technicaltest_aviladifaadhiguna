<?php

namespace App\Filament\Resources\Machines\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MachineForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Select::make('type')
                    ->options(['CNC' => 'CNC', 'Milling Press' => 'Milling press', 'Assembly' => 'Assembly'])
                    ->required(),
                Select::make('status')
                    ->options(['Running' => 'Running', 'Idle' => 'Idle', 'Maintenance' => 'Maintenance', 'Error' => 'Error'])
                    ->default('Idle')
                    ->required(),
                TextInput::make('current_temperature')
                    ->numeric()
                    ->suffix('°C')
                    ->nullable(),
            ]);
    }
}