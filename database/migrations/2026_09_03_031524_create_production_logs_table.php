<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('production_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('machine_id')->constrained()->cascadeOnDelete();
            $table->string('operator_name');
            $table->unsignedInteger('quantity')->default(0);
            $table->decimal('temperature', 5, 2);
            $table->enum('status', ['Running', 'Idle', 'Maintenance', 'Error']);
            $table->enum('shift', ['Pagi', 'Siang', 'Malam']);
            $table->timestamp('recorded_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('production_logs');
    }
};