<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UnosBerbe extends Model
{
    use HasFactory;

    protected $fillable = [
        'uneta_kolicina_kg',
        'plan_berbe_id',
        'user_id',
    ];

    protected $casts = [
        'uneta_kolicina_kg' => 'decimal:2',
    ];

    public function planBerbe(): BelongsTo
    {
        return $this->belongsTo(PlanBerbe::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
