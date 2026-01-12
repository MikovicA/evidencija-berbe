<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sorta extends Model
{
    use HasFactory;

    protected $fillable = [
        'naziv',
    ];

    public function planBerbes(): HasMany
    {
        return $this->hasMany(PlanBerbe::class);
    }
}
