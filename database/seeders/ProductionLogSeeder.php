<?php

namespace Database\Seeders;

use App\Models\Machine;
use App\Models\ProductionLog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductionLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $operators = ['Budi Santoso', 'Andi Wijaya', 'Siti Aminah', 'Rudi Hartono', 'Dewi Lestari'];
        $shifts = ['Pagi', 'Siang', 'Malam'];
        $statuses = ['Running', 'Idle', 'Maintenance', 'Error'];

        $machines = Machine::all();

        foreach ($machines as $machine) {
            // Generate log untuk 7 hari terakhir
            for ($day = 6; $day >= 0; $day--) {
                $date = Carbon::now()->subDays($day);

                foreach ($shifts as $shift) {
                    // 2-4 log per shift per mesin (simulasi input tiap beberapa jam)
                    $logsPerShift = rand(2, 4);

                    for ($i = 0; $i < $logsPerShift; $i++) {
                        ProductionLog::create([
                            'machine_id' => $machine->id,
                            'operator_name' => fake()->randomElement($operators),
                            'quantity' => rand(20, 100),
                            'temperature' => fake()->randomFloat(2, 40, 90),
                            'status' => fake()->randomElement($statuses),
                            'shift' => $shift,
                            'recorded_at' => $date->copy()->addHours(rand(0, 23))->addMinutes(rand(0, 59)),
                        ]);
                    }
                }
            }
        }
    }
}