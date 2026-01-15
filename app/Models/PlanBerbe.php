<?php

// Model for harvest planning

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlanBerbe extends Model
{
    use HasFactory;

    protected $fillable = [
        'datum',
        'planirana_kolicina_kg',
        'status',
        'parcela_id',
        'sorta_id',
        'user_id',
    ];

    protected $casts = [
        'datum' => 'date',
        'planirana_kolicina_kg' => 'decimal:2',
    ];

    public function unosi()
    {
        return $this->hasMany(UnosBerbe::class, 'plan_berbe_id');
    }

    public function parcela(): BelongsTo
    {
        return $this->belongsTo(Parcela::class);
    }

    public function sorta(): BelongsTo
    {
        return $this->belongsTo(Sorta::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
