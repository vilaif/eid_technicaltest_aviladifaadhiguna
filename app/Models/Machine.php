<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Machine extends Model
{
    protected $fillable = [
        'name',
        'type',
        'status',
        'current_temperature',
    ];

    public function productionLogs(): HasMany
    {
        return $this->hasMany(ProductionLog::class);
    }

}