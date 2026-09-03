<?php

namespace Database\Seeders;

use App\Models\Machine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MachineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $machines = [
            ['name' => 'CNC-001', 'type' => 'CNC'],
            ['name' => 'CNC-002', 'type' => 'CNC'],
            ['name' => 'MIL-001', 'type' => 'Milling'],
            ['name' => 'MIL-002', 'type' => 'Milling'],
            ['name' => 'PR-001', 'type' => 'Press'],
            ['name' => 'PR-002', 'type' => 'Press'],
            ['name' => 'Assembly-001', 'type' => 'Assembly'],
            ['name' => 'Assembly-002', 'type' => 'Assembly'],
        ];

        $statuses = ['Running', 'Idle', 'Maintenance', 'Error'];

        foreach ($machines as $machine) {
            Machine::create([
                'name' => $machine['name'],
                'type' => $machine['type'],
                'status' => fake()->randomElement($statuses),
                'current_temperature' => fake()->randomFloat(2, 40, 90),
            ]);
        }
    }
}